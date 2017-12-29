<?php

namespace blog_mvc\model;

require_once('model/Manager.php');

class PostManager extends Manager {

	public function getAllPosts() {

	    // On récupère les 5 derniers billets
	    $req = Manager::getDb()->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

	    return $req;
	}

	public function getPost($postId) {

	    $req = Manager::getDb()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
	    $req->execute(array($postId));
	    $post = $req->fetch();

	    return $post;
	}

}

