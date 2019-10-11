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
                <div class="confirm-delete text-center alert alert-secondary" role="alert">
                    <form action="delete.php" method="get">
                        <h5 class="mb-3 ">Confirmer la suppression de cette publication ?</h5>
                        <div class="input-form text-center">
                            <input type="hidden" name="id" id="id" value="<?php echo $donnees['id']; ?>" />
                            <input type="submit" class="btn btn-light" name="oui" id="oui" value="Oui" />
                            <input type="submit" class="btn btn-secondary" name="non" id="non" value="Non" />
                        </div>
                    </form>
                </div>
                <hr />
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

            <?php
            $req->closeCursor();
            ?>
        </div>
    </body>
</html>