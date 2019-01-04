<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPostsAdmin()
{
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
		
	if (isset($_GET['id'])){
		$postManager = new PostManager();
    	$post = $postManager->getPost($_GET['id']); 
    }  

    require('view/backend/adminPost.php');
}
function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function showHome(){
	$postManager = new PostManager();
	$lastPost = $postManager->getLastPost();
	require('view/frontend/home.php');
}
function isAdmin(){
	if (isset($_SESSION['pseudo'])){
        $abc=$_SESSION['pseudo'];
    }
    else {
        $abc="s'identifié";
    }
    return $abc;
}
function showAuth(){
	if (isset($_SESSION['pseudo'])){
		require('admin.php');
	}
	else {
	require('view/frontend/auth.php');
	}
}