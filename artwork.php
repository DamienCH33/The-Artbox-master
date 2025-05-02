<?php
include_once('header.php');
include_once('database.php');
$db = connection();

if (empty($_GET['id']) || 0 === $id = (int) $_GET['id']) {
    header('location: index.php');
    exit;
}

$sqlrequest = 'SELECT * FROM artworks WHERE id = ?';
$artstatement = $db->prepare($sqlrequest);
$artstatement->execute([$id]);
$art = $artstatement->fetch();

if (!$art) {
    header('location: index.php');
    exit;
}
?>

<main>
    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?php echo $art['image'] ?>" alt="<?php echo $art['title'] ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?php echo $art['title'] ?></h1>
            <p class="description"><?php echo $art['artist'] ?></p>
            <p class="description-complete">
                <?php echo $art['description'] ?>
            </p>
        </div>
    </article>
</main>

<?php include_once('footer.php'); ?>