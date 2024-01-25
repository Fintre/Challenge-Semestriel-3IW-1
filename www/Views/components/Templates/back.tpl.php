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
    <header id="header" class="site-template-back-header">
        <h3>Mon site</h3>
        <div class="profil-button">
                <a href="#" class="site-profil-logo">
                   <img src="/Views/CSS/assets/GoFindMe_profil.png" alt="profil">
                </a>
        </div>
    </header>
    <main>
        <section class="section1-sidebar">
            <div class="sb-menu">
                <div class="sb-logo">
                    <nav>
                        <a href="#" class="site-logo">
                            <img src="/Views/CSS/assets/GoFindMe_logo.png" alt="logo">
                        </a>
                    </nav>
                </div>
                <div class="sb-menu-navigation" >
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
                </div>
            </div>
        </section>
        <section class="section2-page-content">
        <?php include $this->viewName;?>
        </section>
    </main>
</body>
</html>
