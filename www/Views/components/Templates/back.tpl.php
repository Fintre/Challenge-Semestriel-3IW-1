<?php namespace App\Controllers; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Back</title>
    <link rel="stylesheet" type="text/css" href="/Views/styles/dist/css/style.css">
    <script src="/Views/styles/dist/js/main.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-g6R+2qH1I8hzl6fXExdSN3R/xkA6r0/KRXC5WAPtzIiq/T6NoD2efpZ/KisK/AJUp" crossorigin="anonymous">

	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header id="header" class="back-office-header">
				<p>Mon site</p>
				<div class="profil-button" data-modal-open="modal2">
					<a href="#" class="site-profil-logo">
					   <img src="/Views/styles/dist/images/GoFindMe_profil.png" alt="profil">
					</a>
				</div>
				<div class="modal" id="modal2">
					<section>
						<header>
							<h4>Choisir une action</h4>
						</header>
						<div class="modal_content">
							<form id="logout-form" action="/login/logout" method="POST">
								<button type="submit" name="logout" class="text">Déconnexion</button>
							</form>
							<!-- <a><p class="text">Deconnexion</p></a> -->
							<a><p class="text">Mon profil</p></a>
							<a><p class="text">Paramètres</p></a>
						</div>
						<footer>
							<button class="button button-primary" data-modal-close>
								Close
							</button>
						</footer>
	</header>
    <div class="back-office-nav-main">
    <nav class="navbar">
				<div class="container">
					<button class="navbar_toggle_button" data-target="#content">
						Menu
					</button>
					<div class="navbar_toggle_content" id="content">
						<ul>
							<li>
								<a href="/bo/dashboard" class="accordion">
                                    <div class="accordion-title">Tableau de bord</div>
                                    <div class="accordion-icon"> </div>
                                </a>
							</li>
							<li>
								<a href="/bo/posts" class="accordion">
                                    <div class="accordion-title">Pages</div>
                                    <div class="accordion-icon"> </div>
                                </a>
							</li>
							<li>
								<a href="/bo/medias" class="accordion">
									<div class="accordion-title">Média</div>
									<div class="accordion-icon"> </div>
								</a>
							</li>
                            <li>
								<a href="/bo/articles" class="accordion">
									<div class="accordion-title">Articles</div>
									<div class="accordion-icon"> </div>
								</a>
							</li>
                            <li>

                                <a href="/bo/blogs" class="accordion">
                                    <div class="accordion-title">Blogs</div>
                                    <div class="accordion-icon"> </div>
                                </a>
                            </li>
                     
                <li>

								<a href="/bo/themes" class="accordion">
									<div class="accordion-title">Thèmes</div>
									<div class="accordion-icon"> </div>
								</a>
							</li>
                            <li>
								<a href="/bo/user" class="accordion">
									<div class="accordion-title">Utilisateurs</div>
									<div class="accordion-icon"> </div>
								</a>
							</li>
							<li>
								<a href="/bo/settings" class="accordion">
									<div class="accordion-title">Réglages</div>
									<div class="accordion-icon"> </div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
        <main class="back-office-content">
            <?php include $this->viewName;?>
        </main>
    </div>
</body>

</html>
