<?php
require('controller/frontend.php');
require('controller/backend.php');
try {
	if (isset($_POST['pseudo']) && isset($_POST['pass'])){

		verifyPass($_POST['pseudo'],$_POST['pass']);
	}
	elseif (isset($_GET['action'])) {
	    if ($_GET['action'] == 'listPosts') {
	        listPosts();
	    }
	    elseif ($_GET['action'] == 'post') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            post();
	        }
	        else {
	            throw new Exception('Aucun identifiant de billet envoyé');
	        }
	    }
	    elseif ($_GET['action'] == 'addComment') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
	                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
	            }
	            else {
	                throw new Exception('Tous les champs ne sont pas remplis !');
	            }
	        }
	        else {
	            throw new Exception('Aucun identifiant de billet envoyé');
	        }
	    }
	    elseif ($_GET['action'] == 'postNews') {
	    	if (!empty($_POST['title']) && !empty($_POST['content'])) {	    		
	            addNews($_POST['title'], $_POST['content'],$_POST['imgURL']);	        
	        }
	        else {
	            throw new Exception('Tous les champs ne sont pas remplis !');
	        }
	    }
	    elseif ($_GET['action'] == 'auth'){	    	
	    	showAuth();
	    }
	    elseif ($_GET['action'] == 'admin'){	    	
	    	listPostsAdmin();	    	
	    }
	    elseif ($_GET['action'] == 'adminPost'){	    	
	    	adminPost();	    	
	    }
	    elseif ($_GET['action'] == 'deletePost'){
	    	 if (isset($_GET['id']) && $_GET['id'] > 0) {
	            deletePost();
	        }	    	
	    } 
	    elseif ($_GET['action'] == 'deleteComment'){
	    	 if (isset($_GET['id']) && $_GET['id'] > 0) {
	            deleteComment();
	        }	    	
	    } 
	    elseif ($_GET['action'] == 'updatePost'){
	    	 if (isset($_GET['id']) && $_GET['id'] > 0) {
	            updatePost($_GET['id'],$_POST['title'],$_POST['content'],$_POST['imgURL']);
	        }	    	
	    } 
	}
	else {
	    showHome();	   
	}
}
catch(Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}
