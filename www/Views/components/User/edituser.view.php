<?php use App\Forms\EditUser;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../CSS/components/User/_user.scss">
    <title>Éditer un utilisateur</title>
</head>
<body>
<div class="central"><h1>Mon profil</h1></div>
    <div class="row">
        <div class=" grid col-6"><h1>Informations personnelles</h1>
            <div>
                <?php
                $connexionForm = new EditUser();
                echo $connexionForm->renderForm();
                ?>
            </div>
        </div>
        <div class="col-6">
            <h1>Mes pages</h1>
            <!--<div>
                <?php
                /*$connexionForm = new EditUser();
                echo $connexionForm->renderForm();*/
                ?>
            </div>-->
        </div>
    </div>
</body>
</html>
