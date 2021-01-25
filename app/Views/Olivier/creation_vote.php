<link rel="stylesheet" href="<?php echo base_url() ?>/public/css/creation_vote.css" />

<!-- Formulaire / Conteneur principal -->
<form id="conteneurPrincipal" action="<?= base_url() ?>/public/vote/creation" method="post">
  <!-- Input Sujet du vote -->
  <div id="conteneurSujet">
    <input name="NomSujet" type="text" placeholder="Sujet du vote" required />
  </div>
  <!-- Conteneur des propositions -->
  <div id="conteneurChoix">
    <!-- Liste proposition -->
    <ul id="listeChoix">
      <li id="choix_1" >
        <input class="choixItem" name="choix_1" type="text" placeholder="Choix..." required />
        <input class="btnMoins" type="button" value="Retirer" id="btnDelChoix_1" onclick='delProposition("choix_1")' />
      </li>
    </ul>
    <!-- Bouton Ajouter -->
    <div id="addProposition" >
      <span class="spanBtn2">

      <input type="button" value="Ajouter" id="btnAddProposition" onclick="addProposition()" />
      </span>
    </div>
  </div>
  <!-- Bouton Submit Formulaire -->
  <div class="btnContainer">
  <span class="spanBtn">
  <input class="btnSub" type="submit" name="submit" value="Créer le vote">
  </span>
  </div>
</form>