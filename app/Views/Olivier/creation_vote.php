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
      <li id="choix_1" class="proposition">
        <input name="choix_1" type="text" placeholder="Choix..." required />
        <input type="button" value="-" id="btnDelChoix_1" onclick='delProposition("choix_1")' />
      </li>
    </ul>
    <!-- Bouton Ajouter -->
    <div id="addProposition" class="proposition">
      <input type="button" value="+" id="btnAddProposition" onclick="addProposition()" />
    </div>
  </div>
  <!-- Bouton Submit Formulaire -->
  <input type="submit" name="submit" value="Créer le vote">
</form>