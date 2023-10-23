<h1>Add new post</h1>
<form action="new-post.view.php" method="post">
    <label>Titre de la page</label>
    <input name="title" id="title" type="text" />

    <label>Contenu</label>
    <input name="body" id="body" type="text" /></p>

    <label>Type</label>
    <input name="type" id="type" type="text" /></p>

    <label>Date de création</label>
    <input name="create-at" id="create-at" type="date" /></p>

    <label>Modifié le</label>
    <input name="updated-at" id="updated-at" type="date" /></p>

    <label>Supprimé le</label>
    <input name="deleted-at" id="deleted-at" type="date" /></p>

    <label>Slug</label>
    <input name="slug" id="slug" type="text" /></p>

    <button type="submit">Valider</button>
</form>
