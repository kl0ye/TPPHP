<?php 
    function getBoard() {
        $billetManager = new BilletsManager();   
        $billets = $billetManager->getAllBillet();
        $commentaireManager = new CommentairesManager();   
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
            }
        }
        require('view/board.php');
    }    