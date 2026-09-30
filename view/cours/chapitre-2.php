<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chapitre 2 : Alternatives & Équations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>.code-block { background-color: #2d2d2d; color: #f8f8f2; padding: 15px; border-radius: 5px; font-family: monospace; }</style>
</head>
<body class="p-4">
    <a href="index.php?page=cours" class="btn btn-outline-secondary mb-3">&larr; Retour aux cours</a>
    <h2>Chapitre 2 : Structures Alternatives (Équations)</h2>
    
    <ul class="nav nav-tabs mt-4" id="chap2Tabs">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#php2">PHP</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#js2">JavaScript</a></li>
    </ul>

    <div class="tab-content border border-top-0 p-3">
        <!-- PHP -->
        <div class="tab-pane fade show active" id="php2">
<pre class="code-block">
&lt;form method="post"&gt;
    Premier Coeff : &lt;br&gt;
    &lt;input type="number" name="a"&gt; &lt;br&gt;
    Second Coeff : &lt;br&gt;
    &lt;input type="number" name="b"&gt; &lt;br&gt;
    &lt;input type="submit" name="Résoudre" value="Résoudre"&gt;
&lt;/form&gt;

&lt;?php
if(isset($_POST["Résoudre"])){
    $a = $_POST["a"];
    $b = $_POST["b"];
    if ($a == 0){
        if ($b == 0){
            printf("l'ensemble des solution est R");
        } else {
            printf("il n'y a pas de solution") ;
        }
    } else {
        $x = -$b/$a ;
        printf("la solution est : %f", $x);
    } 
}
?&gt;
</pre>
        </div>
        <!-- JS -->
        <div class="tab-pane fade" id="js2">
<pre class="code-block">
&lt;script type="text/javascript"&gt;
    var a = parseFloat(prompt("Donner le premier coeff : "));
    var b = parseFloat(prompt("Donner le second coeff : "));
    if (a == 0){
        if (b == 0){
            alert("l'ensemble des solution est R");
            document.write("l'ensemble des solution est R");
        } else {
            alert("il n'y a pas de solution");
            document.write("il n'y a pas de solution") ;
        }
    } else {
        var x = -b/a ;
        alert("la solution est :" + x);
        document.write("la solution est :" + x);
    }
&lt;/script&gt;
</pre>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>