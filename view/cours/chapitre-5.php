<article class="lesson-page">
    <a class="back-link" href="index.php?page=cours">← Retour aux cours</a>
    <span class="eyebrow">CHAPITRE 05</span>
    <h1>Manipulation de tableaux</h1>
    <p class="lesson-intro">Parcourir une collection de valeurs pour calculer son minimum, son maximum et sa moyenne.</p>
    <div class="lesson-grid">
        <section class="lesson-card"><h2>Principe</h2><p>On parcourt chaque élément, on met à jour les bornes et on additionne les valeurs avant de calculer la moyenne.</p></section>
        <section class="lesson-card"><h2>PHP</h2><pre class="code-block"><code>&lt;?php
$tab = [12, 8, 15, 10];

$min = min($tab);
$max = max($tab);
$moyenne = array_sum($tab) / count($tab);

echo "Min : $min
";
echo "Max : $max
";
echo "Moyenne : $moyenne
";</code></pre></section>
        <section class="lesson-card"><h2>JavaScript</h2><pre class="code-block"><code>const tab = [12, 8, 15, 10];

const min = Math.min(...tab);
const max = Math.max(...tab);
const moyenne = tab.reduce((a, b) => a + b, 0) / tab.length;

console.log("Min :", min);
console.log("Max :", max);
console.log("Moyenne :", moyenne);</code></pre></section>
    </div>
    <div class="lesson-practice">
        <div><span class="eyebrow">MISE EN PRATIQUE</span><h2>Analyse le tableau fourni.</h2><p>Commence par vérifier le résultat puis modifie le tableau pour observer l'effet sur les statistiques.</p></div>
        <a class="hero-button" href="index.php?page=compiler&language=php&lesson=5">Ouvrir l'exercice →</a>
    </div>
</article>