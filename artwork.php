<?php 
include_once('header.php');
include_once('artworks.php');

$id = (int) $_GET['id'];
if($id === 0){
    echo 'Aucun id trouvé.';
    exit;
}

$art = current(array_filter($artworks, function ($artwork) use ($id): bool {
    return $artwork['id'] === $id;
}));
?>

<main>
    <?php if ($art) { ?>
        <article id="detail-oeuvre">
            <div id="img-oeuvre">
                <img src="img/<?php echo $art['image'] ?>" alt="<?php echo $art['title'] ?>">
            </div>
            <div id="contenu-oeuvre">
                <h1><?php echo $art['title'] ?></h1>
                <p class="description"><?php echo $art['artist'] ?></p>
                <p class="description-complete">
                    <?php echo $art['description'] ?>
                </p>
            </div>
        </article>
    <?php } else {
        echo "L'œuvre demandée n'existe pas.";
    } ?>
</main>
<?php include_once('footer.php'); ?>