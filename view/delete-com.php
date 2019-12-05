<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
        <?php require('view/header.php'); ?>
        <div class="row">
        <p class="back-link m-2">
            <a href="index.php?page=commentaires">Retour à la liste des commentaires</a>
        </p>
            <div class="news">
                <div class="alert alert-danger" role="alert">
                    <p class="alert-delete-publi mt-3"> 
                        <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert-delete mr-2" />
                        Attention vous êtes sur le point de supprimer ce commentaire !
                    </p class="alert">
                </div>
                <div class="confirm-delete text-center alert alert-secondary" role="alert">
                    <form action="" method="get">
                        <h5 class="mb-3 ">Confirmer la suppression de ce commentaire ?</h5>
                        <div class="input-form text-center">
                            <input type="hidden" name="id" id="id" value="<?= $commentaire->getId() ?>" />
                            <input type="submit" class="btn btn-light" name="oui" id="oui" value="Oui" />
                            <input type="submit" class="btn btn-secondary" name="non" id="non" value="Non" />
                        </div>
                    </form>
                </div>
                <hr />
                <h2>
                    Apperçu du commentaire de <?= $commentaire->getPseudo() ?> :
                </h2>
                <div class="show-commentaires">
                    <p>
                        <strong><?= $commentaire->getPseudo() ?></strong> le <?= $commentaire->getDateCommentaire() ?>
                    </p>
                    <p class="ml-3"><?= $commentaire->getCommentaire() ?></p>
                </div><br />
            </div>
        </div>
    </body>
</html>