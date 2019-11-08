<?php
    session_start();
    require ('./Model/Billet.php');
    require ('./Model/BilletsManager.php');
   
    if (isset($_POST['titre']) && isset($_POST['contenu'])) 
    {
        $req = new BilletsManager();   
        $addArticle = $req->add($_POST['titre'], $_POST['contenu']);
        $billet = $req->getAfterAdd($_POST['contenu']);
        header('Location: chapitre.php?billet=' . $billet->getId());
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
            <p class=" mt-2 ml-2">
                <a href="board.php">Retour au tableau de bord</a>
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
            </div>
        </div>
    </body>
</html>