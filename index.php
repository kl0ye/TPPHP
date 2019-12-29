<?php 
    session_start();

    require('Model/Billet.php');
    require('Model/BilletsManager.php');
    require('Model/Commentaire.php');
    require('Model/CommentairesManager.php');
    require('Model/User.php');
    require('Model/UserManager.php');

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
