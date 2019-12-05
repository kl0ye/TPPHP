<?php 
    function getCommentaire() {
        $commentaireManager = new CommentairesManager();   
        $commentaires = $commentaireManager->getListCommentaire();
        require('view/commentaires.php');  
    }
