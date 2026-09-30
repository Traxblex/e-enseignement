<?php
$languages = [
    'c' => ['label' => 'C', 'template' => "#include <stdio.h>\n\nint main(void) {\n    printf(\"Bonjour depuis C !\\n\");\n    return 0;\n}\n"],
    'cpp' => ['label' => 'C++', 'template' => "#include <iostream>\n\nint main() {\n    std::cout << \"Bonjour depuis C++ !\\n\";\n    return 0;\n}\n"],
    'php' => ['label' => 'PHP', 'template' => "<?php\necho \"Bonjour depuis PHP !\\n\";\n"],
    'javascript' => ['label' => 'JavaScript', 'template' => "console.log(\"Bonjour depuis JavaScript !\");\n"],
    'python' => ['label' => 'Python', 'template' => "print(\"Bonjour depuis Python !\")\n"],
];

$examples = [
    'rectangle' => [
        'label' => 'Chapitre 01 · Rectangle',
        'language' => 'php',
        'code' => "<?php\n$lg = 10;\n$lr = 5;\n\n$p = 2 * ($lg + $lr);\n$s = $lg * $lr;\n\necho \"Périmètre : $p\\n\";\necho \"Aire : $s\\n\";\n",
    ],
    'equation' => [
        'label' => 'Chapitre 02 · Équation',
        'language' => 'php',
        'code' => "<?php\n$a = 2;\n$b = -6;\n\nif ($a == 0) {\n    echo $b == 0 ? \"Tous les réels\" : \"Aucune solution\";\n} else {\n    echo \"x = \" . (-$b / $a);\n}\n",
    ],
    'divisors' => [
        'label' => 'Chapitre 03 · Diviseurs',
        'language' => 'php',
        'code' => "<?php\n$n = 24;\n\nfor ($d = 1; $d <= $n; $d++) {\n    if ($n % $d === 0) {\n        echo \"$d est un diviseur\\n\";\n    }\n}\n",
    ],
    'functions' => [
        'label' => 'Chapitre 04 · Fonctions',
        'language' => 'php',
        'code' => "<?php\nfunction aireRectangle(float $longueur, float $largeur): float {\n    return $longueur * $largeur;\n}\n\necho aireRectangle(10, 5);\n",
    ],
    'arrays' => [
        'label' => 'Chapitre 05 · Tableaux',
        'language' => 'php',
        'code' => "<?php\n$tab = [12, 8, 15, 10];\n\necho \"Min : \" . min($tab) . \"\\n\";\necho \"Max : \" . max($tab) . \"\\n\";\necho \"Moyenne : \" . (array_sum($tab) / count($tab)) . \"\\n\";\n",
    ],
    'files' => [
        'label' => 'Chapitre 06 · Fichiers',
        'language' => 'php',
        'code' => "<?php\n$texte = \"Bonjour depuis un fichier !\\n\";\nfile_put_contents(\"/tmp/message.txt\", $texte);\necho file_get_contents(\"/tmp/message.txt\");\n",
    ],
];
?>
<div class="compiler-page">
    <div class="compiler-hero">
        <div><span class="eyebrow">E-ENSEIGNEMENT</span><h1>Laboratoire de programmation</h1><p>Écris ton code, exécute-le sur le serveur et consulte immédiatement le résultat.</p><div id="example-context" class="example-context" hidden></div></div>
        <span class="status-pill"><span></span> Exécution sécurisée</span>
    </div>
    <div class="compiler-grid">
        <section class="code-card">
            <div class="editor-toolbar">
                <label for="language">Langage</label>
                <select id="language"><?php foreach ($languages as $key => $language): ?><option value="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($language['label']) ?></option><?php endforeach; ?></select>
                <button id="reset-code" type="button">Réinitialiser</button>
                <button id="run-code" class="run-button" type="button">▶ Exécuter</button>
            </div>
            <textarea id="code-editor" spellcheck="false" aria-label="Éditeur de code"></textarea>
        </section>
        <section class="side-column">
            <div class="input-card"><div class="card-title"><span>Entrée standard</span><small>stdin</small></div><textarea id="stdin" spellcheck="false" placeholder="Valeurs envoyées au programme..."></textarea></div>
            <div class="terminal-card"><div class="terminal-head"><span>Terminal</span><span id="execution-time">—</span></div><pre id="terminal">Prêt à exécuter.</pre></div>
        </section>
    </div>
</div>
<script>
const compilerTemplates = <?= json_encode(array_combine(array_keys($languages), array_column($languages, 'template')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const compilerExamples = <?= json_encode($examples, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const editor = document.getElementById('code-editor');
const language = document.getElementById('language');
const stdin = document.getElementById('stdin');
const terminal = document.getElementById('terminal');
const runButton = document.getElementById('run-code');
const resetButton = document.getElementById('reset-code');
const executionTime = document.getElementById('execution-time');
const exampleContext = document.getElementById('example-context');
const params = new URLSearchParams(window.location.search);
const requestedExample = params.get('example');
const requestedLanguage = params.get('lang');

function loadTemplate() {
    editor.value = compilerTemplates[language.value];
    terminal.textContent = 'Prêt à exécuter.';
    executionTime.textContent = '—';
}

function loadExample() {
    const example = compilerExamples[requestedExample];
    if (!example) {
        loadTemplate();
        return;
    }
    language.value = requestedLanguage && compilerTemplates[requestedLanguage] ? requestedLanguage : example.language;
    editor.value = example.code;
    exampleContext.hidden = false;
    exampleContext.textContent = 'Exercice préchargé · ' + example.label;
    terminal.textContent = 'Exercice prêt à être exécuté.';
    executionTime.textContent = '—';
}

language.addEventListener('change', loadTemplate);
resetButton.addEventListener('click', () => {
    if (requestedExample && compilerExamples[requestedExample]) {
        loadExample();
    } else {
        loadTemplate();
    }
});

runButton.addEventListener('click', async () => {
    runButton.disabled = true;
    runButton.textContent = '⏳ Exécution...';
    terminal.textContent = 'Exécution du programme...';
    try {
        const response = await fetch('api/execute.php', {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify({language: language.value, code: editor.value, input: stdin.value})});
        const data = await response.json();
        if (!response.ok || data.error) { terminal.textContent = data.error || 'Erreur serveur.'; return; }
        terminal.textContent = data.timed_out ? '⏱ Temps d’exécution dépassé.' : (data.success ? (data.stdout || '(aucune sortie)') : (data.stderr || 'Le programme a quitté avec une erreur.'));
        executionTime.textContent = data.duration_ms + ' ms · code ' + data.exit_code;
    } catch (error) { terminal.textContent = 'Impossible de contacter le serveur de compilation.'; }
    finally { runButton.disabled = false; runButton.textContent = '▶ Exécuter'; }
});

loadExample();
</script>