<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chapitre 5 : Tableaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>.code-block { background-color: #2d2d2d; color: #f8f8f2; padding: 15px; border-radius: 5px; font-family: monospace; }</style>
</head>
<body class="p-4">
    <a href="index.php?page=cours" class="btn btn-outline-secondary mb-3">&larr; Retour aux cours</a>
    <h2>Chapitre 5 : Manipulation de Tableaux</h2>
    
    <ul class="nav nav-tabs mt-4" id="chap5Tabs">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#php5">PHP</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#js5">JavaScript</a></li>
    </ul>

    <div class="tab-content border border-top-0 p-3">
        <div class="tab-pane fade show active" id="php5">
<pre class="code-block">
&lt;?php
if (isset($_POST['Afficher'])){
    $tab = explode (";", $_POST['tab']); 
    $prixMin = $tab[0]; 
    $prixMax = $tab[0];
    $prixMoyen = 0; 
    
    for ($i = 0; $i < count($tab); $i++){
        if ($tab[$i] > $prixMax) $prixMax = $tab[$i]; 
        if ($tab[$i] < $prixMin) $prixMin = $tab[$i];
        $prixMoyen += $tab[$i];
    }
    $prixMoyen /= count($tab);
    
    printf("&lt;br&gt; Le prix Moyen est : %f", $prixMoyen); 
    printf("&lt;br&gt; Le prix Max est : %f", $prixMax); 
    printf("&lt;br&gt; Le prix Min est : %f", $prixMin); 
}
?&gt;
</pre>
        </div>
        <div class="tab-pane fade" id="js5">
<pre class="code-block">
&lt;script type="text/javascript"&gt;
    let chaine = prompt("Donner la liste des prix séparés par (;) : ");
    let tab = chaine.split(";").map(Number); 
    let prixMin = tab[0]; 
    let prixMax = tab[0]; 
    let prixMoyen = 0;
    
    for (let i=0; i < tab.length; i++){
        if (tab[i] > prixMax) prixMax = tab[i]; 
        if (tab[i] < prixMin) prixMin = tab[i];
        prixMoyen += tab[i];
    }
    prixMoyen /= tab.length;
    
    alert ("Le prix Max est de : " + prixMax); 
    alert ("Le prix Min est de : " + prixMin); 
    alert ("Le prix Moyen est de : " + prixMoyen); 
&lt;/script&gt;
</pre>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>