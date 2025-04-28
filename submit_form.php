<?php

include_once('database.php');
$db = connection();

$title = trim($_POST['title']);
$artist = trim($_POST['artist']);
$description = trim($_POST['description']);
$image = trim($_POST['image']);

if (
    empty($title) || empty($artist) || empty($image ) || empty($description)
    || !filter_var($image, FILTER_VALIDATE_URL) || strlen($description) < 3
) {
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
