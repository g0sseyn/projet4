<?php
class Manager
{
	protected $db;
	protected function dbconnect() {
		if(!$this->db) {
			$this->db =  new PDO('mysql:host=aguillauiugoss.mysql.db;dbname=aguillauiugoss;charset=utf8', '', '');
		}
	
	}
	public function __construct(){
		if(!$this->db) {
			$this->db =  new PDO('mysql:host=aguillauiugoss.mysql.db;dbname=aguillauiugoss;charset=utf8', '', '');
		}
	}
}