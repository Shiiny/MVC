<?php 

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

use \blog_mvc\model\PostManager;
use \blog_mvc\model\CommentManager;


function listPosts() {
	$postManager = new PostManager();
	$posts = $postManager->getAllPosts();

	require('view/frontend/listPostsView.php');
}

function post() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment) {
	$commentManager = new CommentManager();

	$affectedLines = $commentManager->postComment($postId, $author, $comment);

	if($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function editComment($postId, $commentId) {
	$commentManager = new CommentManager();

	$comments = $commentManager->editComment($_GET['comment']);

	header('Location: index.php?action=post&id=' . $postId);

}