<?php ob_start(); ?>   
    <div class="col-lg-offset-2 col-lg-8">
        <a href="adminPost" class="btn btn-primary btn-block">Ajouter un nouvelle article</a>
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
            <a href="<?php echo $data['id']; ?>-<?php $title = str_replace(' ', '-', $data['title_news']);echo $title; ?>"><?php echo htmlspecialchars($data['title_news']); ?></a>
        </td>
        <td class="center"><a href="adminPost-<?php echo $data['id']; ?>" class="btn btn-success">Modifier</a></td>
        <td class="center"><a href="deletePost-<?php echo $data['id']; ?>" class="btn btn-danger">Supprimer</a></td>
    </tr>
     
<?php
} 
$posts->closeCursor();
?>  
    </tbody>
    </table>
    <table class="col-lg-offset-2 col-lg-8 table-bordered table-striped">
       <caption id="commentSignaledCaption">
           <h3>Supprimer ou modifier un commentaire signalé</h3>
       </caption> 
       <thead class="commentSignaledTable">
           <tr>
               <th class="col-lg-10">Commentaires</th>
               <th class="col-lg-1">Modifier</th>
               <th class="col-lg-1">Supprimer</th>               
           </tr>
       </thead>
       <tbody class="commentSignaledTable">
<?php 
while ($com = $signaledComments->fetch()) {   
?>
    <tr>
        <td>
             <?php echo htmlspecialchars($com['comment']); ?>
        </td>
        <td class="center"><a href="adminComment-<?php echo $com['id']; ?>" class="btn btn-success">Modifier</a></td>
        <td class="center"><a href="deleteComment-<?php echo $com['id']; ?>" class="btn btn-danger">Supprimer</a></td>
    </tr>
     
<?php
}
$signaledComments->closeCursor();
?> 
</tbody>
    </tbody>
    </table>
    <table class="col-lg-offset-2 col-lg-8 table-bordered table-striped">
       <caption id="commentNonSignaledCaption">
           <h3>Supprimer ou modifier un commentaire non signalé</h3>
       </caption> 
       <thead class="commentNonSignaledTable">
           <tr>
               <th class="col-lg-10">Commentaires</th>
               <th class="col-lg-1">Modifier</th>
               <th class="col-lg-1">Supprimer</th>               
           </tr>
       </thead>
       <tbody class="commentNonSignaledTable">
<?php 
while ($com = $nonSignaledComments->fetch()) {
 
?>
    <tr>
        <td>
             <?php echo htmlspecialchars($com['comment']); ?>
        </td>
        <td class="center"><a href="adminComment-<?php echo $com['id']; ?>" class="btn btn-success">Modifier</a></td>
        <td class="center"><a href="deleteComment-<?php echo $com['id']; ?>" class="btn btn-danger">Supprimer</a></td>
    </tr>
     
<?php
} 
$nonSignaledComments->closeCursor();
?> 
<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>