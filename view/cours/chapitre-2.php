<article class="lesson-page">
    <a class="back-link" href="index.php?page=cours">← Retour aux cours</a>
    <span class="eyebrow">CHAPITRE 02</span>
    <h1>Structures alternatives</h1>
    <p class="lesson-intro">Utiliser <code>if / else</code> pour adapter le comportement d'un programme à une condition.</p>
    <div class="lesson-grid">
        <section class="lesson-card"><h2>Équation ax + b = 0</h2><p>On distingue trois situations : <code>a = 0</code> et <code>b = 0</code>, <code>a = 0</code> et <code>b ≠ 0</code>, ou <code>a ≠ 0</code>.</p></section>
        <section class="lesson-card"><h2>PHP</h2><pre class="code-block"><code>&lt;?php
$a = 2;
$b = -6;

if ($a == 0) {
    echo $b == 0 ? "Tous les réels" : "Aucune solution";
} else {
    echo "x = " . (-$b / $a);
}</code></pre></section>
        <section class="lesson-card"><h2>JavaScript</h2><pre class="code-block"><code>const a = 2;
const b = -6;

if (a === 0) {
    console.log(b === 0 ? "Tous les réels" : "Aucune solution");
} else {
    console.log("x =", -b / a);
}</code></pre></section>
    </div>
    <div class="lesson-practice">
        <div><span class="eyebrow">MISE EN PRATIQUE</span><h2>Teste plusieurs couples de valeurs.</h2><p>Le compilateur te permet de modifier <code>a</code> et <code>b</code> depuis l'entrée standard.</p></div>
        <a class="hero-button" href="index.php?page=compiler&language=php&lesson=2">Ouvrir l'exercice →</a>
    </div>
</article>