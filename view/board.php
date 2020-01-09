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
                                <a class="eye ml-1" href="index.php?page=chapitre&billet=<?= $billet->getId() ?>" title="Voir l'article">
                                    <img src="./public/img/svg/eye.svg" alt="" class="icon icon-eye" />
                                </a>
                                <a class="eye ml-1" href="index.php?page=update&billet=<?= $billet->getId() ?>" title="Editer l'article">
                                    <img src="./public/img/svg/pen.svg" alt="" class="icon icon-delete" />
                                </a>
                                <a class="delete ml-1" href="index.php?page=delete&billet=<?= $billet->getId() ?>" title="Supprimer l'article">
                                    <img src="./public/img/svg/trash.svg" alt="" class="icon icon-delete" />
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-right mr-4">
                    <a class="edit-new ml-2 mr-2" href="index.php?page=editer">
                        <img src="./public/img/svg/edit.svg" alt="" class="icon icon-edit" />
                        Rédiger un nouveau chapitre
                    </a>
                </div>
            </section>
        </div>
        <?php require('view/footer.php'); ?>
    </body>
</html>