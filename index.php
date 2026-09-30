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
    case 'chapitre-4':
    case 'chapitre-5':
    case 'chapitre-6':
        include("view/cours/{$page}.php");
        break;
    default:
        http_response_code(404);
        include("view/index.php");
        break;
}

include("view/layout/footer.php");
?>