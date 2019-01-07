<?php ob_start(); ?>    
    <h2>Commentaires</h2>
    <form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <p><?= nl2br($comment['author']) ?></p>
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"><?= nl2br($comment['comment']) ?></textarea>
    </div>
    <div>
        <input type="submit" value="Modifier" />
    </div>
    </form>
<?php $content = ob_get_clean(); 

 require('view/frontend/template.php');