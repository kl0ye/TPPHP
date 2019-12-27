<?php 
    function getLogin() {
        if (!empty($_POST)) {
            if (isset($_POST['deconnect'])) 
            {
                $_SESSION = array();
                session_destroy();
                
                setcookie('login', '');
                setcookie('pass_hache', '');
            }
            else 
            {
                $user = false;
                $userPost = $_POST['pseudo'];
                $userManager = new UserManager();
                $usersCheck = $userManager->getAllUsers();
                foreach ($usersCheck as $users) { 
                    if ($users->getPseudo() === $userPost) {
                        $user = $userManager->get($userPost);
                    }
                }

                if (!$user)
                {
                    $errorLogin =  'Mauvais identifiant ou mot de passe !';
                }
                else
                {
                    $isPasswordCorrect = password_verify($_POST['pass'], $user->getPass());
                    if ($isPasswordCorrect) {
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['pseudo'] = $user->getPseudo();
                        $successLogin = 'Vous êtes connecté !';
                    }
                    else {
                        $errorLogin = 'Mauvais identifiant ou mot de passe !';
                    }
                }
            }
        }

        if (!empty($_SESSION['id'])) {
            $userManager = new UserManager();
            $user = $userManager->get($_SESSION['pseudo']);
        }
        $commentaireManager = new CommentairesManager();   
        $commentairesCheck = $commentaireManager->getListCommentaire();
        foreach ($commentairesCheck as $commentaire) { 
            if ($commentaire->getSignal() === '1') {
                $commentaireSignal = true;
                $alertCom = 'Un ou plusieurs commentaires vous ont été signalés.';
            }
        }
        require('view/login.php');
    }
    