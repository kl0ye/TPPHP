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
                <table>
                    <?php while ($ligne = $req->fetch()) { ?>
                    <tr>
                        <?php while ($donnees = $req->fetch()) { ?>
                        <td>
                            <?= htmlspecialchars($donnees['id']); ?><br />
                        </td>
                        <td>
                            <?= htmlspecialchars($donnees['titre']); ?><br />
                        </td>
                            <?php } ?>
                    </tr>
                    <?php } ?>
                </table>
            
            </div>
        </div>
    </body>
</html>