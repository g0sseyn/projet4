<?php
class Manager
{
	protected $db;
	protected function dbconnect() {
		if(!$this->db) {
			$this->db =  new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
		}
		
	}
}
/*
function addAdmin(){

		$pseudo = 'admin';
		$pass_hache = password_hash('admin', PASSWORD_DEFAULT);

$db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
$req = $db->prepare('INSERT INTO admin(pseudo, pass) VALUES(?,?)');
$b=$req->execute(array($pseudo,$pass_hache));
$a=$db->prepare('INSERT INTO comments(news_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');	
$affectedLines = $a->execute(array('1', $pseudo, $pass_hache));
}
addAdmin(); */

