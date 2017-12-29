<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>
 
        
    <?php
    while ($data = $posts->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']); ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h3>
            
        <p><!-- On affiche le contenu du billet -->
        <?= nl2br(htmlspecialchars($data['content'])); ?>
        <br />
        <em class="comment"><a href="?action=post&id=<?php echo $data['id']; ?>">Commentaires</a></em>
        </p>
    </div>
<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>