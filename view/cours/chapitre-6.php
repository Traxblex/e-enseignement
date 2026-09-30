<article class="lesson-page">
    <a class="back-link" href="index.php?page=cours">← Retour aux cours</a>
    <span class="eyebrow">CHAPITRE 06</span>
    <h1>Fichiers</h1>
    <p class="lesson-intro">Lire et écrire des données dans des fichiers pour conserver des informations entre deux exécutions.</p>
    <div class="lesson-grid">
        <section class="lesson-card"><h2>À retenir</h2><p>Un fichier permet de stocker des données. En PHP, <code>file_get_contents()</code> lit un fichier et <code>file_put_contents()</code> écrit dedans.</p></section>
        <section class="lesson-card"><h2>PHP</h2><pre class="code-block"><code>&lt;?php
$texte = "Bonjour depuis un fichier !\n";
file_put_contents("/tmp/message.txt", $texte);

$contenu = file_get_contents("/tmp/message.txt");
echo $contenu;</code></pre></section>
        <section class="lesson-card"><h2>Python</h2><pre class="code-block"><code>texte = "Bonjour depuis un fichier !\n"

with open("/tmp/message.txt", "w") as fichier:
    fichier.write(texte)

with open("/tmp/message.txt", "r") as fichier:
    print(fichier.read())</code></pre></section>
    </div>
    <a class="hero-button" href="index.php?page=compiler&example=files&lang=php">Tester cet exercice dans le compilateur →</a>
</article>