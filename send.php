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

   
    if (isset($_POST['titre']) && isset($_POST['contenu'])) 
    {
        $req = $bdd->prepare('INSERT INTO billet (titre, contenu, date_creation) VALUES(?, ?, NOW())');
        $req->execute(array($_POST['titre'], $_POST['contenu']));
        header('Location: index.php');
        $req->closeCursor();
    }
   
?>