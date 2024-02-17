<?php namespace App\Controllers; ?>
<h2>Mes articles</h2>
<section class="section1-status-tab">
    <table class="status-tab">
        <thead>
            <tr class="tab">
                <th class="tab-item active"><a href="#">Tous</a></th>
                <th class="tab-item"><a href="#">Publiées</a></th>
                <th class="tab-item"><a href="#">Brouillon</a></th>
                <th class="tab-item"><a href="#">Corbeille</a></th>
            </tr>
        </thead>
    </table>
</section>
<section class="all-blogs">
    <?php 
        $articleController = new \App\Controllers\Articles();
        $allArticles = $articleController->getAllArticles();

        foreach ($allArticles as $articleData): ?>
        <div class="one-blog">
            <div class="edit-icon">
                <a href="/articles/edit-article?article=<?php echo $articleData['id']; ?>" class="link-primary">Edit</a>
                <!-- integrer un formulaire ici avec un button : class="link-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')<a href="#" id="deleteArticleLink" data-article-id="<?php echo $articleData['id']; ?>" class="link-danger">Supprimer</a> -->
            </div>
            <div class="blog-title"><h4><?php echo $articleData['title']; ?></h4></div>
            <div class="article-text"><?php echo $articleData['description']; ?></div>
            <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($articleData['createdat'])); ?></div>
        </div>
    <?php endforeach; ?>
</section>
<section class="section5-page-add">
    <button class="button button-primary">Ajouter un nouvel article</button>
</section>
