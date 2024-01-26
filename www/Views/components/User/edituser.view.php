<?php use App\Forms\EditUser;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/Views/CSS/output.css">
    <title>Éditer un utilisateur</title>
</head>
<body>
<h1>Mon profil</h1>
<section class="edit-form">
    <div class=" grid col-6"><h1>Informations personnelles</h1>
        <div>
            <?php
            $connexionForm = new EditUser();
            echo $connexionForm->renderForm();
            ?>
        </div>
    </div>
</section>
<section class="my-pages">
<h1>Mes pages</h1>
</section>
</body>
</html>
