<?php ob_start(); ?>   
    <div class="col-lg-offset-2 col-lg-8">
        <a href="index.php?action=adminPost" class="btn btn-primary btn-block">Ajouter un nouvelle article</a>
    </div>

    <table class="col-lg-offset-2 col-lg-8 table-bordered table-striped">
       <caption id="articleCaption">
           <h3>Supprimer ou modifier un article</h3>
       </caption>        
       <thead class="articleTable">
           <tr>
               <th class="col-lg-10">Titre</th>
               <th class="col-lg-1">Modifier</th>
               <th class="col-lg-1">Supprimer</th>  
           </tr>
       </thead>
       <tbody class="articleTable">
        <?php 
while ($data = $posts->fetch())
{
?>
    <tr>
        <td>
            <a href="chapitre-<?php echo $data['id']; ?>"><?php echo htmlspecialchars($data['title_news']); ?></a>
        </td>
        <td class="center"><a href="index.php?action=adminPost&amp;id=<?php echo $data['id']; ?>" class="btn btn-success">Modifier</a></td>
        <td class="center"><a href="index.php?action=deletePost&amp;id=<?php echo $data['id']; ?>" class="btn btn-danger">Supprimer</a></td>
    </tr>
     
<?php
} 
$posts->closeCursor();
?>  
    </tbody>
    </table>
    <table class="col-lg-offset-2 col-lg-8 table-bordered table-striped">
       <caption id="commentCaption">
           <h3>Supprimer ou modifier un commentaire</h3>
       </caption> 
       <thead class="commentTable">
           <tr>
               <th class="col-lg-10">Commentaires</th>
               <th class="col-lg-1">Modifier</th>
               <th class="col-lg-1">Supprimer</th>               
           </tr>
       </thead>
       <tbody class="commentTable">
<?php 
while ($com = $comments->fetch())
{
?>
    <tr>
        <td>
             <?php echo htmlspecialchars($com['comment']); ?>
        </td>
        <td class="center"><a href="index.php?action=editComment&amp;id=<?php echo $com['id']; ?>" class="btn btn-success">Modifier</a></td>
        <td class="center"><a href="index.php?action=deleteComment&amp;id=<?php echo $com['id']; ?>" class="btn btn-danger">Supprimer</a></td>
    </tr>
     
<?php
} 
$comments->closeCursor();
?> 
</tbody>
</table>
    
<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>