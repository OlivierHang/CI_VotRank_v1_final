
<section class="offrePremium">
<div class="propositionGratuit">
        <div class="logoGratuit"></div>                   
        <h2>Sans abonnement premium</h2>  
        <p><img src="../images/GreenOk.png"> Création de vote</p>  
        <p><img src="../images/RedNotOk.png"> Participation unique</p>  
        <p><img src="../images/RedNotOk.png"> Rappel</p>  
        <p><img src="../images/RedNotOk.png"> Relances automatiques</p>
    </div>
    <div class="propositionPremium">
        <div class="logoPremium"></div>                   
        <h2>Pour seulement 2€/Mois</h2>  
        <p><img src="../images/GreenOk.png"> Création de vote</p>  
        <p><img src="../images/GreenOk.png"> Participation unique</p>  
        <p><img src="../images/GreenOk.png"> Rappel</p>  
        <p><img src="../images/GreenOk.png"> Relances automatiques</p>

        <?php if( !isset($_SESSION["logged_in"])) :  ?>
            <p id="btnAcheterPremium"><a href= " <?php echo base_url('public/LogIn') ?> ">Acheter l'abonnement</a></p>  
        <?php endif; ?>

        <?php if( isset($_SESSION["logged_in"]) && $_SESSION["Premium"] == "0") :  ?>
            <p id="btnAcheterPremium"><a href= " <?php echo base_url('public/Home/PremiumSettings') ?> ">Acheter l'abonnement</a></p>  
        <?php endif; ?>

        <?php if( isset($_SESSION["logged_in"]) && $_SESSION["Premium"] == "1") :  ?>
            <p id="btnAcheterPremium"><a href= "#">Vous etes premium</a></p>  
        <?php endif; ?>

    </div>
</section>
