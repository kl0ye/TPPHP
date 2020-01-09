<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="icon" href=".public/img/favicon.png" type="image/png">
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" />
        <link href="./public/css/icon.css" rel="stylesheet" />
        <link href="./public/css/footer.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    </head>
        
    <body>
        <?php require('header.php'); ?>
        <div class="row">
            <p class="back-link mt-2 ml-2">
                <a href="index.php">Retour à la l'accueil</a>
            </p>
            <section class="news row justify-content-center">
                <h2>
                    Gerer les commentaires<br />
                </h2>
                <?php if (isset($_GET['approuve'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <p class="mb-0"> 
                            <img src="./public/img/svg/check.svg" alt="" class="icon icon-alert mr-2" />
                            Le commentaire a été approuvé.
                        </p>
                    </div>
                <?php } ?>
                <table class="table table-sm">
                    <thead>
                        <tr class="table-list">
                            <th scope="col">Date</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Commentaire</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($commentaires as $commentaire) { ?>
                        <tr <?php if ($commentaire->getSignal() === '1') { ?>class="table-danger"<?php } ?> >
                            <td>
                                <?= $commentaire->getDateCommentaire() ?>
                            </td>
                            <td>
                                <?= $commentaire->getPseudo() ?>
                            </td>
                            <td>
                                <?php if ($commentaire->getSignal() === '1') { ?>
                                    <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                                    <p class="signal">Commentaire signalé</p>
                                <?php } else { 
                                    echo $commentaire->getCommentaire(); 
                                } ?>
                            </td>
                            <td>
                                <a class="eye ml-1" href="index.php?page=chapitre&billet=<?= $commentaire->getIdBillet() ?>#commentaires" title="Voir le commentaire">
                                    <img src="./public/img/svg/eye.svg" alt="" class="icon icon-eye" />
                                </a>
                                <a class="delete ml-1" href="index.php?page=delete-com&billet=<?= $commentaire->getId() ?>" title="Supprimer le commentaire">
                                    <img src="./public/img/svg/trash.svg" alt="" class="icon icon-delete" />
                                </a>
                                <?php if ($commentaire->getSignal() === '1') { ?>
                                    <a class="text-right approuve ml-1" href="index.php?page=approuve&billet=<?= $commentaire->getIdBillet() ?>&commentaire=<?= $commentaire->getId() ?>" title="Approuver le commentaire">
                                        <img src="./public/img/svg/approuve.svg" alt="" class="icon icon-approuve" />
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            
            </section>
        </div>
        <?php require('view/footer.php'); ?>
    </body>
</html>