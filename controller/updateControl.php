<?php
    function getUpdate() {
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
        $commentaireManager = new CommentairesManager();   
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
            }
        }
        require('view/update.php');
    }
