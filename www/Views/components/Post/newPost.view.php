<script type="text/javascript" src="../../../Shared/tinymce/js/tinymce/tinymce.js"></script >
<script>
    tinymce.init({
        selector: 'textarea#pageContent',
        auto_focus: 'element1',
        mode: "textareas",
        elements : "pageContent",
        height:"350px",
        width:"100%"

    });
</script>
<h2>Nouvelle page</h2>
<?php
$info = $this->data['info'];
echo "<h3>$info</h3>";

if (empty($this->data['mandatoryFields'])) {
    $missingFields = implode("<br>", $this->data['mandatoryFields']);
    echo "<div style='color: red'>$missingFields</div>";
}
?>
<section class="new-post-main">
    <div class="section1-new-post-container">
        <form method="post" action="<?=$_SERVER['REQUEST_URI']?>">
            <div class="form-group">
                <label for="pageName"></label>
                <textarea name="pageSlug" id="pageName" class="pageName" placeholder="Nom de la page ..."><?php echo $this->data['pageSlug'] ??'' ?></textarea>
            </div>
            <div class="form-group">
                <label for="pageTitle"></label>
                <textarea name="pageTitle" id="pageTitle" class="pageTitle" placeholder="Titre de la page ..."><?php echo $this->data['pageTitle'] ?? ''?></textarea>
            </div>
            <div class="form-content">
                <label for="pageContent"></label>
                <textarea name="pageContent" id="pageContent"><?php echo $this->data['sContent'] ?? '' ?></textarea>
            </div>
            <div hidden>
                <input type="number" name="id" value="<?php echo $this->data['id'] ?? ''?>"/>
            </div>
            <div class="form-button-add-element">
                <button class="button button-primary button-sm">+</button>
            </div>
            <div class="form-footer">
                <button type="submit" class="button button-primary button-lg">Ajouter</button>
            </div>
        </form>
    </div>

    <div class="section2-new-post-container">
        <div class="block-card block-card-custom-page color">Couleur
            <div class="block-card block-card-custom-page-color-wrapper">
                <span class="block-card-custom-page-color-content">Texte
                    <input type="color" id="color-text" name="color-text"/><label for="color-text"></label>
                </span>
                <span class="block-card-custom-page-color-content">A-Plan
                    <input type="color" id="color-text-background" name="color-text-background"/><label for="color-text-background"></label>
                </span>
            </div>
        </div>
        <div class="block-card block-card-custom-page typo">
            <div class="block-card-custom-page-typo-property">Typographie
                <span class="block-card-custom-page-typo-value">lato</span>
                <div class="block-card-custom-page-typo-wrapper">
                    <div class="block-card-custom-page-typo-property">Taille de police
                        <button class="block-card-custom-page-typo-value">24 px</button>
                        <button class="block-card-custom-page-typo-value">-</button>
                        <button class="block-card-custom-page-typo-value">+</button>
                        <button class="block-card-custom-page-typo-value">h1</button>
                        <button class="block-card-custom-page-typo-value">h2</button>
                        <button class="block-card-custom-page-typo-value">h3</button>
                        <button class="block-card-custom-page-typo-value">p</button>
                        <button class="block-card-custom-page-typo-value">liste</button>
                        <button class="block-card-custom-page-typo-value">lien</button>
                        <button class="block-card-custom-page-typo-value">a</button>
                        <button class="block-card-custom-page-typo-value">A</>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-card block-card-custom-page info">
            <div class="block-card-custom-page-info-property">Auteur<span class="block-card-custom-page-info-value">Yves</span></div>
            <div class="block-card-custom-page-info-property">Statut<span class="block-card-custom-page-info-value">Brouillon</span></div>
            <div class="block-card-custom-page-info-property">Date<span class="block-card-custom-page-info-value">12/12/2023</span></div>
            <div class="block-card-custom-page-info-property">URL<span class="block-card-custom-page-info-value">gofindme.com/home</span></div>
        </div>
        <div class="block-card block-card-custom-page media">
            <div class="block-card-custom-page-media-property">Image<span class="block-card-custom-page-media-value">Ajouter un nouveau contenu</span></div>
        </div>
        <div class="button-new-page">
            <div class="button-submit">
                <button class="button button-primary button-lg">Sauvegarder</button>
            </div>
            <div class="button-delet">
                <button class="button button-danger button-lg">Supprimer</button>
            </div>
        </div>
    </div>
</section>
