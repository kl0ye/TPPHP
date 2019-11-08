<?php 
    session_start();
    require ('./Model/Billet.php');
    require ('./Model/BilletsManager.php');
    
    $billetManager = new BilletsManager();   
    $billets = $billetManager->getAllBillet();
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
                <h2 class="mb-4">
                    Mon tableau de bord
                </h2>
                <table class="table table-sm">
                    <thead>
                        <tr class="table-list">
                            <th scope="col"></th>
                            <th scope="col">Titre</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($billets as $billet) { ?>
                        <tr>
                            <td>
                                <?= $billet->getId() ?>
                            </td>
                            <td>
                                <?= $billet->getTitre() ?>
                            </td>
                            <td>
                                <a class="eye ml-1" href="chapitre.php?billet=<?= $billet->getId() ?>" title="Voir l'article">
                                    <img src="./img/svg/eye.svg" alt="" class="icon icon-eye" />
                                </a>
                                <a class="eye ml-1" href="update.php?billet=<?= $billet->getId() ?>" title="Editer l'article">
                                    <img src="./img/svg/pen.svg" alt="" class="icon icon-delete" />
                                </a>
                                <a class="delete ml-1" href="delete.php?billet=<?= $billet->getId() ?>" title="Supprimer l'article">
                                    <img src="./img/svg/trash.svg" alt="" class="icon icon-delete" />
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-right mr-4">
                    <a class="edit-new ml-2 mr-2" href="editer.php">
                        <img src="./img/svg/edit.svg" alt="" class="icon icon-edit" />
                        Rédiger un nouveau chapitre
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>