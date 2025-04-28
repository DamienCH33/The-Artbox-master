<?php include_once('header.php');?>

<form action="submit_form.php" method="POST">
    <div class="form-field">
        <label for="title">Titre de l'œuvre</label>
        <input type="text" name="title" id="title">
    </div>
    <div class="form-field">
        <label for="artist">Auteur de l'œuvre</label>
        <input type="text" name="artist" id="artist">
    </div>
    <div class="form-field">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image">
    </div>
    <div class="form-field">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php include_once('footer.php');?>