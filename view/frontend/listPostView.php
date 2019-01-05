
<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Derniers billets du blog :</p>
 
<?php 
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <a href="chapitre-<?php echo $data['id']; ?>"><?php echo htmlspecialchars($data['title_news']); ?></a>
            <em>le <?php echo $data['creation_date_news_fr']; ?></em>
        </h3>
    
        <p>
            <?= nl2br($data['content_news']) ?>
            <br />
            <em><a href="chapitre-<?php echo $data['id']; ?>">Commentaires</a></em>
        </p>
     </div>
<?php
} 
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>