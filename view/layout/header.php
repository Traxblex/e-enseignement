<?php
$currentPage = $_GET['page'] ?? 'index';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="E-Enseignement — cours et laboratoire de programmation pour le BTS SIO SLAM.">
<title>E-Enseignement · BTS SIO SLAM</title>
<link rel="stylesheet" href="assets/compiler.css">
</head>
<body>
<header class="site-header">
    <nav class="site-nav" aria-label="Navigation principale">
        <a class="brand" href="index.php?page=index">
            <img src="img/logo.webp" alt="E-Enseignement">
            <span>E-Enseignement</span>
        </a>
        <div class="main-nav">
            <a class="<?= $currentPage === 'index' ? 'active' : '' ?>" href="index.php?page=index">Accueil</a>
            <a class="<?= $currentPage === 'cours' || str_starts_with($currentPage, 'chapitre-') ? 'active' : '' ?>" href="index.php?page=cours">Cours</a>
            <a class="<?= $currentPage === 'compiler' ? 'active' : '' ?>" href="index.php?page=compiler">Compilateur</a>
        </div>
    </nav>
</header>
<main class="site-main">
