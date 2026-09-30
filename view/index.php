<div class="home-page">
    <section class="home-hero">
        <div class="hero-copy">
            <span class="eyebrow">BTS SIO · SLAM</span>
            <h1>Apprends.<br><span>Code.</span><br>Exécute.</h1>
            <p>Un espace unique pour comprendre l'algorithmique, pratiquer avec des exercices et exécuter ton code directement dans le navigateur.</p>
            <div class="hero-actions">
                <a class="primary-button" href="index.php?page=compiler">Ouvrir le laboratoire <span>→</span></a>
                <a class="secondary-button" href="index.php?page=cours">Parcourir les cours</a>
            </div>
            <div class="hero-stats">
                <div><strong>06</strong><span>chapitres</span></div>
                <div><strong>05</strong><span>langages</span></div>
                <div><strong>∞</strong><span>essais</span></div>
            </div>
        </div>
        <div class="hero-terminal">
            <div class="terminal-bar"><span></span><span></span><span></span><small>e-enseignement</small></div>
            <pre><span class="terminal-muted">$</span> compiler --status
<span class="terminal-ok">✓</span> sandbox ready
<span class="terminal-ok">✓</span> C / C++ / PHP / JS / Python
<span class="terminal-ok">✓</span> stdin + terminal
<span class="terminal-muted">$</span> _</pre>
        </div>
    </section>

    <section class="feature-grid">
        <article class="feature-card">
            <span class="feature-icon">01</span>
            <h2>Comprendre</h2>
            <p>Des chapitres courts qui expliquent les notions avec des exemples directement exploitables.</p>
        </article>
        <article class="feature-card">
            <span class="feature-icon">02</span>
            <h2>Pratiquer</h2>
            <p>Pars d'un exemple de cours et ouvre-le directement dans le laboratoire de programmation.</p>
        </article>
        <article class="feature-card">
            <span class="feature-icon">03</span>
            <h2>Exécuter</h2>
            <p>Teste ton programme sur le serveur et observe instantanément la sortie et les erreurs.</p>
        </article>
    </section>

    <section class="chapters-section">
        <div class="section-heading">
            <div>
                <span class="eyebrow">PARCOURS</span>
                <h2>Les 6 chapitres</h2>
            </div>
            <a href="index.php?page=cours">Voir le parcours complet →</a>
        </div>
        <div class="chapter-grid">
<?php
$chapters = [
    ['1', 'Variables & rectangle', 'Variables, saisie, affichage et calculs simples.'],
    ['2', 'Structures alternatives', 'Conditions, équations et choix avec if / else.'],
    ['3', 'Boucles & diviseurs', 'Répétitions, modulo et recherche des diviseurs.'],
    ['4', 'Fonctions', 'Créer des fonctions réutilisables avec paramètres et retour.'],
    ['5', 'Tableaux', 'Parcourir, analyser et calculer des valeurs.'],
    ['6', 'Fichiers', 'Lire, écrire et manipuler des données stockées.'],
];
foreach ($chapters as $chapter):
?>
            <a class="chapter-card" href="index.php?page=chapitre-<?= $chapter[0] ?>">
                <span class="chapter-number"><?= $chapter[0] ?></span>
                <div>
                    <h3><?= htmlspecialchars($chapter[1]) ?></h3>
                    <p><?= htmlspecialchars($chapter[2]) ?></p>
                </div>
                <b>→</b>
            </a>
<?php endforeach; ?>
        </div>
    </section>

    <section class="exercise-card">
        <div>
            <span class="eyebrow">EXERCICE DE DÉPART</span>
            <h2>Calcule l'aire d'un rectangle</h2>
            <p>Un premier exercice pour manipuler les variables, la saisie et les calculs.</p>
        </div>
        <a class="primary-button" href="index.php?page=compiler&language=php&lesson=1">Lancer l'exercice →</a>
    </section>
</div>
