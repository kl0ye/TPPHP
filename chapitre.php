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
        <?php
            $url = $_SERVER['REQUEST_URI'];
            console_log($url);
            if (strpos($url, "billet=1") !== false) {

                console_log("coucou");
            }
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet WHERE id = ?');
            $req->execute(array($_GET['billet']));
            $donnees = $req->fetch();
        ?>
        <p class="back-link">
            <a href="index.php">Retour à l'accueil</a>
        </p>

        <div class="news">
            <h2>
                <?php echo htmlspecialchars($donnees['titre']); ?>
            </h2>
            <p class="date-crea">
                <em>le <?php echo $donnees['date_creation_fr']; ?></em>
            </p>
        
            <p class="contenu">
            <?php
            echo nl2br(htmlspecialchars($donnees['contenu']));
            ?>
            </p>
        </div>
        <div class="news" id="commentaires">
        <h2>Commentaires</h2>
        <div class="color-box-commentaires">
        <?php
        $req->closeCursor();

        $req = $bdd->prepare('SELECT pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
        $req->execute(array($_GET['billet']));

        while ($donnees = $req->fetch())
        {
        ?>
            <div class="show-commentaires">
                <p><strong><?php echo htmlspecialchars($donnees['pseudo']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
                <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
            </div><br />
        <?php
        } 
        $req->closeCursor();

        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet WHERE id = ?');
        $req->execute(array($_GET['billet']));
        while ($donnees = $req->fetch())
        {
        ?>
        </div>
        <hr />
            <div class="commentaires">
                <h4>Laissez un commentaire</h4>
                <form action="send.php" method="post">
                    <input type="hidden" name="id_billet" id="id-billet" value="<?php echo $donnees['id']; ?>" />
                    <input type="hidden" name="from_index" value="non" /><br />
                    <div class="input-form text-center">
                        <label for="auteur">Pseudo</label>
                        <input type="text" class="form-control radius" name="pseudo" id="pseudo" required /><br />
                        <label for="commentaire">Commentaire</label>
                        <textarea name="commentaire" class="form-control radius" id="commentaire" required></textarea>
                    </div>
                    <input type="submit" class=" btn-publi btn-lg btn-block"  value="Envoyer" />
                </form>
            </div>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>