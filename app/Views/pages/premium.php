<section class="banniere">
    <div class="votRankLogo"><img src="../images/votRankLogo.PNG"></div>
    <div class="votRankText">La manière la plus rapide pour créer vos votes en ligne</div>
</section>
<section class="offrePremium">
    <div class="propositionGratuit">
        <div class="logoGratuit">
            <h1>Gratuit</h1>
        </div>
        <h2>Sans abonnement premium</h2>
        <p><img src="../images/GreenOk.png"> Création de vote</p>
        <p><img src="../images/RedNotOk.png"> Participation unique</p>
        <p><img src="../images/RedNotOk.png"> Rappel</p>
        <p><img src="../images/RedNotOk.png"> Relances automatiques</p>
    </div>
    <div class="propositionPremium">
        <div class="logoPremium">
            <h1>Premium</h1>
        </div>
        <h2>Pour seulement 2€/Mois</h2>
        <p><img src="../images/GreenOk.png"> Création de vote</p>
        <p><img src="../images/GreenOk.png"> Participation unique</p>
        <p><img src="../images/GreenOk.png"> Rappel</p>
        <p><img src="../images/GreenOk.png"> Relances automatiques</p>

        <?php if (!isset($_SESSION["logged_user_name"])) :  ?>
            <p id="btnAcheterPremium"><a href=" <?php echo base_url('public/login') ?> ">Acheter l'abonnement</a></p>
        <?php endif; ?>

        <?php if (isset($_SESSION["logged_user_name"])) :  ?>
            <p id="btnAcheterPremium"><a href=" <?php echo base_url('Home/PremiumSettings') ?> ">Acheter l'abonnement</a></p>
        <?php endif; ?>

    </div>
</section>