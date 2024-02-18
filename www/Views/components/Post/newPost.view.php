<script type="text/javascript" src="../../../Shared/tinymce/js/tinymce/tinymce.js"></script >
<script>
    tinymce.init({
        selector: 'textarea#pageContent',
        auto_focus: 'element1',
        mode: "textareas",
        elements : "pageContent",
        height:"350px",
        width:"100%",
        plugins: 'anchor autolink charmap codesample emoticons image link lists searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss preview styleprops',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat preview styleprops',
        image_list: [
            {title: 'My image 1', value: 'https://www.example.com/my1.gif'},
            {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
        ]
    });
</script>
<?php
if (empty($this->data['post']->getId())) {
    echo "<h2>Nouvelle page</h2>";
} else {
    echo "<h2>Modification de la page</h2>";
}
$info = $this->data['info'];
$isPublished = $this->data['post']->getPublished();
echo $isPublished;
$isDeleted = $this->data['post']->getIsDeleted();

echo "<h3>$info</h3>";

if (empty($this->data['mandatoryFields'])) {
    $missingFields = implode("<br>", $this->data['mandatoryFields']);
    echo "<div style='color: red'>$missingFields</div>";
}
?>
<section class="new-post-main">
    <div class="section1-new-post-container">
        <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
            <div class="form-group">
                <label for="pageName"></label>
                <textarea name="pageSlug" id="pageName" class="pageName"
                          placeholder="Nom de la page ..."><?php echo $this->data['post']->getSlug() ?? '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="pageTitle"></label>
                <textarea name="pageTitle" id="pageTitle" class="pageTitle"
                          placeholder="Titre de la page ..."><?php echo $this->data['post']->getTitle() ?? '' ?></textarea>
            </div>
            <div class="form-content">
                <label for="pageContent"></label>
                <textarea name="pageContent"
                          id="pageContent"><?php echo $this->data['post']->getBody() ?? '' ?></textarea>
            </div>
            <div hidden>
                <input type="number" name="isDeleted" value="<?php echo $isDeleted  ?? '0' ?>"/>
            </div>
            <div class="form-footer">
                <button type="submit" class="button button-primary button-lg">Sauvegarder</button>
            </div>
            <div class="section2-new-post-container">
                <div class="block-card block-card-custom-page info">
                    <div class="block-card-custom-page-info-property">Auteur<span class="block-card-custom-page-info-value"></span>
                        <div hidden>
                            <input type="number" name="id" value="<?php echo $this->data['post']->getId() ?? '' ?>"/>
                        </div>
                    </div>
                    <div class="block-card-custom-page-info-property">Statut<span class="block-card-custom-page-info-value"><?php echo $isPublished ? 'Publiée' : "Brouillon" ?></span>
                    </div>
                    <div class="block-card-custom-page-info-property">Date<span class="block-card-custom-page-info-value"><?php echo $this->data['post']->getCreatedat() ?? '' ?>"</span>
                    </div>
                    <div class="block-card-custom-page-info-property">URL<span class="block-card-custom-page-info-value">monsite/<?php echo $this->data['post']->getSlug() ?? '' ?></span>
                    </div>
                </div>
                <div class="button-new-page">
                    <div>
                        <input type="checkbox" id="isPublished" name="isPublished" <?php echo $isPublished ? 'checked' : '';?> />
                        <label for="isPublished">Publiée</label>
                    </div>
                </div>
            </div>
        </form>
        <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
            <div hidden>
                <input type="number" name="id" value="<?php echo $this->data['post']->getId() ?? '' ?>"/>
            </div>
            <div hidden>
                <input type="number" name="isDeleted" value="1"/>
            </div>
            <div <?php echo empty($this->data['post']->getId()) ? 'hidden' : '' ?> class="button-deleted">
                <button type="submit" class="button button-danger button-lg">Supprimer
                </button>
            </div>
        </form>
    </div>

</section>
