<?php
    session_start();
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $bdd->prepare('SELECT id, pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires WHERE id = ?');
    $req->execute(array($_GET['billet']));
    $donnees = $req->fetch();

    if (!empty($_GET['id'])) {

        if ($_GET['oui'] === 'Oui') 
        {
            $reqDeleteArticle = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
            $reqDeleteArticle->execute([$_GET['id']]);
            header('Location: commentaires.php');
        }
        else 
        {
            header('Location: commentaires.php');
        }
    }

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
            <a href="commentaires.php">Retour à la liste des commentaires</a>
        </p>
            <div class="news">
                <div class="alert alert-danger" role="alert">
                    <p class="alert-delete-publi mt-3"> 
                        <img src="./img/svg/alert.svg" alt="" class="icon icon-alert-delete mr-2" />
                        Attention vous êtes sur le point de supprimer ce commentaire !
                    </p class="alert">
                </div>
                <div class="confirm-delete text-center alert alert-secondary" role="alert">
                    <form action="delete-com.php" method="get">
                        <h5 class="mb-3 ">Confirmer la suppression de ce commentaire ?</h5>
                        <div class="input-form text-center">
                            <input type="hidden" name="id" id="id" value="<?= $donnees['id'] ?>" />
                            <input type="submit" class="btn btn-light" name="oui" id="oui" value="Oui" />
                            <input type="submit" class="btn btn-secondary" name="non" id="non" value="Non" />
                        </div>
                    </form>
                </div>
                <hr />
                <h2>
                    Apperçu du commentaire de <?= htmlspecialchars($donnees['pseudo']) ?> :
                </h2>

                <div class="show-commentaires">
                    <p><strong><?= htmlspecialchars($donnees['pseudo']); ?></strong> le <?= $donnees['date_commentaire_fr']; ?></p>
                    <p class="ml-3"><?= nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
                </div><br />
            </div>
        </div>
    </body>
</html>