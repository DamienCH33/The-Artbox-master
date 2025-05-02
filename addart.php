<?php 
session_start();
include_once('header.php');

$error = $_SESSION['error'] ?? [];

if (isset($_SESSION['error'])){
    unset($_SESSION['error']);
}
?>

<form action="submit_form.php" method="POST">
    <div class="form-field">
        <label for="title">Titre de l'œuvre</label>
        <input type="text" name="title" id="title">
        <p class="error"><?=($error['title'] ?? '')?></p>
    </div>
    <div class="form-field">
        <label for="artist">Auteur de l'œuvre</label>
        <input type="text" name="artist" id="artist">
        <p class="error"><?=($error['artist'] ?? '')?></p>
    </div>
    <div class="form-field">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image">
        <p class="error"><?=($error['image'] ?? '')?></p>
    </div>
    <div class="form-field">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
        <p class="error"><?=($error['description'] ?? '')?></p>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php include_once('footer.php');?>