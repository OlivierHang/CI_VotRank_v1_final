<div id="conteneurPrincipal">
  <!-- Conteneur du résultat de CHART JS -->
  <div id="conteneurChart" style="width: 55%">
    <canvas id="myChart"></canvas>
  </div>

  <p><a href="<?= base_url('public/vote/index/' . $idVote) ?>"><button>Retour</button></a></p>
</div>

<!-- CHART JS SCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
  let noms = <?= $noms ?>;
  let points = <?= $points ?>;
  let titre = <?= $titre ?>;
</script>
<script src="<?= base_url() ?>/public/js/resultat.js"></script>