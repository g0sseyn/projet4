
<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
 
<?php 
while ($data = $posts->fetch())
{
?>
    <div class="news col-sm-offset-2 col-sm-8">
        <h3>
            <a href="<?= $data['id']; ?>-<?php $title = str_replace(' ', '-', $data['title_news']);echo $title; ?>"><?= htmlspecialchars($data['title_news']); ?></a>
            <br/>
            <em>le <?= $data['creation_date_news_fr']; ?></em>
        </h3>
        <?php if (isset($data['img_url'])&&$data['img_url']!=='0') { ?>       
            <div class="image"><img src="<?= $data['img_url']?>"></div>
        <?php ;} ?>
       
        <?= nl2br($data['content_news']) ?>
        <br /> 
     </div>
<?php
} 
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>