<?php ob_start(); ?>
    <div class="col-lg-9">
        <img id="imgHome" src="public/images/alaska.jpg">
        <h1 id="title">Billet simple pour l'Alaska</h1>
    </div>
    
    <div class="news col-lg-3">
        <h2>Dernier chapitre mis en ligne </h2>
        <h3>
            <a href="chapitre-<?php echo $lastPost['id']; ?>"><?php echo htmlspecialchars($lastPost['title_news']); ?></a>
            <em>le <?php echo $lastPost['creation_date_news_fr']; ?></em>
        </h3>
    
        <p>
            <?= nl2br($lastPost['content_news']) ?>
            <br />
            <em><a href="chapitre-<?php echo $lastPost['id']; ?>">Commentaires</a></em>
        </p>
     </div>
     <div class="col-lg-3">
        <address class="thumbnail">
            <p>Vous pouvez me contacter à cette adresse :</p>
            <strong>Jean FORTEROCHE</strong><br>
            Allée du Froid<br>
            30755 alaska-sur-loire<br>
        </address>
     </div>

<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>