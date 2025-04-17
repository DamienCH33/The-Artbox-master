<?php 
include_once('header.php');
include_once('database.php');
$db = connection();
$artworks = $db->query('SELECT * FROM artworks ORDER BY id ASC');
?>

<main>
    <div id="liste-oeuvres">
        <?php foreach ($artworks as $artwork) { ?>
            <article class="oeuvre">
                <a href="artwork.php?id=<?php echo $artwork['id'] ?>">
                <img src="img/<?php echo $artwork['image'] ?>" alt="<?php echo $artwork['title'] ?>">
                <h2><?php echo $artwork['title'] ?></h2>
                <p class="description"><?php echo $artwork['artist'] ?></p>
                </a>
            </article>
        <?php } ?>
    </div>
</main>

<?php include_once('footer.php'); ?>