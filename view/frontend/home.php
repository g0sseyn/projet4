<?php ob_start(); ?>
    <div class="col-lg-9">
        <img id="imgHome" src="public/images/Alaska.jpg">
        <a href="chapitres"><h1 id="title">Billet simple pour l'Alaska</h1></a>
    </div>
    
    <div class="news col-lg-3">
        <h2>Dernier chapitre mis en ligne </h2>
        <h3>
            <a href="<?php echo $lastPost['id']; ?>-<?php $title = str_replace(' ', '-', $lastPost['title_news']);echo $title; ?>"><?php echo htmlspecialchars($lastPost['title_news']); ?></a>
            <em>le <?php echo $lastPost['creation_date_news_fr']; ?></em>
        </h3>
    
        <p>
            <?= nl2br($lastPost['content_news']) ?>
            <br />
            <em><a href="<?php echo $lastPost['id']; ?>-<?php $title = str_replace(' ', '-', $lastPost['title_news']);echo $title; ?>">Commentaires</a></em>
        </p>
     </div>


<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>