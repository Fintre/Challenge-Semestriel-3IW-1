<?php use App\Forms\Connexion;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../CSS/components/Security/_security.scss">
    <title>Connexion</title>
</head>
<body>
    <section class="central">
        <div class="my-box">
            <div><h1>Connexion</h1></div>
            <div>
                <?php
                $connexionForm = new Connexion();
                echo $connexionForm->renderForm(); ?>
            </div>
            <div><a href="/login/recover-password" data-controller="Security" data-action="forgetPassword">Mot de passe oublié ?</a></div>
        </div>
    </section>

</body>
</html>