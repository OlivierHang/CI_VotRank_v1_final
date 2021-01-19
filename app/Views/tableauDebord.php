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
                    <a href="<?= base_url() ?>/public/TableauDeBord/view/<?= esc($new_votes['ID'], 'url'); ?>">Administrer</a>

                </div>

            </div>


        <?php endforeach; ?>


</div>

<?php else : ?>

    <div class="PasVote">

        <h3>il n'y a pas de votes en COURS.....</h3>

    </div>
<?php endif; ?>