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
        <?php require('view/header.php'); ?>
        <section class="row">
        <p class="back-link mt-2 ml-2">
            <a href="index.php?page=commentaires">Retour à la liste des commentaires</a>
        </p>
            <article class="news">
                <div class="alert alert-danger" role="alert">
                    <p class="alert-delete-publi mt-3"> 
                        <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert-delete mr-2" />
                        Attention vous êtes sur le point de supprimer ce commentaire !
                    </p>
                </div>
                <div class="confirm-delete text-center alert alert-secondary" role="alert">
                    <form action="index.php?page=delete-com" method="post">
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
            </article>
        </section>
        <?php require('view/footer.php'); ?>
    </body>
</html>