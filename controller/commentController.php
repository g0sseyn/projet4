<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    header('Location: chapitre-' . $postId);
    
}
function deleteComment(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    $commentManager = new CommentManager();
    $commentManager->deleteComment($_GET['id']);    
    header('Location: index.php?action=admin');
}

