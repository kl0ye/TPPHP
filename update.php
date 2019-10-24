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
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM billet WHERE id = ?');
    $req->execute(array($_GET['billet']));
    $donnees = $req->fetch();
    if (isset($_POST['contenu']) && isset($_POST['titre'])) 
    {
        var_dump("coucou");
        var_dump(($_POST['titre']));
        var_dump(($_POST['contenu']));
        $reqUpdate = $bdd->prepare('UPDATE billet SET titre = :titre , contenu = :contenu WHERE billet . id = :id');
        $reqUpdate->execute([
                'titre' => $_POST['titre'], 
                'contenu' => $_POST['contenu'], 
                'id' => $_POST['id_billet']
            ]);
        header('Location: chapitre.php?billet=' . $_POST['id_billet']);
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
                    <form action="update.php" method="post">
                        <h2 class="mb-5">Nouveau Chapitre</h2>
                        <input type="hidden" name="id_billet" id="id-billet" value="<?= $_GET['billet'] ?>" />
                        <div class="input-form mb-4 text-center">
                            <label class="label-editor" for="titre">Titre</label>
                            <input type="text" class="form-control radius" name="titre" id="titre" value="<?= $donnees['titre'] ?>" required />
                        </div>  
                        <div class="input-form mb-4 text-center">
                            <label class="label-editor" for="contenu">Contenu</label>
                            <textarea class="form-control radius" rows="15" name="contenu" id="contenu" minlength="250" required><?= $donnees['contenu'] ?></textarea>
                        </div>    
                        <input type="submit" class=" btn-publi btn-lg btn-block" value="Mettre à jour" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>