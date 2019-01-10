<?php
require_once('model/Manager.php');
class UserManager extends Manager
{
	public function userInfo($pseudo){
		$req = $this->db->prepare('SELECT * FROM admin WHERE pseudo = ?');
    	$req->execute(array($pseudo));
    	$infos = $req->fetch();
    	return $infos;
	}
}