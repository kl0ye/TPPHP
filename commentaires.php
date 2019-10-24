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
    $reqCom = $bdd->query('SELECT id, pseudo, commentaire, id_billet, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires ORDER BY date_commentaire');

    $reqDeleteCommentaire = $bdd->prepare('DELETE FROM commentaire WHERE id = ?');
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
                        <?php while ($ligne = $reqCom->fetch()) { ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($ligne['date_commentaire_fr']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($ligne['pseudo']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($ligne['commentaire']) ?>
                            </td>
                            <td>
                                <a class="eye ml-1" href="chapitre.php?billet=<?= $ligne['id_billet'] ?>#commentaires" title="Voir le commentaire">
                                    <img src="./img/svg/eye.svg" alt="" class="icon icon-eye" />
                                </a>
                                <a class="delete ml-1" href="delete-com.php?billet=<?= $ligne['id'] ?>" title="Supprimer le commentaire">
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