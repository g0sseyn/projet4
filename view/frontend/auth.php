<?php ob_start(); ?>
	<div class="col-sm-offset-4 col-sm-4">
		<form action="http://a-guillaume.ovh/projet4/index.php?action=login" method="post"> 
			<div class="form-group">
		        <label for="pseudo">login : </label>        
		        <input type="text" name="pseudo" class="form-control" required/>
		    </div>
		    <div class="form-group">
		        <label for="pass">password : </label>        
		        <input type="password" name="pass" class="form-control" required/>
		    </div>	
			<input type="submit" value="s'identifier" class="btn btn-success" />
		</form> 
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>