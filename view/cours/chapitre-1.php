<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chapitre 1 : Rectangle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>.code-block { background-color: #2d2d2d; color: #f8f8f2; padding: 15px; border-radius: 5px; font-family: monospace; }</style>
</head>
<body class="p-4">
    <a href="index.php?page=cours" class="btn btn-outline-secondary mb-3">&larr; Retour aux cours</a>
    <h2>Chapitre 1 : Calcul de Rectangle</h2>
    
    <ul class="nav nav-tabs mt-4" id="chap1Tabs">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#php1">PHP</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#js1">JavaScript</a></li>
    </ul>

    <div class="tab-content border border-top-0 p-3">
        <div class="tab-pane fade show active" id="php1">
<pre class="code-block">
&lt;form action="rectangle.php" method="post"&gt;
    longueur: &lt;input type="text" name="lg" required&gt;&lt;br&gt;&lt;br&gt;
    largeur: &lt;input type="text" name="lr" required&gt;&lt;br&gt;&lt;br&gt;
    &lt;input type="submit" name="Calculer" value="Calculer"&gt;
&lt;/form&gt;
&lt;?php
if(isset($_POST['Calculer'])){
    $lg = $_POST['lg'];
    $lr = $_POST['lr'];
    $p = 2 * ($lg + $lr);
    $s = $lg * $lr;
    printf(" &lt;br&gt; le périmètre est de :%f", $p);
    printf(" &lt;br&gt; l'aire est de :%f", $s);
}
?&gt;
</pre>
        </div>
        <div class="tab-pane fade" id="js1">
<pre class="code-block">
&lt;script type='text/javascript'&gt;
    let lg = parseFloat(prompt("Donner la longueur: "));
    let lr = parseFloat(prompt("Donner la largeur: "));
    let p = 2 * (lg + lr);
    let s = lg * lr;
    alert("la surface est de : " + s + " et le périmètre est de: " + p);
&lt;/script&gt;
</pre>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>