<?php 
    session_start();
    require ('./Model/Billet.php');
    require ('./Model/BilletsManager.php');
    require ('./Model/Commentaire.php');
    require ('./Model/CommentairesManager.php');
    
    $billetManager = new BilletsManager();   
    $billets = $billetManager->getAllBillet();
    $commentaireManager = new CommentairesManager();   
    $accueil = true;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
        <?php include('header.php'); ?>
        <div class="row">
            <?php foreach ($billets as $billet) { ?>
                <div class="news">
                    <h2>
                        <?= $billet->getTitre() ?><br />
                    </h2>
                    <hr class="mt-0 separator" />
                    <?php if (isset($_SESSION['id'])) { ?>
                    <p class="date-crea">
                        <em>le <?= $billet->getDateCreation() ?></em>
                        <a class="editer ml-1" href="update.php?billet=<?= $billet->getId() ?>" title="Editer l'article">
                            <img src="./img/svg/pen.svg" alt="" class="icon icon-editer" />
                            Editer
                        </a>
                        <a class="delete ml-1" href="delete.php?billet=<?= $billet->getId() ?>" title="Supprimer l'article">
                            <img src="./img/svg/trash.svg" alt="" class="icon icon-delete" />
                            Supprimer
                        </a>
                    </p>
                    <?php } ?>
                    <p class="contenu contenu-hidden">
                    <?= $billet->getContenu() ?>
                    <br />
                    </p>
                    <a href="chapitre.php?billet=<?= $billet->getId() ?>">Lire la suite..</a>
                    <hr />
                    <div class="commentaires">
                        <h4 class="text-center mb-4">Derniers commentaires</h4>
                        <?php 
                            $commentaires = $commentaireManager->getAllCommentaire($billet->getId());
                            foreach ($commentaires as $commentaire)
                            { 
                        ?>
                        <div class="show-commentaires mb-5">
                            <p>
                                <strong> <?= $commentaire->getPseudo() ?> </strong> 
                                <em class="small-date">le <?= $commentaire->getDateCommentaire() ?></em>
                            </p>
                            <p class="ml-3"><?= $commentaire->getCommentaire() ?></p>
                        </div>
                        <?php } ?>
                        <div class="text-right mr-4">
                            <img src="./img/svg/comment.svg" alt="" class="icon icon-comment" />
                            <a href="chapitre.php?billet=<?= $billet->getId() ?>#commentaires">Voir tous les commentaires</a>                        
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>