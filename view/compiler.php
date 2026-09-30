<?php
$languages = [
    'c' => ['label' => 'C', 'template' => "#include <stdio.h>\n\nint main(void) {\n    printf(\"Bonjour depuis C !\\n\");\n    return 0;\n}\n"],
    'cpp' => ['label' => 'C++', 'template' => "#include <iostream>\n\nint main() {\n    std::cout << \"Bonjour depuis C++ !\\n\";\n    return 0;\n}\n"],
    'php' => ['label' => 'PHP', 'template' => "<?php\necho \"Bonjour depuis PHP !\\n\";\n"],
    'javascript' => ['label' => 'JavaScript', 'template' => "console.log(\"Bonjour depuis JavaScript !\");\n"],
    'python' => ['label' => 'Python', 'template' => "print(\"Bonjour depuis Python !\")\n"],
];
?>
<div class="compiler-page">
    <div class="compiler-hero">
        <div><span class="eyebrow">E-ENSEIGNEMENT</span><h1>Laboratoire de programmation</h1><p>Écris ton code, exécute-le sur le serveur et consulte immédiatement le résultat.</p></div>
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
const editor = document.getElementById('code-editor');
const language = document.getElementById('language');
const stdin = document.getElementById('stdin');
const terminal = document.getElementById('terminal');
const runButton = document.getElementById('run-code');
const resetButton = document.getElementById('reset-code');
const executionTime = document.getElementById('execution-time');

function resetEditor() {
    editor.value = compilerTemplates[language.value];
    terminal.textContent = 'Prêt à exécuter.';
    executionTime.textContent = '—';
}
language.addEventListener('change', resetEditor);
resetButton.addEventListener('click', resetEditor);
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
resetEditor();
</script>
