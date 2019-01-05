<?php
require_once('model/Manager.php');
class UserManager extends Manager
{
	public function getPass($pseudo){
		$this->dbConnect();
		$req = $this->db->prepare('SELECT pass, id FROM admin WHERE pseudo = ?');
    	$req->execute(array($pseudo));
    	$pass = $req->fetch();
    	return $pass;
	}
}