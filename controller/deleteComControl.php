<?php
    function getDeleteCom() {
        if (!empty($_GET['id'])) {

            if ($_GET['oui'] === 'Oui') 
            {
                $reqDeleteCom = new CommentairesManager();
                $reqDeleteCom->delete($_GET['id']);
                header('Location: index.php?page=commentaires');
            }
            else 
            {
                header('Location: index.php?page=commentaires');
            }
        }
        
        $commentaireManager = new CommentairesManager();   
        $commentaire = $commentaireManager->getOne($_GET['billet']);
        require('view/delete-com.php');  
    }

