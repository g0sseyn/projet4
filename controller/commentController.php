<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function addComment()
{   
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (empty($_POST['author']) || empty($_POST['comment'])) {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($_GET['id'], $_POST['author'], $_POST['comment']);
    }
    else {
        throw new Exception('Aucun identifiant de billet envoyé');
    }
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    header('Location: chapitre-' . $_GET['id']);
    
}
function deleteComment(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    if (isset($_GET['id']) && $_GET['id'] > 0) {
    $commentManager = new CommentManager();
    $commentManager->deleteComment($_GET['id']);
    }    
    header('Location: index.php?action=admin');
}
function adminComment(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    if (isset($_GET['id'])){  
        $commentManager = new CommentManager();
        $comment=$commentManager->getComment($_GET['id']);        
    }
    require('view/backend/adminComment.php');
}
function updateComment(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }   
    if (isset($_GET['id']) && $_GET['id'] > 0) {  
        $commentManager = new CommentManager();
        $commentManager->updateComment($_GET['id'],$_POST['comment']);        
    }
    header('Location: index.php?action=admin');
}
function signalComment(){
    if (isset($_GET['id'])&&isset($_GET['postId'])){  
        $commentManager = new CommentManager();
        $commentManager->signalComment($_GET['id']);
        header('Location: chapitre-' . $_GET['postId']);      
    }
    else {
        header('Location: index.html');
    }
    
}