<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Creation de vote | Vot'Rank</title>
  <!-- BOOTSTRAP CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/css/creation_vote.css" />
</head>

<body>
  <!-- Navbar Bootstrap -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#"><img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="" loading="lazy" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Formulaire / Conteneur principal -->
  <form id="conteneurPrincipal" action="<?= base_url() ?>/vote/creation" method="post">
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
          <button id="btnDelchoix_1" onclick='delProposition("choix_1")'>
            -
          </button>
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

  <!-- JS custom SCRIPT -->
  <script src="<?= base_url() ?>/js/creation_vote.js"></script>

  <!-- BOOTSTRAP JS SCRIPT -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>