

<div class="container-fluid flex-grow-1 d-flex">
    <div class="row flex-grow-1 w-100">
        <!-- SIDEBAR -->
        <nav class="col-md-2 sidebar">
            <h5 class="border-bottom pb-2 mb-3">Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="index.php?page=cours">Chapitres</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-primary" href="index.php?page=index">compilateur</a></li>
            </ul>
        </nav>

        <!-- MAIN CONTENT -->
        <main class="col-md-10 p-4">
            
            <!-- CHAPITRES -->
            <div class="row mb-5">
                <div class="col-md-5">
                    <h4 class="mb-3">Chapitres</h4>
                    <ul class="list-group list-group-flush border">
                        <li class="list-group-item">1 - Notions générales</li>
                        <li class="list-group-item">2 - Boucles (Somme, Diviseurs)</li>
                        <li class="list-group-item">3 - Tableaux</li>
                        <li class="list-group-item">4 - Procédures & Fonctions</li>
                        <li class="list-group-item">5 - Équations</li>
                        <li class="list-group-item">6 - Fichiers</li>
                    </ul>
                </div>
                <div class="col-md-7 d-flex align-items-center">
                    <div class="p-3 bg-light rounded border border-secondary border-opacity-25">
                        <p class="mb-0 text-muted fst-italic">
                            <span class="fw-bold">Note :</span> Chaque lien dirige vers les versions d'exercices déclinées en : <br>
                            <strong>Algo <span class="schema-arrow">→</span> C <span class="schema-arrow">→</span> PHP <span class="schema-arrow">→</span> JS</strong>
                        </p>
                    </div>
                </div>
            </div>

            <!-- EXERCICES SECTION -->
            <h4 class="border-bottom pb-2 mb-4">Exercices d'application</h4>
            
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Exo 1 : Calcul de la surface d'un Rectangle</h5>
                </div>
                <div class="card-body">
                    <!-- TABS -->
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill" href="#algo1">Algo (Texte)</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#c1">C (Compilateur)</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#php1">PHP (Exécution Web)</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#js1">JS (Exécution Web)</a></li>
                    </ul>

                    <!-- TAB CONTENT -->
                    <div class="tab-content">
                        <!-- ALGO -->
                        <div id="algo1" class="tab-pane active">
                            <p class="text-muted small">Format texte uniquement</p>
                            <pre class="code-area">
Algo : Rectangle
Déclaration
    lg, lr, s, p : réel
Début
    Afficher("Donner la longueur")
    Saisir(lg)
    Afficher("Donner la largeur")
    Saisir(lr)
    s <- lg * lr
    p <- 2 * (lg + lr)
    Afficher("La surface est de : ", s)
Fin Rectangle
                            </pre>
                        </div>

                        <!-- C -->
                        <div id="c1" class="tab-pane fade">
                            <p class="text-muted small">Compilateur en ligne</p>
                            <textarea class="form-control code-area mb-2" rows="9">
#include <stdio.h>
int main() {
    float lg = 5.0;
    float lr = 3.0;
    float s = lg * lr;
    float p = 2 * (lg + lr);
    printf("La surface est de: %f\n", s);
    printf("Le perimetre est de: %f\n", p);
    return 0;
}</textarea>
                            <button class="btn btn-dark" onclick="runSimulation('Compilation avec GCC...\n\nLa surface est de: 15.000000\nLe perimetre est de: 16.000000')">Compiler et Exécuter (C)</button>
                        </div>

                        <!-- PHP -->
                        <div id="php1" class="tab-pane fade">
                            <p class="text-muted small">Exécution Web via serveur (Simulé)</p>
                            <textarea class="form-control code-area mb-2" rows="8">
<?php
$lg = 5;
$lr = 3;
$p = 2 * ($lg + $lr);
$s = $lg * $lr;
echo "la surface est de: " . $s . "<br>";
echo "le perimetre est de: " . $p;
?></textarea>
                            <button class="btn btn-primary" onclick="runSimulation('la surface est de: 15<br>le perimetre est de: 16')">Exécuter (PHP)</button>
                        </div>

                        <!-- JS -->
                        <div id="js1" class="tab-pane fade">
                            <p class="text-muted small">Exécution Web native navigateur</p>
                            <textarea id="jsCode1" class="form-control code-area mb-2" rows="7">
let lg = 5;
let lr = 3;
let s = lg * lr;
let p = 2 * (lg + lr);

// Retourne la valeur pour le terminal
"La surface est de : " + s + ", le périmètre est de : " + p;
                            </textarea>
                            <button class="btn btn-warning" onclick="runJS('jsCode1')">Exécuter (JS)</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COMPILER OUTPUT TERMINAL -->
            <div class="mt-4">
                <h5 class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-terminal me-2" viewBox="0 0 16 16">
                        <path d="M6 9a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3A.5.5 0 0 1 6 9zM3.854 4.146a.5.5 0 1 0-.708.708L4.793 6.5 3.146 8.146a.5.5 0 1 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2z"/>
                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h12z"/>
                    </svg>
                    Console d'exécution
                </h5>
                <div id="terminalOutput" class="compiler-output shadow-inner">
                    En attente d'exécution du code...
                </div>
            </div>

        </main>
    </div>
</div>

