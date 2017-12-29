<?php

namespace blog_mvc\model;

require_once('model/Manager.php');

class CommentManager extends Manager {

	public function getComments($postId) {
		

	    $comments = Manager::getDb()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
	    $comments->execute(array($postId));

	    return $comments;
	}

	public function postComment($postId, $author, $comment) {

	    $comments = Manager::getDb()->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($postId, $author, $comment));

	    return $affectedLines;
	}

	public function editComment($commentId) {
	    $comments = Manager::getDb()->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
	    $comments->execute(array($commentId));

	    return $comments;
	}

}

