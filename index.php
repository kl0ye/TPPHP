<?php include("functions.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    </head>
        
    <body>
        <h1>Billet simple pour l'Alaska</h1>
        <p class="back-link">
            <a href="editer.php">Ecrire un nouveau chapitre</a>
        </p>
 
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getcommentaire());
        }
        $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet ORDER BY date_creation');

        while ($donnees = $req->fetch())
        {
        ?>
            <div class="news">
                <h2>
                    <?php echo htmlspecialchars($donnees['titre']); ?><br />
                </h2>
                <p class="date-crea">
                    <em>le <?php echo $donnees['date_creation_fr']; ?></em>
                </p>
                <p class="contenu contenu-hidden">
                <?php
                echo nl2br(htmlspecialchars($donnees['contenu']));
                ?>
                <br />
                </p>
                <a href="chapitre.php?billet=<?php echo $donnees['id']; ?>">Lire la suite..</a>
                <hr />
                <div class="commentaires">
                    <a href="chapitre.php?billet=<?php echo $donnees['id']; ?>/#commentaires">Voir tous les commentaires</a>                        
                </div>
            </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>