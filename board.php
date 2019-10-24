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
    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet ORDER BY date_creation');
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
                    Mon tableau de bord<br />
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
                        <?php while ($ligne = $req->fetch()) { ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($ligne['id']); ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($ligne['titre']); ?>
                            </td>
                            <td>
                                <a class="eye ml-1" href="chapitre.php?billet=<?= $ligne['id'] ?>" title="Voir l'article">
                                    <img src="./img/svg/eye.svg" alt="" class="icon icon-eye" />
                                </a>
                                <a class="eye ml-1" href="update.php?billet=<?= $ligne['id'] ?>" title="Editer l'article">
                                    <img src="./img/svg/pen.svg" alt="" class="icon icon-delete" />
                                </a>
                                <a class="delete ml-1" href="delete.php?billet=<?= $ligne['id'] ?>" title="Supprimer l'article">
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