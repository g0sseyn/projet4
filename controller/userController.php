<?php 
function verifyPass($pseudo,$verifpass){
    $userManager = new UserManager();
    $testedpass = $userManager->getPass($pseudo);
    $isPasswordCorrect = password_verify($verifpass, $testedpass['pass']);
    if (!$isPasswordCorrect) {        
        throw new Exception('Mauvais identifiant ou mot de passe !'); 
    }
    $_SESSION['id'] = $testedpass['id'];
    $_SESSION['pseudo'] = $pseudo;    
    header('Location: index.php');
}
function isAdmin(){
    if (isset($_SESSION['pseudo'])&&($_SESSION['pseudo']==='admin')){
        return true;
    }
    return false;
}
function showAuth(){
    if (isset($_SESSION['pseudo'])&&($_SESSION['pseudo']==='admin')){
        header('Location: index.php?action=admin');
    }    
    require('view/frontend/auth.php');    
}
function adminDeco(){
    session_destroy();
    header('Location: index.php');
}