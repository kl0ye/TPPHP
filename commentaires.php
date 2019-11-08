<?php 
    session_start();
    require ('./Model/Commentaire.php');
    require ('./Model/CommentairesManager.php');

    $commentaireManager = new CommentairesManager();   
    $commentaires = $commentaireManager->getListCommentaire();
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
            <p class=" mt-2 ml-2">
                <a href="index.php">Retour à la l'accueil</a>
            </p>
            <div class="news row justify-content-center">
                <h2>
                    Gerer les commentaires<br />
                </h2>
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
                        <tr>
                            <td>
                                <?= $commentaire->getDateCommentaire() ?>
                            </td>
                            <td>
                                <?= $commentaire->getPseudo() ?>
                            </td>
                            <td>
                                <?= $commentaire->getCommentaire() ?>
                            </td>
                            <td>
                                <a class="eye ml-1" href="chapitre.php?billet=<?= $commentaire->getIdBillet() ?>#commentaires" title="Voir le commentaire">
                                    <img src="./img/svg/eye.svg" alt="" class="icon icon-eye" />
                                </a>
                                <a class="delete ml-1" href="delete-com.php?billet=<?= $commentaire->getIdBillet() ?>" title="Supprimer le commentaire">
                                    <img src="./img/svg/trash.svg" alt="" class="icon icon-delete" />
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            
            </div>
        </div>
    </body>
</html>