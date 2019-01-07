<?php
session_start();
require('controller/postController.php');
require('controller/commentController.php');
require('controller/userController.php');
try {
	if (isset($_POST['pseudo']) && isset($_POST['pass'])){

		verifyPass($_POST['pseudo'],$_POST['pass']);
	}
	elseif (isset($_GET['action'])) {
	    if ($_GET['action'] == 'listPosts') {
	        listPosts();
	    }
	    elseif ($_GET['action'] == 'post') {	       
	        post(); 
	    }
	    elseif ($_GET['action'] == 'addComment') {	       
	    	addComment();	       
	    }
	    elseif ($_GET['action'] == 'addPost') {	    		    		
	        addPost();	        
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
	        deletePost();	           	
	    } 
	    elseif ($_GET['action'] == 'deleteComment'){	    
	        deleteComment();	       	    	
	    } 
	    elseif ($_GET['action'] == 'updatePost'){
	    	updatePost();	         	
	    } 
	    elseif ($_GET['action'] == 'adminDeco'){
	    	adminDeco();
	    }
	    elseif ($_GET['action'] == 'updateComment'){	    	 
	        updateComment();	        	    	
	    }
	    elseif ($_GET['action'] == 'adminComment'){	    	
	        adminComment();	       	    	
	    }
	    elseif ($_GET['action'] == 'signalComment'){	    	
	        signalComment();	       	    	
	    }
	}
	else {
	    showHome();	   
	}
}
catch(Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}
