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
        elseif ($_GET['page'] === 'delete')
        {
            require('controller/deleteControl.php');
            getDelete();
        }
        elseif ($_GET['page'] === 'delete-com')
        {
            require('controller/commentairesControl.php');
            getDeleteCom();
        }
        elseif ($_GET['page'] === 'commentaires')
        {
            require('controller/commentairesControl.php');
            getCommentaire();
        }
        elseif ($_GET['page'] === 'signal') 
        {
            require('controller/commentairesControl.php');
            getSignal();
        }
        elseif ($_GET['page'] === 'approuve')
        {
            require('controller/commentairesControl.php');
            getApprouve();
        }
        elseif ($_GET['page'] === 'login')
        {
            require('controller/loginControl.php');
            getLogin();
        }
        elseif ($_GET['page'] === 'editer')
        {
            require('controller/editerControl.php');
            getEditer();
        }
        elseif ($_GET['page'] === 'board')
        {
            require('controller/boardControl.php');
            getBoard();
        }
        elseif ($_GET['page'] === 'update') 
        {
            require('controller/updateControl.php');
            getUpdate();
        }
        else {
            require('controller/404Control.php');
            getError();
        }
    }
    else 
    {   
        require('controller/homeControl.php');
        getHome();
    }
