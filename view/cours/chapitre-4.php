<article class="lesson-page">
    <a class="back-link" href="index.php?page=cours">← Retour aux cours</a>
    <span class="eyebrow">CHAPITRE 04</span>
    <h1>Fonctions</h1>
    <p class="lesson-intro">Organiser son programme avec des blocs réutilisables qui reçoivent des paramètres et peuvent retourner une valeur.</p>
    <div class="lesson-grid">
        <section class="lesson-card"><h2>Pourquoi utiliser une fonction ?</h2><p>Une fonction évite de répéter du code et permet de découper un programme en petites responsabilités.</p></section>
        <section class="lesson-card"><h2>PHP</h2><pre class="code-block"><code>&lt;?php
function aireRectangle(float $longueur, float $largeur): float {
    return $longueur * $largeur;
}

echo aireRectangle(10, 5);</code></pre></section>
        <section class="lesson-card"><h2>JavaScript</h2><pre class="code-block"><code>function aireRectangle(longueur, largeur) {
    return longueur * largeur;
}

console.log(aireRectangle(10, 5));</code></pre></section>
    </div>
    <div class="lesson-practice">
        <div><span class="eyebrow">MISE EN PRATIQUE</span><h2>Transforme le calcul en fonction réutilisable.</h2><p>Deux valeurs sont envoyées au programme afin de tester ta fonction avec différents rectangles.</p></div>
        <a class="hero-button" href="index.php?page=compiler&language=php&lesson=4">Ouvrir l'exercice →</a>
    </div>
</article>