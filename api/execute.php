<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

$input = json_decode(file_get_contents('php://input'), true);

if (!is_array($input)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'JSON invalide.']);
    exit;
}

$language = strtolower(trim((string)($input['language'] ?? '')));
$code = (string)($input['code'] ?? '');
$stdin = (string)($input['input'] ?? '');

$limits = [
    'code' => 100_000,
    'input' => 20_000,
];

if ($code === '' || strlen($code) > $limits['code']) {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'Le code est vide ou dépasse 100 Ko.']);
    exit;
}

if (strlen($stdin) > $limits['input']) {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'L’entrée dépasse 20 Ko.']);
    exit;
}

$profiles = [
    'c' => [
        'image' => 'gcc:14',
        'source' => 'main.c',
        'build' => 'gcc /workspace/main.c -std=c17 -O0 -o /tmp/program',
        'run' => '/tmp/program',
    ],
    'cpp' => [
        'image' => 'gcc:14',
        'source' => 'main.cpp',
        'build' => 'g++ /workspace/main.cpp -std=c++17 -O0 -o /tmp/program',
        'run' => '/tmp/program',
    ],
    'php' => [
        'image' => 'php:8.4-cli',
        'source' => 'main.php',
        'build' => null,
        'run' => 'php /workspace/main.php',
    ],
    'javascript' => [
        'image' => 'node:22-alpine',
        'source' => 'main.js',
        'build' => null,
        'run' => 'node /workspace/main.js',
    ],
    'python' => [
        'image' => 'python:3.13-alpine',
        'source' => 'main.py',
        'build' => null,
        'run' => 'python /workspace/main.py',
    ],
];

if (!isset($profiles[$language])) {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'Langage non supporté.']);
    exit;
}

$profile = $profiles[$language];

// Apache peut utiliser un /tmp privé (PrivateTmp). Docker, lui, voit le
// système de fichiers de l'hôte. On utilise donc un répertoire partagé
// explicitement créé sur l'hôte.
$runnerBase = '/var/lib/eenseignement/runner';

if (!is_dir($runnerBase) && !mkdir($runnerBase, 0770, true)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Impossible de créer le répertoire du runner.']);
    exit;
}

$base = $runnerBase . '/eenseignement-' . bin2hex(random_bytes(12));

if (!mkdir($base, 0755, true)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Impossible de créer l’espace temporaire.']);
    exit;
}

if (file_put_contents($base . '/' . $profile['source'], $code) === false ||
    file_put_contents($base . '/stdin.txt', $stdin) === false) {
    exec('rm -rf ' . escapeshellarg($base));
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Impossible d’écrire les fichiers du programme.']);
    exit;
}

$mount = 'type=bind,source=' . $base . ',target=/workspace,readonly';

$command = [
    'docker', 'run', '--rm',
    '--network', 'none',
    '--memory', '128m',
    '--cpus', '1',
    '--pids-limit', '64',
    '--read-only',
    '--tmpfs', '/tmp:rw,nosuid,nodev,size=32m',
    '--security-opt', 'no-new-privileges',
    '--cap-drop', 'ALL',
    '--mount', $mount,
    '--user', '65532:65532',
    $profile['image'],
    'sh', '-c',
];

$script = '';
if ($profile['build'] !== null) {
    $script .= 'timeout 5s ' . $profile['build'] . ' 2>/tmp/build.err; rc=$?; ';
    $script .= 'if [ $rc -ne 0 ]; then cat /tmp/build.err; exit $rc; fi; ';
}
$script .= 'timeout 8s ' . $profile['run'] . ' < /workspace/stdin.txt';

$command[] = $script;

$escaped = array_map('escapeshellarg', $command);
$fullCommand = implode(' ', $escaped) . ' 2>&1';

$start = microtime(true);
$output = [];
$returnCode = 0;
exec($fullCommand, $output, $returnCode);
$duration = round((microtime(true) - $start) * 1000);

$outputText = implode("\n", $output);
$timedOut = $returnCode === 124;

if (strlen($outputText) > 20_000) {
    $outputText = substr($outputText, 0, 20_000) . "\n[sortie tronquée]";
}

exec('rm -rf ' . escapeshellarg($base));

echo json_encode([
    'success' => $returnCode === 0,
    'language' => $language,
    'stdout' => $returnCode === 0 ? $outputText : '',
    'stderr' => $returnCode === 0 ? '' : $outputText,
    'exit_code' => $returnCode,
    'duration_ms' => $duration,
    'timed_out' => $timedOut,
], JSON_UNESCAPED_UNICODE);
