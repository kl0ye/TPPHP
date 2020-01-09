<?php
    function getChapitre() {
        $commentaireManager = new CommentairesManager();   
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
            }
        }
        if (!empty($_POST)) 
        {
            $validation = true;

            if (empty($_POST['pseudo'])) {
                $validation = false;
                $errorPseudo = 'Veuillez saisir un pseudo' ;
            }
            else if (strlen($_POST['pseudo']) < 3) {
                $validation = false;
                $errorPseudo = 'Le pseudo doit comporter un minimum de 3 caractères.' ;
            }
            if (empty($_POST['commentaire'])) {
                $validation = false;
                $errorCom = 'Veuillez saisir un commentaire.' ;
            }
            else if (strlen($_POST['commentaire']) < 3) {
                $validation = false;
                $errorCom = 'Le commentaire doit comporter un minimum de 3 caractères.' ;
            }
            if ($validation) {
                $commentaireManager = new CommentairesManager();   
                $addCommentaires = $commentaireManager->add($_POST['id_billet'], $_POST['pseudo'], $_POST['commentaire']);
                header("Location: index.php?page=chapitre&billet=" . $_GET['billet'] ."&send=success");
            }
        }
        if (isset($_GET['com'])) {
            $signalCom = 'Le commentaire à bien été signalé.';
        }
        if (isset($_GET['billet'])) {
            $billetManager = new BilletsManager();
            if (!($billet = $billetManager->get($_GET['billet'])))
                header("Location: index.php?page=error");
            $allBillet = count($billetManager->getAllBillet());
            $commentaires = $commentaireManager->getAllCommentaire($_GET['billet']);
        }

        require('view/chapitre.php');
    }