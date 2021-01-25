<link rel="stylesheet" href=" <?php echo base_url('public/css/paymentStyles.css') ?>  ">
<section class="achatPremium">
        <?php
            $date_debut = new DateTime('now');
            $date_debut_BDD = $date_debut->format('Y-m-d h:i:s'); // format MySql

            $date_fin = $date_debut->modify('+1 month');
            $date_fin_BDD = $date_fin->format('Y-m-d h:i:s'); // format MySql
            
        ?>
        <?php if(isset($_SESSION["erreurExpirationCB"])) : ?>
            <div style = 'text-align: center;color: red;font-weight:bold;font-size:18px;'>Date d'expiration CB invalide</div> 

        <?php endif ?>

        <?php if( isset($validation) ) : ?>
            <div style = 'text-align: center;color: red;font-weight:bold;font-size:18px;width:300px;margin:0 auto;'> <?php echo $validation->listErrors(); ?></div> 
        <?php endif ?>
        <?php  echo form_open(base_url('public/home/PremiumSettings'),'class="infosUser"'); ?>
            <input type="hidden" name="Mail" value = "<?php echo($_SESSION["Mail"]) ?>" readonly>
            <input type="hidden" step="0.01" name="Prix" value =2 readonly>
            <input type="hidden" name="Date_debut" value= "<?php echo($date_debut_BDD) ?>" readonly>
            <input type="hidden" name="Date_fin" value= "<?php echo($date_fin_BDD) ?>" readonly>

            <div class="wrapper">
                <div class="payment">
                    <div class="payment-logo"></div>                   
                    <h2>Formulaire de paiement</h2>
                    <div class="form">
                        <div class="space icon-relative">
                            <label class="label">Nom sur la carte</label>
                            <input type="text" class="input" placeholder="Nom Prénom" name="nomCompletCB">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="space icon-relative">
                            <label class="label">Numéro de la carte</label>
                            <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="0000 0000 0000 0000"  name="numeroCB">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <div class="card-grp space">
                            <div class="card-item icon-relative">
                                <label class="label">Date d'expiration:</label>
                                <input type="text" class="input" data-mask="00 / 00"  placeholder="00 / 00"  name="expirationCB">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="card-item icon-relative">
                                <label class="label">CVC:</label>
                                <input type="text" class="input" data-mask="000" placeholder="000"  name="CVC">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <div class="checkBoxInput">
                            <p>Cochez ci-dessous pour renouveller automatiquement</p>
                            <input type="checkbox" name="Renouvellement" value=1>
                        </div>
                        <div class="btn">

                            <?php  if($_SESSION["Premium"] == "1") :?>
                            <input type="text" value="Vous etes premium" class="validationAchat" readonly>
                            <?php  endif; ?>

                            <?php  if($_SESSION["Premium"] =="0") :?>
                            <input type="submit" value="Valider" class="validationAchat">
                            <?php  endif; ?>

                        </div> 
                    </div>
                </div>
            </div>
        <?php  echo form_close(''); ?>
</section>   
