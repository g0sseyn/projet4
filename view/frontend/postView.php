
<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
    <p><a href="index.html">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <a href="chapitre-<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title_news']); ?></a>
            <em>le <?= $post['creation_date_news_fr'] ?></em>
        </h3>
            
        <p>
            <?= nl2br($post['content_news']) ?>
        </p>
    </div>

    <h2>Commentaires</h2>
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
    </form>
    <?php
    while ($comment = $comments->fetch())
    {
    ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>   <a class="btn btn-danger" href="index.php?action=signalComment&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">X</a> </p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>