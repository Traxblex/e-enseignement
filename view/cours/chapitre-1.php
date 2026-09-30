<article class="lesson-page">
    <a class="back-link" href="index.php?page=cours">← Retour aux cours</a>
    <span class="eyebrow">CHAPITRE 01</span>
    <h1>Variables & calcul de rectangle</h1>
    <p class="lesson-intro">Apprendre à récupérer des valeurs, effectuer des calculs et afficher un résultat.</p>
    <div class="lesson-grid">
        <section class="lesson-card"><h2>Objectif</h2><p>À partir d'une longueur et d'une largeur, calculer le périmètre et l'aire d'un rectangle.</p><ul><li>Déclarer et utiliser des variables</li><li>Lire des données</li><li>Effectuer des opérations</li><li>Afficher le résultat</li></ul></section>
        <section class="lesson-card"><h2>PHP</h2><pre class="code-block"><code>&lt;?php
$lg = 10;
$lr = 5;

$p = 2 * ($lg + $lr);
$s = $lg * $lr;

echo "Périmètre : $p\n";
echo "Aire : $s\n";</code></pre></section>
        <section class="lesson-card"><h2>JavaScript</h2><pre class="code-block"><code>const lg = 10;
const lr = 5;

const p = 2 * (lg + lr);
const s = lg * lr;

console.log("Périmètre :", p);
console.log("Aire :", s);</code></pre></section>
    </div>
    <a class="hero-button" href="index.php?page=compiler">Tester dans le compilateur →</a>
</article>