<?php
$languages = [
    'c' => ['label' => 'C', 'template' => "#include <stdio.h>\n\nint main(void) {\n    printf(\"Bonjour depuis C !\\n\");\n    return 0;\n}\n"],
    'cpp' => ['label' => 'C++', 'template' => "#include <iostream>\n\nint main() {\n    std::cout << \"Bonjour depuis C++ !\\n\";\n    return 0;\n}\n"],
    'php' => ['label' => 'PHP', 'template' => "<?php\necho \"Bonjour depuis PHP !\\n\";\n"],
    'javascript' => ['label' => 'JavaScript', 'template' => "console.log(\"Bonjour depuis JavaScript !\");\n"],
    'python' => ['label' => 'Python', 'template' => "print(\"Bonjour depuis Python !\")\n"],
];

$lesson = (int)($_GET['lesson'] ?? 0);
$selectedLanguage = strtolower(trim((string)($_GET['language'] ?? 'c')));
if (!isset($languages[$selectedLanguage])) {
    $selectedLanguage = 'c';
}

$lessonExamples = [
    1 => [
        'title' => 'Chapitre 1 · Variables & rectangle',
        'language' => 'php',
        'code' => "<?php\n$longueur = (float) trim(fgets(STDIN));\n$largeur = (float) trim(fgets(STDIN));\n\n$aire = $longueur * $largeur;\n$perimetre = 2 * ($longueur + $largeur);\n\necho \"Aire : $aire\\n\";\necho \"Périmètre : $perimetre\\n\";\n",
        'input' => "10\n5\n",
    ],
    2 => [
        'title' => 'Chapitre 2 · Structures alternatives',
        'language' => 'php',
        'code' => "<?php\n$a = (float) trim(fgets(STDIN));\n$b = (float) trim(fgets(STDIN));\n\nif ($a == 0) {\n    echo $b == 0 ? \"Tous les réels\\n\" : \"Aucune solution\\n\";\n} else {\n    echo \"x = \" . (-$b / $a) . \"\\n\";\n}\n",
        'input' => "2\n-6\n",
    ],
    3 => [
        'title' => 'Chapitre 3 · Boucles & diviseurs',
        'language' => 'php',
        'code' => "<?php\n$n = (int) trim(fgets(STDIN));\n\nfor ($d = 1; $d <= $n; $d++) {\n    if ($n % $d === 0) {\n        echo \"$d\\n\";\n    }\n}\n",
        'input' => "24\n",
    ],
    4 => [
        'title' => 'Chapitre 4 · Fonctions',
        'language' => 'php',
        'code' => "<?php\nfunction aireRectangle(float $longueur, float $largeur): float {\n    return $longueur * $largeur;\n}\n\n$longueur = (float) trim(fgets(STDIN));\n$largeur = (float) trim(fgets(STDIN));\necho aireRectangle($longueur, $largeur) . \"\\n\";\n",
        'input' => "10\n5\n",
    ],
    5 => [
        'title' => 'Chapitre 5 · Tableaux',
        'language' => 'php',
        'code' => "<?php\n$tab = [12, 8, 15, 10];\n\necho \"Min : \" . min($tab) . \"\\n\";\necho \"Max : \" . max($tab) . \"\\n\";\necho \"Moyenne : \" . (array_sum($tab) / count($tab)) . \"\\n\";\n",
        'input' => '',
    ],
    6 => [
        'title' => 'Chapitre 6 · Fichiers',
        'language' => 'php',
        'code' => "<?php\n$texte = \"Bonjour depuis un fichier !\\n\";\nfile_put_contents(\"/tmp/message.txt\", $texte);\necho file_get_contents(\"/tmp/message.txt\");\n",
        'input' => '',
    ],
];

$lessonTitle = '';
$lessonCode = $languages[$selectedLanguage]['template'];
$lessonInput = '';
if (isset($lessonExamples[$lesson])) {
    $example = $lessonExamples[$lesson];
    $selectedLanguage = $example['language'];
    $lessonTitle = $example['title'];
    $lessonCode = $example['code'];
    $lessonInput = $example['input'];
}
?>
<div class="compiler-page">
    <div class="compiler-hero">
        <div>
            <span class="eyebrow">LABORATOIRE DE PROGRAMMATION</span>
            <h1>Écris. Exécute. Comprends.</h1>
            <p>Ton code est exécuté dans un environnement Docker isolé sur le serveur.</p>
        </div>
        <span class="status-pill"><span></span> Sandbox active</span>
    </div>

<?php if ($lessonTitle): ?>
    <div class="exercise-context">
        <div>
            <span class="eyebrow">EXERCICE IMPORTÉ</span>
            <strong><?= htmlspecialchars($lessonTitle) ?></strong>
        </div>
        <a href="index.php?page=compiler">Nouveau programme</a>
    </div>
<?php endif; ?>

    <div class="compiler-grid">
        <section class="code-card">
            <div class="editor-toolbar">
                <label for="language">Langage</label>
                <select id="language"><?php foreach ($languages as $key => $language): ?><option value="<?= htmlspecialchars($key) ?>" <?= $selectedLanguage === $key ? 'selected' : '' ?>><?= htmlspecialchars($language['label']) ?></option><?php endforeach; ?></select>
                <button id="reset-code" type="button">Réinitialiser</button>
                <button id="run-code" class="run-button" type="button">▶ Exécuter</button>
            </div>
            <textarea id="code-editor" spellcheck="false" aria-label="Éditeur de code"></textarea>
            <div class="editor-footer"><span id="code-counter">0 caractères</span><span>Ctrl/Cmd + Entrée pour exécuter</span></div>
        </section>

        <section class="side-column">
            <div class="input-card">
                <div class="card-title"><span>Entrée standard</span><small>stdin</small></div>
                <textarea id="stdin" spellcheck="false" placeholder="Une valeur par ligne..."><?= htmlspecialchars($lessonInput) ?></textarea>
            </div>
            <div class="terminal-card">
                <div class="terminal-head"><span>Terminal</span><span id="execution-time">—</span></div>
                <pre id="terminal">Prêt à exécuter.</pre>
            </div>
        </section>
    </div>
</div>

<script>
const compilerTemplates = <?= json_encode(array_combine(array_keys($languages), array_column($languages, 'template')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const initialLanguage = <?= json_encode($selectedLanguage) ?>;
const initialCode = <?= json_encode($lessonCode, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const editor = document.getElementById('code-editor');
const language = document.getElementById('language');
const stdin = document.getElementById('stdin');
const terminal = document.getElementById('terminal');
const runButton = document.getElementById('run-code');
const resetButton = document.getElementById('reset-code');
const executionTime = document.getElementById('execution-time');
const codeCounter = document.getElementById('code-counter');

function updateCounter() {
    codeCounter.textContent = editor.value.length.toLocaleString('fr-FR') + ' caractères';
}

function resetEditor() {
    editor.value = language.value === initialLanguage && initialCode ? initialCode : compilerTemplates[language.value];
    terminal.textContent = 'Prêt à exécuter.';
    executionTime.textContent = '—';
    updateCounter();
}

function resetToTemplate() {
    editor.value = compilerTemplates[language.value];
    stdin.value = '';
    terminal.textContent = 'Prêt à exécuter.';
    executionTime.textContent = '—';
    updateCounter();
}

language.addEventListener('change', resetToTemplate);
resetButton.addEventListener('click', resetToTemplate);
editor.addEventListener('input', updateCounter);

async function executeCode() {
    if (!editor.value.trim()) {
        terminal.textContent = 'Le code est vide.';
        return;
    }

    runButton.disabled = true;
    runButton.textContent = '⏳ Exécution...';
    terminal.textContent = 'Exécution du programme...';

    try {
        const response = await fetch('api/execute.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                language: language.value,
                code: editor.value,
                input: stdin.value
            })
        });

        const data = await response.json();

        if (!response.ok || data.error) {
            terminal.textContent = data.error || 'Erreur serveur.';
            executionTime.textContent = '—';
            return;
        }

        terminal.textContent = data.timed_out
            ? '⏱ Temps d’exécution dépassé.'
            : (data.success ? (data.stdout || '(aucune sortie)') : (data.stderr || 'Le programme a quitté avec une erreur.'));

        executionTime.textContent = data.duration_ms + ' ms · code ' + data.exit_code;
    } catch (error) {
        terminal.textContent = 'Impossible de contacter le serveur de compilation.';
        executionTime.textContent = 'Erreur réseau';
    } finally {
        runButton.disabled = false;
        runButton.textContent = '▶ Exécuter';
    }
}

runButton.addEventListener('click', executeCode);
editor.addEventListener('keydown', (event) => {
    if ((event.ctrlKey || event.metaKey) && event.key === 'Enter') {
        event.preventDefault();
        executeCode();
    }
});

language.value = initialLanguage;
resetEditor();
</script>
