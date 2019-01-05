<?php 
function verifyPass($pseudo,$verifpass)
{
    $userManager = new UserManager();

    $testedpass = $userManager->getPass($pseudo);
    $isPasswordCorrect = password_verify($verifpass, $testedpass['pass']);
    if ($isPasswordCorrect) {        
        $_SESSION['id'] = $testedpass['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
        header('Location: index.php');
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';

    }
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
    else {
    require('view/frontend/auth.php');
    }
}
function adminDeco(){
    session_destroy();
    header('Location: index.php');
}