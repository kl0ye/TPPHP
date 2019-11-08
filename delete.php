<?php
    session_start();

    require ('./Model/Billet.php');
    require ('./Model/BilletsManager.php');

    if (!empty($_GET['id'])) {

        if ($_GET['oui'] === 'Oui') 
        {
            $reqDeleteArticle = new BilletsManager();   
            $deleteArticle = $reqDeleteArticle->delete($_GET['id']);
            header('Location: board.php');
        }
        else 
        {
            header('Location: board.php');
        }
    }

    $billetManager = new BilletsManager();   
    $billet = $billetManager->get($_GET['billet']);

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
        <p class="back-link m-2">
            <a href="index.php">Retour à l'accueil</a>
        </p>
            <div class="news">
                <div class="alert alert-danger" role="alert">
                    <p class="alert-delete-publi mt-3"> 
                        <img src="./img/svg/alert.svg" alt="" class="icon icon-alert-delete mr-2" />
                        Attention vous êtes sur le point de supprimer cette publication !
                    </p class="alert">
                </div>
                <div class="confirm-delete text-center alert alert-secondary" role="alert">
                    <form action="delete.php" method="get">
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
            
                <p class="contenu">
                <?= $billet->getContenu() ?>
                </p>
            </div>
        </div>
    </body>
</html>