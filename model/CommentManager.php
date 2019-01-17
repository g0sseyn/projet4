<?php
require_once('Manager.php');
class CommentManager extends Manager
{
	public function getComments($postId) {
		$comments = $this->db->prepare ('SELECT id,  author ,comment ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, is_signaled FROM comments WHERE news_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));	
		return $comments;
	}
	public function getAllComments(){
		$comments = $this->db->query ('SELECT *  FROM comments  ORDER BY comment_date');	
		return $comments;
	}
	public function postComment($postId, $author, $comment)	{
	    $comments = $this->db->prepare('INSERT INTO comments(news_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($postId, $author, $comment));
	    return $affectedLines;
	}
	public function deleteComments($Id){
		$deletedComments = $this->db->prepare('DELETE FROM comments WHERE news_id = ?');
		$deletedComments->execute(array($Id));
	}
	public function deleteComment($Id){
		$deletedComment = $this->db->prepare('DELETE FROM comments WHERE id = ?');
		$deletedComment->execute(array($Id));
	}
	public function getComment($Id) {
		$req = $this->db->prepare('SELECT * FROM comments WHERE id = ?');
		$req->execute(array($Id));
		$comment = $req->fetch();			
		return $comment;
	}
	public function updateComment($id,$comment){
		$updateComment = $this->db->prepare('UPDATE comments SET comment = ?,is_signaled = "0" WHERE id = ?');
		$updateComment->execute(array($comment, $id));
	}
	public function getAllSignaledComments(){
		$signaledComments = $this->db->query ('SELECT *  FROM comments  WHERE is_signaled = "1" ORDER BY comment_date DESC');	
		return $signaledComments;
	}	
	public function signalComment($id){
		$signalComment = $this->db->prepare('UPDATE comments SET is_signaled = "1" WHERE id = ?');
		$signalComment->execute(array($id));
	}
}

