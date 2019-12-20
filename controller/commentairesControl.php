<?php 
    function getCommentaire() {
        $commentaireManager = new CommentairesManager();   
        $commentaires = $commentaireManager->getListCommentaire(); 
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
            }
        }
        require('view/commentaires.php');  
    }
    function getDeleteCom() {
        $commentaireManager = new CommentairesManager();   
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
            }
        }
        if (!empty($_POST['id'])) {

            if ($_POST['oui'] === 'Oui') 
            {
                $commentaireManager->delete($_POST['id']);
                header('Location: index.php?page=commentaires');
            }
            else 
            {
                header('Location: index.php?page=commentaires');
            }
        }
        if (isset($_GET['billet'])) {
            $commentaireManager->getOne($_GET['billet']);
        }
        require('view/delete-com.php');  
    }
    function getSignal () {
        $commentaireManager = new CommentairesManager();   
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
            }
        }
        if (isset($_GET['page']) && $_GET['page'] === 'signal') {
            $commentaireManager->signal($_GET['commentaire']);
            header('Location: index.php?page=chapitre&billet=' . $_GET['billet'] . '&com=signal#commentaires');
        }
    }
    function getApprouve () {
        $commentaireManager = new CommentairesManager();   
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
            }
        }
        if (isset($_GET['page']) && $_GET['page'] === 'approuve') {
            $commentaireManager->approuve($_GET['commentaire']);
            header('Location: index.php?page=commentaires&approuve=true');
        }
    }