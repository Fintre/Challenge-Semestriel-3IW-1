<?php namespace App\Controllers; ?>
<h1>Mes blogs</h1>
<section class="button-section">
    <div class="filters">
        <ul class="link-list">
            <li><a href="#">Publiés </a></li>
            <li><a href="#">Brouillon</a></li>
            <li><a href="#">Corbeille</a></li>
            <li><div class="fix-right"><a href="/blogs/add-blog"><button class="button button-primary">Ajouter un nouveau</button></a></div></li>
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
                <div>
                    <div class="edit-icon"><a href="/blogs/edit-blog" class="link-primary">Edit</a><a href="#" class="link-danger">Supprimer</a></div>
                    <div class="blog-title"><h3><?php echo $articleData['title']; ?></h3></div>
                    <div class="blog-text">
                        <img src="https://sf1.lechasseurfrancais.com/wp-content/uploads/2023/11/shutterstock_2321514999-scaled.jpg" alt="image" width="200" height="100" class="blog-image">
                        <div class="text-content text-width"><p><?php echo $articleData['description']; ?></p></div>
                    </div>
                    <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($articleData['createdat'])); ?></div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- <div class="one-blog">
            <div>
                <div class="edit-icon"><a href="/blogs/edit-blog" class="link-primary">Edit</a><a href="#" class="link-danger">Supprimer</a></div>
                <div class="blog-title">Titre</div>
                <div class="blog-text">
                    <img src="https://sf1.lechasseurfrancais.com/wp-content/uploads/2023/11/shutterstock_2321514999-scaled.jpg" alt="image" width="200" height="100" class="blog-image">
                    <div class="text-content">
                        <p>
                            Sin autem ad adulescentiam perduxissent, dirimi tamen interdum 
                            contentione vel uxoriae condicionis vel commodi alicuius Sin autem ad adulescentiam 
                            perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi 
                            alicuius Sin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione 
                            vel uxoriae condicionis vel commodi alicuius
                        </p>
                    </div>
                </div>
                <div class="blog-date">Pulié le : 09/09/23</div>
            </div>
        </div>
        <div class="one-blog">
            <div>
                <div class="edit-icon"><a href="/blogs/edit-blog" class="link-primary">Edit</a><a href="#" class="link-danger">Supprimer</a></div>
                <div class="blog-title">Titre</div>
                <div class="blog-text">
                    <img src="https://sf1.lechasseurfrancais.com/wp-content/uploads/2023/11/shutterstock_2321514999-scaled.jpg" alt="image" width="200" height="100" class="blog-image">
                    <div class="text-content">
                        <p>
                            Sin autem ad adulescentiam perduxissent, dirimi tamen interdum 
                            contentione vel uxoriae condicionis vel commodi alicuius Sin autem ad adulescentiam 
                            perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi 
                            alicuius Sin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione 
                            vel uxoriae condicionis vel commodi alicuius
                        </p>
                    </div>
                </div>
                <div class="blog-date">Pulié le : 09/09/23</div>
            </div>
        </div> -->
    </div>
</section>
