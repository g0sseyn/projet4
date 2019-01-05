<?php
require_once('model/PostManager.php');
require_once('model/UserManager.php');


function addPost($title,$content,$imgURL){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    $postManager = new PostManager();
    $affectedLines = $postManager->postNews($title, $content, $imgURL);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }    
    header('Location: index.html');
    
}
function deletePost(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$commentManager->deleteComments($_GET['id']);
	$postManager->deletePost($_GET['id']);

	header('Location: index.php?action=admin');
}
function updatePost($id,$title,$content,$imgURL){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
	$postManager = new PostManager();
	$postManager->updatePost($id,$title,$content,$imgURL);

	header('Location: index.php?action=admin');

}
function listPostsAdmin()
{
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $posts = $postManager->getPosts();
    $comments = $commentManager->getAllComments();

   require('/view/backend/admin.php');
}
function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostView.php');
}

function post()
{
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
        $post = $postManager->getPost($_GET['id']); 
    }  

    require('view/backend/adminPost.php');
}
function showHome(){
    $postManager = new PostManager();
    $lastPost = $postManager->getLastPost();
    require('view/frontend/home.php');
}

