<h2>Mes pages</h2>

<div class="post-page">
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
    <section class="section2-search-bar">
        <div class="block-line-search">
            <label for="input-name"></label>
            <input type="text" id="input-name" class="search-input" placeholder="Rechercher..."/>
        </div>
    </section>
    <section class="section3-information-page">
        <table class="status-tab">
            <thead>
            <tr class="tab">
                <th class="tab-item active">Titre</th>
                <th class="tab-item">Auteur</th>
                <th class="tab-item">Date</th>
                <th class="tab-item">Status</th>
                <th class="tab-item">Modifier</th>
            </tr>
            </thead>
            <?php
            if (isset($this->data['posts'])) {
                foreach ($this->data['posts'] as $post) {
                    $postId = $post->getId();
                    $title = $post->getTitle();
                    $username = "username";
                    $createdAt = (new DateTime($post->getCreatedat()))->format('Y-m-d');
                    $status = $post->getPublished() ? 'Publié' : "Non publié";
                    echo "
                    <tr class='tab-page'>
                        <td>$title</td>
                        <td>$username</td>
                        <td>$createdAt</td>
                        <td>$status</td>
                        <td>
                            <button class='button button-primary'>
                                <a href='/posts/post?id=$postId' class='add-content'>Modifier</a>
                            </button>
                        </td>
                    </tr>
                    ";
                }
            }
            ?>
        </table>
    </section>
    <section class="section4-add">
        <button class="button button-primary">
            <a href="/posts/post" class="add-content">Ajouter</a>
        </button>
    </section>
</div>
