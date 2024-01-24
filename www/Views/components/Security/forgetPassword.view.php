<?php use App\Forms\RecoverPassword;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/Views/CSS/output.css">
    <title>Connexion</title>
</head>
<body>
<section class="central">
    <div class="my-box">
        <div><h1>Récuperer mon mot de passe</h1></div>
        <div class="central">Insérer votre login ou e-mail pour obtenir un code de récupération pour changer le mot de passe.</div>
        <div>
            <?php
            $connexionForm = new RecoverPassword();
            echo $connexionForm->renderForm(); ?>
        </div>
        <div><a href="#">Renvoyer le code</a></div>
    </div>
</section>

</body>
</html>
