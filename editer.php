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
   
    if (isset($_POST['titre']) && isset($_POST['contenu'])) 
    {
        $req = $bdd->prepare('INSERT INTO billet (titre, contenu, date_creation) VALUES(?, ?, NOW())');
        $req->execute(array($_POST['titre'], $_POST['contenu']));
        header('Location: index.php');
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
<<<<<<< Updated upstream
        <h1>Billet simple pour l'Alaska</h1>
        <p class="back-link">
            <a href="index.php">Retour à la liste des billets</a>
        </p>

        <div class="news">
            <div class="commentaires">
                <form action="send.php" method="post">
                    <h2 class="mb-3">Nouveau Chapitre</h2>
                    <div class="input-form mb-3 text-center">
                        <label class="label-editor" for="titre">Titre</label>
                        <input type="text" class="form-control radius" name="titre" id="titre" required />
                    </div>  
                    <div class="input-form mb-3 text-center">
                        <label class="label-editor" for="contenu">Contenu</label>
                        <textarea class="form-control radius" rows="15" name="contenu" id="contenu" minlength="250" required></textarea>
                    </div>    
                    <input type="submit" class=" btn-publi btn-lg btn-block" value="Publier" />
                </form>
=======
        <?php include('header.php'); ?>
        <div class="row">
            <p class=" mt-2 ml-2">
                <a href="index.php">Retour à la liste des billets</a>
            </p>
            <div class="news">
                <div class="commentaires">
                    <form action="editer.php" method="post">
                        <h2 class="mb-5">Nouveau Chapitre</h2>
                        <div class="input-form mb-4 text-center">
                            <label class="label-editor" for="titre">Titre</label>
                            <input type="text" class="form-control radius" name="titre" id="titre" required />
                        </div>  
                        <div class="input-form mb-4 text-center">
                            <label class="label-editor" for="contenu">Contenu</label>
                            <textarea class="form-control radius" rows="15" name="contenu" id="contenu" minlength="250" required></textarea>
                        </div>    
                        <input type="submit" class=" btn-publi btn-lg btn-block" value="Publier" />
                    </form>
                </div>
>>>>>>> Stashed changes
            </div>
        </div>
    </body>
</html>