<?php
// $categories = $result["data"]['category'];
$topic = $result["data"]['topic'];
$posts = $result["data"]['posts'];
?>

<h1>Liste des posts</h1>

<?php
if ($posts) {
    foreach ($posts as $post) { ?>
        <div><?= $post ?> par <?= $post->getUser() ?>, le <?= $post->getCreationDate() ?>

            <?php
            // si le user connecté est l'auteur du post
            if (App\Session::getUser() == $post->getUser()) {
            ?>

                <a href="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId() ?>">Supprimer post</a>

                <a href="#">Modifier message</a>

                <form action="index.php?ctrl=forum&action=updatePostText&id=<?= $post->getId() ?>" method="post">
                    <input type="text" name="text" value="<?= $post ?>">
                    <input type="submit" value="Modifier">
                </form>

            <?php }  ?>
        </div>
    <?php }
    // Il n'y a pas de posts dans ce topic
} else { ?>
    <p>Il n'y a pas de Posts dans ce topic ☺☻</p>
<?php }
if (App\Session::getUser()) {
?>
    <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="post">
        <textarea name="text" placeholder="Message"></textarea>
        <input type="submit" value="Poster">
    </form>
<?php } ?>