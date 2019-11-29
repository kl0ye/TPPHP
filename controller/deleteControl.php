<?php
    session_start();

    require ('./model/Billet.php');
    require ('./model/BilletsManager.php');

    if (!empty($_GET['id'])) {

        if ($_GET['oui'] === 'Oui') 
        {
            $reqDeleteArticle = new BilletsManager();   
            $deleteArticle = $reqDeleteArticle->delete($_GET['id']);
            header('Location: board.php');
        }
        else 
        {
            header('Location: board.php');
        }
    }

    $billetManager = new BilletsManager();   
    $billet = $billetManager->get($_GET['billet']);
