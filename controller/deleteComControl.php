<?php
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

