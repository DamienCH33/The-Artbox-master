<?php include_once('header.php');?>

<form action="traitement.php" method="POST">
    <div class="form-field">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre">
    </div>
    <div class="form-field">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste">
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