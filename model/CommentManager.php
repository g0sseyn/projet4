<?php
require_once('Manager.php');
class CommentManager extends Manager
{
	public function getComments($postId) {
		$this->dbConnect();
		$comments = $this->db->prepare ('SELECT id,  author ,comment ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, is_signaled FROM comments WHERE news_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));	
		return $comments;
	}
	public function getAllComments(){
		$this->dbConnect();
		$comments = $this->db->query ('SELECT *  FROM comments  ORDER BY comment_date');	
		return $comments;
	}
	public function postComment($postId, $author, $comment)	{
	    $this->dbConnect();
	    $comments = $this->db->prepare('INSERT INTO comments(news_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($postId, $author, $comment));
	    return $affectedLines;
	}
	public function deleteComments($Id){
		$this->dbConnect();
		$deletedPost = $this->db->prepare('DELETE FROM comments WHERE news_id = ?');
		$deletedPost->execute(array($Id));
	}
	public function deleteComment($Id){
		$this->dbConnect();
		$deletedComment = $this->db->prepare('DELETE FROM comments WHERE id = ?');
		$deletedComment->execute(array($Id));
	}
	public function getComment($Id) {
		$this->dbConnect();
		$req = $this->db->prepare('SELECT * FROM comments WHERE id = ?');
		$req->execute(array($Id));
		$comment = $req->fetch();			
		return $comment;
	}
	public function updateComment($id,$comment){
		$this->dbConnect();
		$updateComment = $this->db->prepare('UPDATE comments SET comment = ?,is_signaled = "0" WHERE id = ?');
		$updateComment->execute(array($comment, $id));
	}
	public function getAllSignaledComments(){
		$this->dbConnect();
		$signaledComments = $this->db->query ('SELECT *  FROM comments  WHERE is_signaled = "1" ORDER BY comment_date DESC');	
		return $signaledComments;
	}
	public function getAllNonSignaledComments(){
		$this->dbConnect();
		$nonSignaledComments = $this->db->query ('SELECT *  FROM comments  WHERE is_signaled = "0" ORDER BY comment_date DESC');	
		return $nonSignaledComments;
	}
	public function signalComment($id){
		$this->dbConnect();
		$signalComment = $this->db->prepare('UPDATE comments SET is_signaled = "1" WHERE id = ?');
		$signalComment->execute(array($id));
	}
}

