<article class="lesson-page">
    <a class="back-link" href="index.php?page=cours">← Retour aux cours</a>
    <span class="eyebrow">CHAPITRE 03</span>
    <h1>Boucles & diviseurs</h1>
    <p class="lesson-intro">Répéter une opération avec une boucle et utiliser le modulo pour trouver les diviseurs d'un entier.</p>
    <div class="lesson-grid">
        <section class="lesson-card"><h2>À retenir</h2><p>Un nombre <code>d</code> est un diviseur de <code>n</code> lorsque <code>n % d === 0</code>.</p></section>
        <section class="lesson-card"><h2>PHP</h2><pre class="code-block"><code>&lt;?php
$n = 24;

for ($d = 1; $d <= $n; $d++) {
    if ($n % $d === 0) {
        echo "$d est un diviseur
";
    }
}</code></pre></section>
        <section class="lesson-card"><h2>JavaScript</h2><pre class="code-block"><code>const n = 24;

for (let d = 1; d <= n; d++) {
    if (n % d === 0) {
        console.log(d, "est un diviseur");
    }
}</code></pre></section>
    </div>
    <div class="lesson-practice"><div><span class="eyebrow">MISE EN PRATIQUE</span><h2>Choisis un entier et observe ses diviseurs.</h2><p>L'entrée standard contient déjà un exemple. Change-la pour tester d'autres nombres.</p></div><a class="hero-button" href="index.php?page=compiler&example=divisors&lang=php">Ouvrir l'exercice →</a></div>
</article>