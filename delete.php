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
    console_log($_GET['oui']);
    console_log($_GET['id']);
    if ($_GET['oui'] === 'Oui') 
    {
        $req = $bdd->prepare('DELETE FROM billet WHERE id = ?');
        $req->execute([$_GET['id']]);
        header('Location: index.php');
    }
    else 
    {
        header('Location: index.php');
    }

    $req->closeCursor();
   
?>