<?php

include ("view/layout/header.php");

$page = isset($_GET['page']) ?$_GET['page'] : 'index';

switch ($page):
    case"index":
        include("view//index.php");
        break;
    case"cours":
        include("view/cours/cours.php");
        break;
    case"chapitre-1":
        include("view/cours/chapitre-1.php");
        break;
    case"chapitre-2":
        include("view/cours/chapitre-2.php");
        break;
    case"chapitre-3":
        include("view/cours/chapitre-3.php");
        break;
    case"chapitre-4":
        include("view/cours/chapitre-4.php");
        break;
    case"chapitre-5":
        include("view/cours/chapitre-5.php");
        break;
    default :
        include("view/index.php");
        break;
endswitch;

    include ("view/layout/footer.php");
    ?>
