<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Back</title>
    <link rel="stylesheet" type="text/css" href="/Views/styles/dist/css/style.css">
</head>
<body>
    <header id="header" class="back-office-header">
        <p>Mon site</p>
        <div class="profil-button">
            <a href="#" class="site-profil-logo">
               <img src="/Views/styles/dist/images/GoFindMe_profil.png" alt="profil">
            </a>
        </div>
    </header>
    <div class="back-office-nav-main">
            <nav class="back-office-navbar">
                <div class="accordion-container">
                    <a href="" class="accordion">
                        <div class="accordion-title">Tableau de bord</div>
                        <div class="accordion-icon"></div>
                    </a>
                    <a href="" class="accordion">
                        <div class="accordion-title">Pages</div>
                        <div class="accordion-icon"></div>
                    </a>
                    <a href="" class="accordion">
                        <div class="accordion-title">Média</div>
                        <div class="accordion-icon"></div>
                    </a>
                    <a href="" class="accordion">
                        <div class="accordion-title">Articles</div>
                       <div class="accordion-icon"> </div>
                    </a>
                    <a href="" class="accordion">
                        <div class="accordion-title">Commentaires</div>
                        <div class="accordion-icon"> </div>
                    </a>
                    <a href="" class="accordion">
                        <div class="accordion-title">Avis</div>
                        <div class="accordion-icon"> </div>
                    </a>
                    <a href="" class="accordion">
                        <div class="accordion-title">Apparence</div>
                        <div class="accordion-icon"> </div>
                    </a>
                    <a href="" class="accordion">
                        <div class="accordion-title">Utilisateurs</div>
                        <div class="accordion-icon"> </div>
                    </a>
                    <a href="" class="accordion">
                        <div class="accordion-title">Réglages</div>
                        <div class="accordion-icon"> </div>
                    </a>
                </div>
            </nav>
        <main class="back-office-content">
            <?php include $this->viewName;?>
        </main>
    </div>
</body>

</html>
