<?php
include("view/layout/header.php");

$page = $_GET['page'] ?? 'index';

switch ($page) {
    case 'index':
        include("view/index.php");
        break;
    case 'compiler':
        include("view/compiler.php");
        break;
    case 'cours':
        include("view/cours/cours.php");
        break;
    case 'chapitre-1':
    case 'chapitre-2':
    case 'chapitre-3':
    case 'chapitre-5':
        include("view/cours/{$page}.php");
        break;
    case 'chapitre-4':
        $file = "view/cours/chapitre-4.php";
        if (is_file($file)) {
            include($file);
        } else {
            http_response_code(404);
            echo '<main class="container py-5"><h1>Chapitre 4</h1><p>Ce chapitre n’est pas encore disponible.</p></main>';
        }
        break;
    default:
        http_response_code(404);
        include("view/index.php");
        break;
}

include("view/layout/footer.php");
?>