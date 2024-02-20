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
        foreach ($allblogs as $blogData): ?>
        <div class="one-blog">
            <div>
                <div class="edit-icon"><a href="/bo/blogs/edit-blog?blog=<?php echo $blogData['id']; ?>" class="link-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="/bo/blogs?action=delete&id=<?php echo $blogData['id']; ?>" class="link-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article ?');">
                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                </a>
            </div>
                <div class="blog-title"><h4><?php echo $blogData['title']; ?></h4></div>
                <div class="blog-text">
                    <img src="https://sf1.lechasseurfrancais.com/wp-content/uploads/2023/11/shutterstock_2321514999-scaled.jpg" alt="image" width="200" height="100" class="blog-image">
                    <div class="text-content text-width"><p><?php echo $blogData['body']; ?></p></div>
                </div>
                <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($blogData['updatedat'])); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<section class="section5-page-add">
    <a href="/bo/blogs/add-blog"><button class="button button-primary">Ajouter un nouveau blog</button></a>
</section>
