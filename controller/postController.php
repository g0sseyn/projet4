<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function addPost(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    if (empty($_POST['title']) || empty($_POST['content'])) {
        throw new Exception('Tous les champs ne sont pas remplis !');
    }
    $postManager = new PostManager();
    $affectedLines = $postManager->addPost($_POST['title'], $_POST['content'],$_POST['imgURL']);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }    
    header('Location: admin');    
}
function deletePost(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    if (isset($_GET['id']) && $_GET['id'] > 0) {
	$postManager = new PostManager();	
	$postManager->deletePost($_GET['id']);
    }
	header('Location: admin');
}
function updatePost(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    if (isset($_GET['id']) && $_GET['id'] > 0) {
	   $postManager = new PostManager();
	   $postManager->updatePost($_GET['id'],$_POST['title'],$_POST['content'],$_POST['imgURL']);
    }
	header('Location: admin');

}
function listPostsAdmin(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $posts = $postManager->getPosts();
    $signaledComments = $commentManager->getAllSignaledComments();
    $nonSignaledComments = $commentManager->getAllNonSignaledComments();

   require('view/backend/admin.php');
}
function listPosts(){
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostView.php');
}

function post(){   
    if (!(isset($_GET['id']) && $_GET['id'] > 0)) {
    throw new Exception('Aucun identifiant de billet envoyé');
    }

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}
function adminPost()
{
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }    
    if (isset($_GET['id'])){
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);        
    }  
    require('view/backend/adminPost.php');
}
function showHome(){
    $postManager = new PostManager();
    $lastPost = $postManager->getLastPost();
    require('view/frontend/home.php');
}

