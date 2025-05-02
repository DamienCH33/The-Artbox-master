<?php
session_start();

include_once('database.php');
$db = connection();

$title = trim($_POST['title']);
$artist = trim($_POST['artist']);
$description = trim($_POST['description']);
$image = trim($_POST['image']);

$error = [];

if (empty($title)){
    $error['title'] = "Le titre de l'œuvre est obligatoire.";
} 
    
if(empty($artist)){
    $error['artist'] = "L'auteur de l'œuvre est obligatoire.";
}
 
if(empty($image )){
    $error['image'] = "Le champ image est obligatoire";
} elseif (!filter_var($image, FILTER_VALIDATE_URL)) {
    $error['image'] = "L'URL de l'image doit être une URL valide.";
}
 
if(empty($description)) {
    $error['description'] = "Le champ description est obligatoire";
} elseif (     strlen($description) < 3){
    $error['description'] = "La description doit contenir au moins 3 caractères.";
}
if(!empty($error)){
    $_SESSION['error'] = $error;
    header('location: addart.php');
    exit;
} else {
    $title = htmlspecialchars($_POST['title']);
    $artist = htmlspecialchars($_POST['artist']);
    $description = htmlspecialchars($_POST['description']);



    $sqlinsertart = 'INSERT INTO artworks (title, artist, description, image) VALUES (:title, :artist, :description, :image)';
    $insertart = $db->prepare($sqlinsertart);
    $insertart->execute(
        [
            'title' => $title,
            'artist' => $artist,
            'description' => $description,
            'image' => $image,
        ]
    );
    header('Location: artwork.php?id=' . $db->lastInsertId());
}
