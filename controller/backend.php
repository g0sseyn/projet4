<?php
require_once('model/PostManager.php');
require_once('model/UserManager.php');

function verifyPass($pseudo,$verifpass)
{
    $userManager = new UserManager();

    $testedpass = $userManager->getPass($pseudo);
    $isPasswordCorrect = password_verify($verifpass, $testedpass['pass']);
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $testedpass['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';

    }
}
function addNews($title,$content,$imgURL){
    $postManager = new PostManager();

    $affectedLines = $postManager->postNews($title, $content, $imgURL);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php');
    }
}
function deletePost(){
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$commentManager->deleteComments($_GET['id']);
	$postManager->deletePost($_GET['id']);

	header('Location: index.php?action=admin');
}
function updatePost($id,$title,$content,$imgURL){
	$postManager = new PostManager();
	$postManager->updatePost($id,$title,$content,$imgURL);

	header('Location: index.php?action=admin');

}
function deleteComment(){
	$commentManager = new CommentManager();

	$commentManager->deleteComment($_GET['id']);
	
	header('Location: index.php?action=admin');
}
