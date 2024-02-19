<h2>Mes blogs</h2>
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

        foreach ($allArticles as $articleData): ?>
        <div class="one-blog">
            <div>
                <div class="edit-icon"><a href="/blogs/edit-blog" class="link-primary">Edit</a><a href="#" class="link-danger">Supprimer</a></div>
                <div class="blog-title"><h4><?php echo $articleData['title']; ?></h4></div>
                <div class="blog-text">
                    <img src="https://sf1.lechasseurfrancais.com/wp-content/uploads/2023/11/shutterstock_2321514999-scaled.jpg" alt="image" width="200" height="100" class="blog-image">
                    <div class="text-content text-width"><p><?php echo $articleData['description']; ?></p></div>
                </div>
                <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($articleData['createdat'])); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<section class="section5-page-add">
    <button class="button button-primary">Ajouter un nouvel article</button>
</section>
