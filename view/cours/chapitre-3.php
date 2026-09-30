<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chapitre 3 : Diviseurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>.code-block { background-color: #2d2d2d; color: #f8f8f2; padding: 15px; border-radius: 5px; font-family: monospace; }</style>
</head>
<body class="p-4">
    <a href="index.php?page=cours" class="btn btn-outline-secondary mb-3">&larr; Retour aux cours</a>
    <h2>Chapitre 3 : Trouver les diviseurs d'un entier</h2>
    
    <ul class="nav nav-tabs mt-4" id="chap3Tabs">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#php3">PHP</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#js3">JavaScript</a></li>
    </ul>

    <div class="tab-content border border-top-0 p-3">
        <div class="tab-pane fade show active" id="php3">
<pre class="code-block">
&lt;?php
if (isset($_POST['Afficher'])) {
    $nb = $_POST['nb']; 
    for ($div = 1; $div <= $nb; $div++){
        if ($nb % $div == 0){
            printf("&lt;br&gt; %d est un diviseur.", $div);
        }
    }
}
?&gt;
</pre>
        </div>
        <div class="tab-pane fade" id="js3">
<pre class="code-block">
&lt;script type="text/javascript"&gt;
    let nb = parseInt(prompt("Donner un entier :"));
    let chaine = "Liste des diviseurs :";
    for (let div = 1; div <= nb; div++){
        if (nb % div == 0){
            alert(div + " est un diviseur ");
            chaine += div + ", ";
        }
    }
    document.write(chaine);
&lt;/script&gt;
</pre>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>