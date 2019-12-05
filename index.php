<?php 
    session_start();

    require ('model/Billet.php');
    require ('model/BilletsManager.php');
    require ('model/Commentaire.php');
    require ('model/CommentairesManager.php');
    require ('model/User.php');
    require ('model/UserManager.php');

    if (!empty($_GET)) 
    {
        if ($_GET['page'] === "chapitre") 
        {
        require('controller/chapitreControl.php');
        getChapitre();
        }
        elseif ($_GET['page'] === 'delete-com')
        {
            require('controller/deleteComControl.php');
            getDeleteCom();
        }
        elseif ($_GET['page'] === 'commentaires')
        {
            require('controller/comControl.php');
            getCommentaire();
        }
        elseif ($_GET['page'] === 'login')
        {
            require('controller/loginControl.php');
            getLogin();
        }
        elseif ($_GET['page'] === 'board')
        {
            require('controller/boardControl.php');
            getBoard();
        }
        
    }
    else 
    {   
        require('controller/homeControl.php');
        getHome();
    }
