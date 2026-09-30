<!-- FOOTER -->
<footer class="footer d-flex justify-content-between align-items-center">
    <div class="text-muted fw-bold">
        inc, B. LFA adnane
    </div>
    <div>
        <a href="#" class="text-decoration-none text-secondary">Réseaux sociaux</a>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fonction pour simuler la compilation C et l'exécution PHP
    function runSimulation(output) {
        document.getElementById('terminalOutput').innerHTML = "<span class='text-secondary'>$ execution...</span><br><br>" + output;
    }

    // Fonction d'exécution réelle pour le JavaScript
    function runJS(elementId) {
        try {
            const code = document.getElementById(elementId).value;
            const result = eval(code);
            document.getElementById('terminalOutput').innerHTML = "<span class='text-secondary'>$ node script.js</span><br><br>> " + result;
        } catch (e) {
            document.getElementById('terminalOutput').innerHTML = "<span class='text-danger'>Erreur d'exécution JS : " + e + "</span>";
        }
    }
</script>
</body>
</html>