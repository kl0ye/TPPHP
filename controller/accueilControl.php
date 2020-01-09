<?php
    function getAccueil() {

        $billetManager = new BilletsManager();   
        $billets = $billetManager->getAllBillet();
        $lastBillet = $billetManager->getLastBillet();
        $commentaireManager = new CommentairesManager();   
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
            }
        }
        $accueil = true;
        require('view/accueil.php');
    }    