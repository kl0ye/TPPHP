<?php 
    function getCommentaire() {
        $commentaireManager = new CommentairesManager();   
        $commentaires = $commentaireManager->getListCommentaire();
        require('view/commentaires.php');  
    }
    function getDeleteCom() {
        if (!empty($_POST['id'])) {

            if ($_POST['oui'] === 'Oui') 
            {
                $reqDeleteCom = new CommentairesManager();
                $reqDeleteCom->delete($_POST['id']);
                header('Location: index.php?page=commentaires');
            }
            else 
            {
                header('Location: index.php?page=commentaires');
            }
        }
        if (isset($_GET['billet'])) {
            $commentaireManager = new CommentairesManager();   
            $commentaire = $commentaireManager->getOne($_GET['billet']);
        }
        require('view/delete-com.php');  
    }
    function getSignal () {
        if (isset($_GET['page']) && $_GET['page'] === 'signal') {
            $commentaireManager = new CommentairesManager();   
            $commentaire = $commentaireManager->signal($_GET['commentaire']);
            header('Location: index.php?page=chapitre&billet=' . $_GET['billet'] . '&com=signal#commentaires');
        }
    }
