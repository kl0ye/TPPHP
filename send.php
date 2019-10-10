<?php
    include('functions.php');
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    if (isset($_POST['pseudo']) && isset($_POST['commentaire'])) 
    {
        $req = $bdd->prepare('INSERT INTO commentaires (id_billet, pseudo, commentaire, from_index, date_commentaire) VALUES(?, ?, ?, ?, NOW())');
        $req->execute(array($_POST['id_billet'], $_POST['pseudo'], $_POST['commentaire'], $_POST['from_index']));
    
        $urlcom1 = 'chapitre.php?billet=1';
        $urlcom2 = 'chapitre.php?billet=2';
    
        if ($_POST['from_index'] === 'oui')
        {
            header('Location: index.php');
        } 
        else 
        {
            if ($_POST['id_billet'] === '1')
            {
                header("Location: $urlcom1");
            } 
            else if ($_POST['id_billet'] === '2') 
            {
                header("Location: $urlcom2");
            }
        }
        $req->closeCursor();
    }
    if (isset($_POST['titre']) && isset($_POST['contenu'])) 
    {
        $req = $bdd->prepare('INSERT INTO billet (titre, contenu, date_creation) VALUES(?, ?, NOW())');
        $req->execute(array($_POST['titre'], $_POST['contenu']));
        header('Location: index.php');
        $req->closeCursor();
    }
   
?>