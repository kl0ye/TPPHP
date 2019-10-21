<?php 
    session_start();
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getcommentaire());
    }
    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet ORDER BY date_creation');
    $reqCom = $bdd->prepare('SELECT pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC LIMIT 0,2');

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
            <?php while ($donnees = $req->fetch()) { ?>
                <div class="news">
                    <h2>
                        <?= htmlspecialchars($donnees['titre']); ?><br />
                    </h2>
                    <?php if (isset($_SESSION['id'])) { ?>
                    <p class="date-crea">
                        <em>le <?= $donnees['date_creation_fr']; ?></em>
                        <a class="delete ml-1" href="delete.php?billet=<?= $donnees['id'] ?>">
                            <img src="./img/svg/trash.svg" alt="" class="icon icon-delete" />
                            Supprimer
                        </a>
                    </p>
                    <?php } ?>
                    <p class="contenu contenu-hidden">
                    <?= nl2br(htmlspecialchars($donnees['contenu'])) ?>
                    <br />
                    </p>
                    <a href="chapitre.php?billet=<?= $donnees['id'] ?>">Lire la suite..</a>
                    <hr />
                    <div class="commentaires">
                        <h4 class="text-center mb-4">Derniers commentaires</h4>
                        <?php 
                            $reqCom->execute(array($donnees['id']));
                            while ($commentaire = $reqCom->fetch()) 
                            { 
                        ?>
                            <div class="color-box-commentaires">
                                <div class="show-commentaires index-commentaire">
                                    <p class="mb-1"><strong><?= htmlspecialchars($commentaire['pseudo']) ?></strong> le <?= $commentaire['date_commentaire_fr'] ?></p>
                                    <p class="ml-3 mb-1"><?= nl2br(htmlspecialchars($commentaire['commentaire'])) ?></p>
                                </div><br />
                            </div>
                        <?php } ?>
                        <div class="text-right mr-4">
                            <img src="./img/svg/comment.svg" alt="" class="icon icon-comment" />
                            <a href="chapitre.php?billet=<?= $donnees['id'] ?>#commentaires">Voir tous les commentaires</a>                        
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>