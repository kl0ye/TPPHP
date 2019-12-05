<?php
    function getUpdate() {
        var_dump($_GET['billet']);
        if (isset($_POST['contenu']) && isset($_POST['titre'])) 
        {
            $reqUpdateArticle = new BilletsManager();   
            $updateArticle = $reqUpdateArticle->update($_POST['titre'], $_POST['contenu'], $_POST['id_billet']);
            header('Location: index.php?page=board');
        }
        if (isset($_GET['billet'])) {
            $billetManager = new BilletsManager();   
            $billet = $billetManager->get($_GET['billet']);
        }
        require('view/update.php');
    }
