<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Jean FORTEROCHE</title>
        <link href="public/css/style.css" rel="stylesheet" />        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
	</script>
        
    </head>   
    <body>
    	<header>
	    	<nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.html" id="titleNav">Billet simple pour l'Alaska</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-expanded="false">
                            <span class="sr-only"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <ul class="nav navbar-nav">
                        <li> <a href="index.html">Accueil</a> </li>
                        <li> <a href="chapitres">Tous les chapitres</a> </li>

                        <?php if (isAdmin()) { ?>
                            <li> <a href="authentification">Administration</a> </li>
                            <li> <a href="adminDeco">Se déconnecter</a> </li>  
                        <?php }
                        else { ?>
                           <li> <a href="authentification">s'identifier</a> </li>   
                           <?php }; ?>     
                      </ul>          
    		        </div>
                </div>
	      	</nav>
	    </header> 
	    <div class="site-content">
        	<?= $content ?>        	
        </div>
        <footer class="page-footer col-lg-12 bg-info">
        	<div class="text-center">
       			<address>
            		<p>Vous pouvez me contacter à cette adresse :</p>
            		<strong>Jean FORTEROCHE</strong><br>
           			Allée du Froid<br>
            		30755 alaska-sur-loire<br>
        		</address>
     		</div>
     		<div class="footer-copyright text-center">© 2019 Copyright:
      			<a href="index.html">A.guillaume</a>
    		</div>
        </footer>       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="public/js/script.js"></script>
    </body>
</html>