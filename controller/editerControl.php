<?php
    function getEditer () {
        if (isset($_POST['titre']) && isset($_POST['contenu'])) 
        {
            $req = new BilletsManager();   
            $addArticle = $req->add($_POST['titre'], $_POST['contenu']);
            $billet = $req->getAfterAdd($_POST['contenu']);
            header('Location: index.php?page=chapitre&billet=' . $billet->getId());
        }
        require('view/editer.php');
    }

   