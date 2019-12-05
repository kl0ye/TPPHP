<?php
    function getDelete() {
        if (!empty($_POST['id'])) {

            if ($_POST['oui'] === 'Oui') 
            {
                $reqDeleteArticle = new BilletsManager();   
                $deleteArticle = $reqDeleteArticle->delete($_POST['id']);
                header('Location: index.php?page=board');
            }
            else 
            {
                header('Location: index.php?page=board');
            }
        }
        if (isset($_GET['billet'])) {
            $billetManager = new BilletsManager();   
            $billet = $billetManager->get($_GET['billet']);
        }
        require('view/delete.php');  
    }

