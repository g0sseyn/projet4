<?php
require_once('Manager.php');
class CommentManager extends Manager
{
	public function getComments($postId) {
		$this->dbConnect();
		$comments = $this->db->prepare ('SELECT id,  author ,comment ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, is_signaled FROM comments WHERE news_id = ? ORDER BY comment_date DESC');
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
	public function deleteComments($id){
		$this->dbConnect();
		$deletedPost = $this->db->prepare('DELETE FROM comments WHERE news_id = ?');
		$deletedPost->execute(array($id));
	}
	public function deleteComment($id){
		$this->dbConnect();
		$deletedComment = $this->db->prepare('DELETE FROM comments WHERE id = ?');
		$deletedComment->execute(array($id));
	}
}

