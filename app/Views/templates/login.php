 <div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-2"> 
            <h3>Se connecter</h3>
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
                <form action="<?= base_url('public/login/auth') ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="Mail" class="form-control" placeholder="Email *" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="MotDePasse" class="form-control" placeholder="Mot de passe *" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Se connecter" />
                    </div>
                    <div class="form-group">

                        <a href="#" class="ForgetPwd" value="Login">Mot de passe oublier ?</a>
                        
                    </div>
                    <div class="form-group">
                    <a href="<?= base_url('public/register') ?>" class="ForgetPwd" value="Login">Créer un compte</a>
                    </div>
                </form>
         </div>
     </div>
</div> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  