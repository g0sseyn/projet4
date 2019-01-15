
<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
 
<?php 
while ($data = $posts->fetch())
{
?>
    <div class="news col-sm-offset-2 col-sm-8">
        <h3>
            <a href="<?php echo $data['id']; ?>-<?php $title = str_replace(' ', '-', $data['title_news']);echo $title; ?>"><?php echo htmlspecialchars($data['title_news']); ?></a>
            <em>le <?php echo $data['creation_date_news_fr']; ?></em>
        </h3>
    
       
            <?= nl2br($data['content_news']) ?>
            <br />
            
       
     </div>
<?php
} 
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>