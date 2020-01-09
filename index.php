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
        switch ($_GET['page'])
        {
            case 'chapitre':
                require('controller/chapitreControl.php');
                getChapitre();
                break;
            case 'delete':
                require('controller/deleteControl.php');
                getDelete();
                break;
            case 'delete-com':
                require('controller/commentairesControl.php');
                getDeleteCom();
                break;
            case 'commentaires':
                require('controller/commentairesControl.php');
                getCommentaire();
                break;
            case 'signal':
                require('controller/commentairesControl.php');
                getSignal();
                break;
            case 'approuve':
                require('controller/commentairesControl.php');
                getApprouve();
                break;
            case 'login':
                require('controller/loginControl.php');
                getLogin();
                break;
            case 'editer':
                require('controller/editerControl.php');
                getEditer();
                break;
            case 'board':
                require('controller/boardControl.php');
                getBoard();
                break;
            case 'update':
                require('controller/updateControl.php');
                getUpdate();
                break;
            case 'home':
                require('controller/homeControl.php');
                getHome();
                break;
            default:
                require('controller/404Control.php');
                getError();
                break;
        }
    }
     else
    {
        require('controller/accueilControl.php');
        getAccueil();
    }
