<?php
require('controler/controler.php');


try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			}
			else {
				throw new Exception('aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else {
					throw new Exception('tous les champs ne sont pas remplis !');
				}
			}
			else {
				throw new Exception('aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'editComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (isset($_GET['comment']) && $_GET['comment'] > 0) {
					editComment($_GET['id'], $_GET['comment']);
				}
				else {
					throw new Exception("aucun commentaire !!");
					
				}
			}
			else {
				throw new Exception('aucun identifiant de billet envoyé');
			}
		}
	}
	else {
		listPosts();
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}