<?php
    function getDeleteCom() {
        if (!empty($_GET['id'])) {

            if ($_GET['oui'] === 'Oui') 
            {
                $reqDeleteCom = new CommentairesManager();
                $reqDeleteCom->delete($_GET['id']);
                header('Location: commentaires.php');
            }
            else 
            {
                header('Location: commentaires.php');
            }
        }
        
        $commentaireManager = new CommentairesManager();   
        $commentaire = $commentaireManager->getOne($_GET['billet']);
        require('./view/delete-com.php');  
    }

