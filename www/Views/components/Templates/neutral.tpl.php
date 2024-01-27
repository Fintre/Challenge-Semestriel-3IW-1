<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Back</title>
    <link rel="stylesheet" type="text/css" href="/Views/CSS/output.css">
</head>
<body>
    <header id="header" class="back-office-header">
        <p>Mon site</p>
        <div class="profil-button">
            <a href="#" class="site-profil-logo">
               <img src="/Views/CSS/assets/GoFindMe_profil.png" alt="profil">
            </a>
        </div>
    </header>
    <main class="back-office-content">
        <?php include $this->viewName;?>
    </main>
    </div>
</body>

</html>
