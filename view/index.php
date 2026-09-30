<div class="home-page">
<section class="home-hero">
<div><span class="eyebrow">BTS SIO · SLAM</span><h1>Apprends. Code. Exécute.</h1><p>Une plateforme de révision pour apprendre l’algorithmique et programmer directement depuis ton navigateur.</p><div class="hero-actions"><a href="index.php?page=compiler">Ouvrir le compilateur →</a><a class="secondary" href="index.php?page=cours">Explorer les cours</a></div></div>
<div class="hero-terminal"><div><span></span><span></span><span></span></div><pre>$ e-enseignement
> compiler --ready
✓ C / C++ / PHP / JS / Python</pre></div>
</section>

<section class="feature-grid">
<article><strong>01</strong><h2>Cours structurés</h2><p>Progresse chapitre par chapitre avec des exemples et exercices pratiques.</p></article>
<article><strong>02</strong><h2>Code en ligne</h2><p>Écris et exécute tes programmes sans installer de compilateur sur ton ordinateur.</p></article>
<article><strong>03</strong><h2>Terminal intégré</h2><p>Observe la sortie standard, les erreurs et le temps d’exécution.</p></article>
</section>

<section class="chapters-section">
<div class="section-heading"><div><span class="eyebrow">PARCOURS</span><h2>Chapitres</h2></div><a href="index.php?page=cours">Voir tous les cours →</a></div>
<div class="chapter-grid">
<?php
$chapters=[
['1','Variables & rectangle','Variables, saisie, calculs et affichage.'],
['2','Structures alternatives','Conditions et résolution d’une équation.'],
['3','Boucles & diviseurs','Répétitions, modulo et recherche des diviseurs.'],
['4','Fonctions','Créer des fonctions réutilisables avec paramètres et retour.'],
['5','Tableaux','Parcourir et analyser une collection de valeurs.'],
['6','Fichiers','Lire et écrire des données dans des fichiers.'],
];
foreach($chapters as $chapter):
?>
<a class="chapter-card" href="index.php?page=chapitre-<?= $chapter[0] ?>"><span><?= $chapter[0] ?></span><div><h3><?= htmlspecialchars($chapter[1]) ?></h3><p><?= htmlspecialchars($chapter[2]) ?></p></div><b>→</b></a>
<?php endforeach; ?>
</div>
</section>

<section class="exercise-card">
<div><span class="eyebrow">EXERCICE RAPIDE</span><h2>Calculer la surface d’un rectangle</h2><p>Ouvre un exercice préchargé et teste immédiatement ton programme.</p></div>
<a href="index.php?page=compiler&example=rectangle&lang=php">Commencer l’exercice →</a>
</section>
</div>
<style>
.home-page{max-width:1400px;margin:auto;padding:42px 20px}.home-hero{display:grid;grid-template-columns:1.3fr .7fr;gap:35px;align-items:center;padding:45px 0}.home-hero h1{font-size:clamp(2.7rem,6vw,5.5rem);line-height:.95;letter-spacing:-.05em;margin:10px 0 22px}.home-hero p{max-width:650px;font-size:1.1rem;color:#94a3b8}.hero-actions{display:flex;gap:12px;margin-top:28px}.hero-actions a,.exercise-card a{background:#2563eb;color:#fff;padding:12px 17px;border-radius:10px;font-weight:700}.hero-actions .secondary{background:#111827;border:1px solid #26334f}.hero-terminal{border:1px solid #26334f;background:#080d17;border-radius:16px;box-shadow:0 25px 60px rgba(0,0,0,.3);overflow:hidden}.hero-terminal>div{padding:12px;border-bottom:1px solid #1f2937}.hero-terminal span{display:inline-block;width:9px;height:9px;border-radius:50%;background:#475569;margin-right:5px}.hero-terminal pre{padding:28px;color:#a7f3d0;margin:0;min-height:170px;font:13px/1.8 ui-monospace,monospace}.feature-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;margin:30px 0 70px}.feature-grid article,.chapter-card,.exercise-card{border:1px solid #1f2937;background:#0b1220;border-radius:15px}.feature-grid article{padding:25px}.feature-grid strong,.eyebrow{color:#7c9cff;letter-spacing:.12em;font-size:.75rem}.feature-grid h2{margin:12px 0 8px}.feature-grid p,.chapter-card p{color:#94a3b8;margin:0}.section-heading{display:flex;justify-content:space-between;align-items:end;margin-bottom:20px}.section-heading h2{font-size:2rem;margin:5px 0}.section-heading a{color:#8ea8ff}.chapter-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}.chapter-card{display:flex;align-items:center;gap:16px;padding:17px;color:#fff;transition:.2s}.chapter-card:hover{border-color:#3b82f6;transform:translateY(-2px)}.chapter-card>span{font-size:1.3rem;font-weight:800;color:#64748b;width:35px}.chapter-card h3{margin:0 0 4px;font-size:1rem}.chapter-card b{margin-left:auto;color:#64748b}.exercise-card{margin-top:55px;padding:28px;display:flex;justify-content:space-between;align-items:center;gap:20px}.exercise-card h2{margin:7px 0}.exercise-card p{color:#94a3b8;margin:0}.exercise-card a{white-space:nowrap}@media(max-width:850px){.home-hero{grid-template-columns:1fr}.feature-grid,.chapter-grid{grid-template-columns:1fr}.exercise-card,.section-heading{align-items:flex-start;flex-direction:column}}
</style>