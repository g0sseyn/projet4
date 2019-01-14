
<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
    <p><a href="chapitres">Retour à la liste des chapitres</a></p>

    <div class="news col-lg-offset-2 col-lg-8">
        <h3>
            <a href="<?php echo $post['id']; ?>-<?php $title = str_replace(' ', '-', $post['title_news']);echo $title; ?>"><?php echo htmlspecialchars($post['title_news']); ?></a>
            <em>le <?= $post['creation_date_news_fr'] ?></em>
        </h3>
            
        <p>
            <?= nl2br($post['content_news']) ?>
        </p>
    </div>

    <h2 class="col-lg-12">Commentaires</h2>
    <div class="col-lg-offset-4 col-lg-4 col-lg-offset-4">
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" >
    <div class="form-group">
        <label for="author" class="col-2 col-form-label">Auteur</label><br />
        <input type="text" id="author" name="author" class="form-control" />
    </div>
    <div class="form-group">
        <label for="comment" class="col-2 col-form-label">Commentaire</label><br />
        <textarea id="comment" name="comment" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="form-check-input" />
    </div>
    </form>
    </div>
    <?php
    while ($comment = $comments->fetch())
    {
    ?>
    <?php if ($comment['is_signaled']=='1') {
       
     ?>
    <p class="col-lg-offset-4 col-lg-4 col-lg-offset-4"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>   <a class="btn btn-danger" title="commentaire deja signalé" ><span class="glyphicon glyphicon-ok-circle"></span></a> </p>
    <p class="col-lg-offset-4 col-lg-4 col-lg-offset-4"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}else { ?>
    <p class="col-lg-offset-4 col-lg-4 col-lg-offset-4"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>   <a class="btn btn-success" title="signaler le commentaire" href="index.php?action=signalComment&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>"><span class="glyphicon glyphicon-ban-circle"></span></a> </p>
    <p class="col-lg-offset-4 col-lg-4 col-lg-offset-4"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>


<?php }} ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>