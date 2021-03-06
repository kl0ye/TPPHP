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
            <a href="index.php">Retour à l'accueil</a>
        </p>
            <article class="news">
                <div class="alert alert-danger" role="alert">
                    <p class="alert-delete-publi mt-3"> 
                        <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert-delete mr-2" />
                        Attention vous êtes sur le point de supprimer cette publication !
                    </p>
                </div>
                <div class="confirm-delete text-center alert alert-secondary" role="alert">
                    <form action="index.php?page=delete" method="post">
                        <h5 class="mb-3 ">Confirmer la suppression de cette publication ?</h5>
                        <div class="input-form text-center">
                            <input type="hidden" name="id" id="id" value="<?= $billet->getId() ?>" />
                            <input type="submit" class="btn btn-light" name="oui" id="oui" value="Oui" />
                            <input type="submit" class="btn btn-secondary" name="non" id="non" value="Non" />
                        </div>
                    </form>
                </div>
                <hr />
                <h2>
                    <?= $billet->getTitre() ?>
                </h2>
                <p class="date-crea">
                    <em>le <?= $billet->getDateCreation() ?></em>
                </p>
            
                <div class="contenu">
                    <?= $billet->getContenu() ?>
                </div>
            </article>
        </section>
        <?php require('view/footer.php'); ?>
    </body>
</html>