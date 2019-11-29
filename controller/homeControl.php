<?php 
    function getHome() {
        $billetManager = new BilletsManager();   
        $billets = $billetManager->getAllBillet();
        $commentaireManager = new CommentairesManager();
        $accueil = true;
        require('./view/home-list.php');   
    }

