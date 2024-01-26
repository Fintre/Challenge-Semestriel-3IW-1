
    <section class="central">
        <div class="my-box">
            <div><h1>Connexion</h1></div>
            <div>
            <?php $this->includeComponent("form", $configForm, $errorsForm, "button button-primary");?>
            </div>
            <div><a href="/login/recover-password" data-controller="Security" data-action="forgetPassword">Mot de passe oublié ?</a></div>
        </div>
    </section>
