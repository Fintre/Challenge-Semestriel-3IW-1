<?php namespace App\Controllers; ?>
<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                    <a href="/articles/edit-article?article=<?php echo $articleData['id']; ?>" class="link-primary">Edit</a>
                    <a href="#" id="deleteArticleLink" data-article-id="<?php echo $articleData['id']; ?>" class="link-danger">Supprimer</a>
                </div>
                <div class="blog-title"><h3><?php echo $articleData['title']; ?></h3></div>
                <div class="article-text"><?php echo $articleData['description']; ?></div>
                <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($articleData['createdat'])); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
$(document).ready(function() {
    $("#deleteArticleLink").on("click", function(event) {
        // Empêcher le comportement par défaut du lien
        event.preventDefault();
        var articleId = $(this).data("article-id");
        console.log(articleId)

        // Effectuer la requête AJAX
        $.ajax({
            url: "../../../Controllers/Articles.php",
            method: "POST",
            data: { id: articleId, action: "deleteArticle" },
            success: function(response) {
                console.log(response);
                //location.reload();
            },
            error: function(error) {
                console.error("Erreur AJAX:", error);
            }
        });
    });
});
</script>

