<link rel="stylesheet" href="<?= base_url() ?>/public/css/vote.css" />
<div id="conteneurPrincipal">
  <form id="conteneurVote" action="<?= base_url() ?>/public/vote/index" method="post">
    <h3> <?= $titre ?> </h3>  
    <br>
    <ol id="items">
      <?php foreach ($choix as $choix_item) : ?>
        <li class="choix"><input type="hidden" name="arrayChoix[]" value="<?= $choix_item ?>"><?= $choix_item ?></li>
      <?php endforeach; ?>
    </ol>
    <input type="hidden" name="idVote" value="<?= $idVote ?>">
    <input type="submit" name="submit" value="Je Vote !">
    <br>
  </form>
  <p>Lien du vote : <?= base_url('public/vote/index/' . $idVote) ?></p>
  <button onclick="copyTextToClipboard(`<?= base_url('public/vote/index/' . $idVote) ?>`)">Copier lien</button>
</div>