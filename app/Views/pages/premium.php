<link rel="stylesheet" href=" <?php echo base_url('public/css/paymentStyles.css') ?>  ">
<section class="offrePremium">
<div class="propositionGratuit">
        <div class="logoGratuit">Free</div>                   
        <h2>Sans abonnement premium</h2>  
        <p><img src="../images/green.png"> Création de vote</p>  
        <p><img src="../images/red.png"> Participation unique</p>  
        <p><img src="../images/red.png"> Rappel</p>  
        <p><img src="../images/red.png"> Relances automatiques</p>
    </div>
    <div class="propositionPremium">
        <div class="logoPremium">Premium</div>                   
        <h2>Pour seulement 2€/Mois</h2>  
        <p><img src="../images/green.png"> Création de vote</p>  
        <p><img src="../images/green.png"> Participation unique</p>  
        <p><img src="../images/green.png"> Rappel</p>  
        <p><img src="../images/green.png"> Relances automatiques</p>

        <?php if( !isset($_SESSION["logged_in"])) :  ?>
            <p id="btnAcheterPremium"><a href= " <?php echo base_url('public/login') ?> ">Acheter l'abonnement</a></p>  
        <?php endif; ?>

        <?php if( isset($_SESSION["logged_in"]) && $_SESSION["Premium"] == "0") :  ?>
            <p id="btnAcheterPremium"><a href= " <?php echo base_url('public/Home/PremiumSettings') ?> ">Acheter l'abonnement</a></p>  
        <?php endif; ?>

        <?php if( isset($_SESSION["logged_in"]) && $_SESSION["Premium"] == "1") :  ?>
            <p id="btnAcheterPremium"><a href= "#">Vous etes premium</a></p>  
        <?php endif; ?>

    </div>
</section>
