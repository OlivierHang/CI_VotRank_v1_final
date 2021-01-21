<div class="container-wrap">

    <?php if ($votes != null) : ?>

        <?php foreach ($votes as $new_votes) : ?>

            <div class="card">

                <div class=content>

                    <h2><?= esc($new_votes['ID']); ?></h2>

                    <h3><?= esc($new_votes['NomSujet']); ?></h3>
                    <p>
                        Total de votes: <?= esc($new_votes['TotalVotes']); ?>

                    </p>
                    <a href="<?= base_url() ?>/public/Tableaudebord/view/<?= esc($new_votes['ID'], 'url'); ?>">Administrer</a>
                    <a href="<?=base_url()?>/public/vote/index/<?=esc($new_votes['ID']);?>">Page de vote</a>
                    

                </div>

            </div>


        <?php endforeach; ?>


</div>

<?php else : ?>

    <div class="PasVote">

        <h3>Oops  !! Pas de votes pour l'instant..</h3>
        <h4 class="subtitle">Pour créer un vote veuillez cliquer sur    </h4>
        <br>
        <br>
        <br>
       <a class="btnCre" href="<?= base_url()?>/public/vote/creation">
       <span class="btnspan">C'est parti !</span>
       <span class="btnspan">C'est parti !</span>
       
       </a>
       
       

    </div>
<?php endif; ?>