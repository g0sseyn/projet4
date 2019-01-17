<?php ob_start(); ?>
    <div class="col-md-9">
        <img id="imgHome" src="public/images/Alaska.jpg" alt="paysage de l'Alaska">
        <a href="chapitres">
            <h1 id="title">Billet simple pour l'Alaska</h1>
        </a>
    </div>
    
    <div class="news col-md-3">
        <h2>Dernier chapitre mis en ligne </h2>
        <h3>
            <a href="<?= $lastPost['id']; ?>-<?php $title = str_replace(' ', '-', $lastPost['title_news']);echo $title; ?>"><?= htmlspecialchars($lastPost['title_news']); ?></a>
            <br/>
            <em>le <?= $lastPost['creation_date_news_fr']; ?></em>
        </h3>
        <?php if (isset($lastPost['img_url'])&&$lastPost['img_url']!==0) { ?>       
        <div class="image">
            <img src="<?= $lastPost['img_url']?>">
        </div>
        <?php ;} ?>
        <?= nl2br($lastPost['content_news']) ?>
        <br />
    </div>


<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>