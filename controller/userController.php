<?php 
require_once('model/userManager.php');
function verifyPass(){
    $userManager = new UserManager();
    $userInfo = $userManager->userInfo($_POST['pseudo']);
    $isPasswordCorrect = password_verify($_POST['pass'], $userInfo['pass']);
    if (!$isPasswordCorrect) {        
        throw new Exception('Mauvais identifiant ou mot de passe !'); 
    }   
    $_SESSION['pseudo'] = $userInfo['pseudo'];
    $_SESSION['is_admin'] = $userInfo['is_admin'];

    header('Location: admin');
}
function isAdmin(){
    if (isset($_SESSION['is_admin'])&&($_SESSION['is_admin']==true)){
        return true;
    }
    return false;
}
function showAuth(){
    if (isAdmin()){
        header('Location: admin');
    }    
    require('view/frontend/auth.php');    
}
function adminDeco(){
    session_destroy();
    header('Location: index.html');
}
