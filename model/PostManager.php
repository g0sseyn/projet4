<?php
require_once('Manager.php');

class PostManager extends Manager
{
	public function getPosts(){
		$this->dbConnect();
		$posts = $this->db->query('SELECT id, title_news, content_news, DATE_FORMAT(creation_date_news, \'%d/%m/%Y à %Hh%i\') AS creation_date_news_fr ,img_url FROM news ORDER BY creation_date_news DESC LIMIT 0, 20');
		return $posts;
	}
	public function getPost($postId){
		$this->dbConnect();
		$req = $this->db->prepare('SELECT id, title_news, content_news, DATE_FORMAT(creation_date_news, \'%d/%m/%Y à %Hh%i\') AS creation_date_news_fr ,img_url FROM news WHERE id = ?');
    	$req->execute(array($postId));
    	$post = $req->fetch();
    	return $post;
	}	
	public function getLastPost(){
		$this->dbConnect();
		$req = $this->db->query('SELECT id, title_news, content_news, DATE_FORMAT(creation_date_news, \'%d/%m/%Y à %Hh%i\') AS creation_date_news_fr ,img_url FROM news ORDER BY creation_date_news DESC LIMIT 0, 1');
		$lastPost = $req->fetch();
		return $lastPost;		
	}	
	public function postNews($title, $content, $imgURL){
		$this->dbConnect();		
	    $news = $this->db->prepare('INSERT INTO news(title_news, content_news, creation_date_news, img_url) VALUES(:title, :content, NOW(),:imgurl )');
	    $affectedLines = $news->execute(array('title'=>$title,'content'=> $content,'imgurl'=> $imgURL));
	    return $affectedLines;
	}
	public function deletePost($id){
		$this->dbConnect();
		$deletedPost = $this->db->prepare('DELETE FROM news WHERE id = ?');
		$deletedPost->execute(array($id));
	}
	public function updatePost($id,$title,$content,$imgURL){
		$this->dbConnect();
		$updatePost = $this->db->prepare('UPDATE news SET title_news = ?,content_news = ?,img_url = ? WHERE id = ?');
		$updatePost->execute(array($title, $content, $imgURL,$id));
	}
}