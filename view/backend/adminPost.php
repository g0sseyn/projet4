<?php if(isset($_GET['id']) && $_GET['id'] > 0){
ob_start(); ?>      
    <form action="http://localhost/projet4/index.php?action=updatePost&amp;id=<?php echo $_GET['id']; ?>" method="post" class='col-lg-offset-2 col-lg-8 well'>
        <legend id="articlesForm">Modifier un article</legend>
        <div id="newArticleForm">
            <div class="form-group">
                <label for="title">Titre : </label>        
                <input type="text" value="<?= nl2br($post['title_news']) ?>" name="title" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="imgURL">URL de l'image associée : </label>        
                <input type="text" value="<?php if (isset($post['img_url'])) { echo nl2br($post['img_url']); } ?>" name="imgURL" class="form-control" />
            </div>
            <div class="form-group">
                <label for="content">Contenu : </label>
                <textarea id="content" name='content' class="form-control"><?= nl2br($post['content_news']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modifier l'article</button>
        </div>
    </form>
<?php $content = ob_get_clean(); 

 require('view/frontend/template.php'); } 


else {
    ob_start(); ?>      
    <form action="http://localhost/projet4/index.php?action=addPost" method="post" class='col-lg-offset-2 col-lg-8 well'>
        <legend id="articlesForm">Ajouter un article</legend>
        <div id="newArticleForm">
            <div class="form-group">
                <label for="title">Titre : </label>        
                <input type="text" name="title" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="imgURL">URL de l'image associée : </label>        
                <input type="text" name="imgURL" class="form-control" />
            </div>
            <div class="form-group">
                <label for="content">Contenu : </label>
                <textarea id="content" name='content' class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Poster l'article</button>
        </div>
    </form>
<?php $content = ob_get_clean();
require('view/frontend/template.php'); 
} ?>