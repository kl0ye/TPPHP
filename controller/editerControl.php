<?php
    session_start();
    require ('./model/Billet.php');
    require ('./model/BilletsManager.php');
   
    if (isset($_POST['titre']) && isset($_POST['contenu'])) 
    {
        $req = new BilletsManager();   
        $addArticle = $req->add($_POST['titre'], $_POST['contenu']);
        $billet = $req->getAfterAdd($_POST['contenu']);
        header('Location: chapitre.php?billet=' . $billet->getId());
    }
   