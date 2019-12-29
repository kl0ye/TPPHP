<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Bienvenue sur le blog de Jean Forteroche. Retrouvez chaque semaine un nouveau chapitre de son nouveau roman. Bonne lecture !">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="icon" href=".public/img/favicon.png" type="image/png">
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
        <?php require('view/header.php'); ?>
        <section class="row">
            <?php foreach ($billets as $billet) { ?>
                <article class="news">
                    <h2>
                        <?= $billet->getTitre() ?><br />
                    </h2>
                    <hr class="mt-0 separator" />
                    <?php if (isset($_SESSION['id'])) { ?>
                    <p class="date-crea">
                        <em>le <?= $billet->getDateCreation() ?></em>
                        <a class="editer ml-1" href="index.php?page=update&billet=<?= $billet->getId() ?>" title="Editer l'article">
                            <img src="./public/img/svg/pen.svg" alt="" class="icon icon-editer" />
                            Editer
                        </a>
                        <a class="delete ml-1" href="index.php?page=delete&billet=<?= $billet->getId() ?>" title="Supprimer l'article">
                            <img src="./public/img/svg/trash.svg" alt="" class="icon icon-delete" />
                            Supprimer
                        </a>
                    </p>
                    <?php } ?>
                    <div class="contenu contenu-hidden">
                    <?= $billet->getContenu() ?>
                    <br />
                    </div>
                    <a href="index.php?page=chapitre&billet=<?= $billet->getId() ?>">Lire la suite..</a>
                    <hr />
                    <div class="commentaires">
                        <h4 class="text-center mb-4">Derniers commentaires</h4>
                        <?php 
                            $commentaires = $commentaireManager->getAllCommentaire($billet->getId());
                            foreach ($commentaires as $commentaire) { 
                                if ($commentaire->getSignal() === '0') {
                        ?>
                        <div class="show-commentaires mb-5">
                            <p>
                                <strong> <?= $commentaire->getPseudo() ?> </strong> 
                                <em class="small-date">le <?= $commentaire->getDateCommentaire() ?></em>
                            </p>
                            <p class="ml-3"><?= $commentaire->getCommentaire() ?></p>
                        </div>
                        <?php } } ?>
                        <div class="text-right mr-4">
                            <img src="./public/img/svg/comment.svg" alt="" class="icon icon-comment" />
                            <a href="index.php?page=chapitre&billet=<?= $billet->getId() ?>#commentaires">Voir tous les commentaires</a>                        
                        </div>
                    </div>
                </article>
            <?php } ?>
        </section>
    </body>
</html>