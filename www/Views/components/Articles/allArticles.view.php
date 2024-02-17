<?php namespace App\Controllers; ?>
<h1>Mes articles</h1>
<section class="button-section">
    <div class="filters">
        <ul class="link-list">
            <li><a href="#">Publiés </a></li>
            <li><a href="#">Brouillon</a></li>
            <li><a href="#">Corbeille</a></li>
            <li><div class="fix-right"><a href="/articles/add-article"><button class="button button-primary">Ajouter un nouveau</button></a></div></li>
        </ul>
    </div>
</section>

<section class="all-blogs">
    <div class="my-blogs">
        <?php 
            $articleController = new \App\Controllers\Articles();
            $allArticles = $articleController->getAllArticles();

            foreach ($allArticles as $articleData): ?>
            <div class="one-blog">
                <div class="edit-icon">
                    <a href="/articles/edit-article" class="link-primary">Edit</a>
                    <a href="#" id="deleteArticleLink" onclick="deleteArticle(<?php echo $articleData['id']; ?>); return false;" class="link-danger">Supprimer</a>
                </div>
                <div class="blog-title"><h3><?php echo $articleData['title']; ?></h3></div>
                <div class="article-text"><?php echo $articleData['description']; ?></div>
                <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($articleData['createdat'])); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
    function deleteArticle(articleId) {
        // Appeler la méthode deleteArticle avec l'ID de l'article
        // Vous pouvez faire une requête AJAX ici pour appeler le backend, par exemple
        // Ou vous pouvez rediriger vers une page de traitement avec l'ID

        // Exemple avec une requête AJAX (utilisez la bibliothèque JavaScript appropriée, comme jQuery, si nécessaire)
        // Remplacez l'URL par l'URL réelle de votre backend
        fetch('/votre-backend/delete-article.php?id=' + articleId, {
            method: 'DELETE',
        })
        .then(response => {
            // Traitez la réponse du serveur ici
            console.log(response);
        })
        .catch(error => {
            // Gérez les erreurs ici
            console.error('Erreur lors de la suppression de l\'article :', error);
        });
    }
</script>
