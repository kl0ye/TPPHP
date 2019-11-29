<?php
    session_start();
    require ('./model/Billet.php');
    require ('./model/BilletsManager.php');

    if (isset($_POST['contenu']) && isset($_POST['titre'])) 
    {
        $reqUpdateArticle = new BilletsManager();   
        $updateArticle = $reqUpdateArticle->update($_POST['titre'], $_POST['contenu'], $_POST['id_billet']);
        header('Location: chapitre.php?billet=' . $_POST['id_billet']);
    }

    $billetManager = new BilletsManager();   
    $billet = $billetManager->get($_GET['billet']);