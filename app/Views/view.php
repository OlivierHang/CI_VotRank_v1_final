<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/assets/css/styleView.css ">
    <title>Administration</title>
</head>

<body>



    <div class="container">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/assets/css/styleG.css">
        <div class="container-wrap">
            <div class="card">

                <div class=content>
                    <h2><?= esc($votes['ID']); ?></h2>
                    <h3><?= esc($votes['NomSujet']); ?></h3>
                    <p>
                        Nombres de votes : <?= esc($votes['TotalVotes']); ?>

                    </p>


                    <a href="<?php echo base_url(); ?>/public/Tableaudebord/delete/<?= esc($votes['ID']); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer -- <?= esc($votes['NomSujet']); ?>-- ?')">Delete</a>
                    <a href="<?php echo base_url();?>/public/vote/resultat/<?=esc($votes['ID']);?>">Resultats</a>

                </div>

            </div>
        </div>
    </div>





</body>



</html>