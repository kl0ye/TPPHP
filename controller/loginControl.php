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
                $userManager = new UserManager();
                $user = $userManager->get($_POST['pseudo']);
                $isPasswordCorrect = password_verify($_POST['pass'], $user->getPass());

                if (!$user)
                {
                    $errorLogin =  'Mauvais identifiant ou mot de passe !';
                }
                else
                {

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
        require('view/login.php');
    }
    