<link rel="stylesheet" href="<?= base_url('public/css/style.css.map') ?>" />
    <div class="main">


<div class="register-container">
<h3>Création d'un compte</h3>
    <div class="sign-up-content">
        <!-- <form method="POST" class="signup-form"> -->
        <form action="<?= base_url('public/register/save') ?>" method="post">
            <div class="form-textbox">
                <label for="nom">Nom</label>
                <input type="text" name="Nom" id="Nom" required/>
            </div>

            <div class="form-textbox">
                <label for="name">Prenom</label>
                <input type="text" name="Prenom" id="Prenom" required/>
            </div>

            <div class="form-textbox">
                <label for="email">Email</label>
                <input type="email" name="Mail" id="Mail" required/>
            </div>

                <div class="form-textbox">
                <label for="pass">Password</label>
                <input type="password" name="MotDePasse" id="MotDePasse" required/>
            </div>

            <!-- <div class="form-group">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                <label for="agree-term" class="label-agree-term"><span><span></span></span>J'accepte les conditions d'utilisations : <a href="#" class="term-service">Conditions d'utilisations</a></label>
            </div> -->

            <div class="form-textbox">
                <input type="submit" name="submit" id="submit" class="submit" value="Créer mon compte" />
            </div>
        </form>

        <p class="loginhere">
            Vous avez déjà un compte ?<a href="<?= base_url('public/login') ?>" class="loginhere-link"> Se connecter</a>
        </p>
    </div>
</div>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>