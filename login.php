<?php 
    session_start();
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    if (!empty($_POST)) {
        $req = $bdd->prepare('SELECT id, pseudo, pass FROM users WHERE pseudo = :pseudo');
        $req->execute([
            'pseudo' => $_POST['pseudo']
        ]);
        $resultat = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

        if (!$resultat)
        {
            $errorLogin =  'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $resultat['id'];
                $successLogin = 'Vous êtes connecté !';
            }
            else {
                $errorLogin = 'Mauvais identifiant ou mot de passe !';
            }
        }
    }
    if (!empty($_GET)) {
        $_SESSION = array();
        session_destroy();
        
        setcookie('login', '');
        setcookie('pass_hache', '');
    }
    if (!empty($_SESSION['id'])) {
        $req = $bdd->prepare('SELECT id, pseudo, pass FROM users WHERE id = :id');
        $req->execute([
            'id' => $_SESSION['id']
        ]);
        $resultat = $req->fetch();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    </head>
        
    <body>
        <?php include('header.php'); ?>
        <div class="row">
            <p class=" mt-2 ml-2">
                <a href="index.php">Retour à la l'accueil</a>
            </p>
            <div class="news news-connect row justify-content-center">
                <div class="col-6">
                    <?php if (empty($_SESSION['id'])) { ?>
                    <form action="login.php" method="post">
                        <h2 class="mb-4">Connexion</h2>
                            <?php if (isset($errorLogin)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <p class="mb-0"> 
                                        <img src="./img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                                        <?= $errorLogin ?>
                                    </p class="alert">
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="pseudo" class="label-editor pl-2">Pseudo</label>
                                <input type="text" name="pseudo" class="form-control" id="pseudoConnect" placeholder="Votre pseudo">
                            </div>
                            <div class="form-group mb-0">
                                <label for="pass" class="label-editor pl-2">Mot de passe</label>
                                <input type="password" name="pass" class="form-control" id="passConnect" placeholder="Password">
                            </div>
                            <input type="submit" class=" btn-publi btn-lg btn-block" value="Se connecter" />
                    </form>
                    <?php } else {
                         if (isset($successLogin)) { ?>
                            <h2 class="mb-3">Connexion</h2>
                            <div class="alert alert-success" role="alert">
                                <p class="mb-0"> 
                                <img src="./img/svg/check.svg" alt="" class="icon icon-alert mr-2" />
                                <?= $successLogin ?>
                                </p class="alert">
                            </div>
                        <?php } ?>
                        <div class="text-center user m-3">
                            <img src="./img/svg/user.svg" alt="" class="icon icon-user align-center p-1" />
                        </div>
                        <h5 class="text-center">Ravie de vous revoir, <?= $resultat['pseudo'] ?></h5>
                        <p class="text-center m-3">Que souhaitez-vous faire ?</p>
                        <table class="action">
                            <tr>
                                <td class="text-center">
                                    <a class="file ml-2 mr-2" href="editer.php">
                                        <img src="./img/svg/file.svg" alt="" class="icon icon-file" />
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="m-2" href="editer.php">
                                        <img src="./img/svg/comment-regular.svg" alt="" class="icon icon-comment-regular" />
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="board ml-2 mr-2" href="board.php">
                                        <img src="./img/svg/board.svg" alt="" class="icon icon-board" />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <p>Rédiger un nouveau chapitre</p>
                                </td>
                                <td class="text-center">
                                    <p>Gerer les commentaires</p>
                                </td>
                                <td class="text-center">
                                    <p>Aller au tableau de bord</p>
                                </td>
                            </tr>
                        </table>
                        
                        <form action="login.php" method="get">
                            <input type="submit" name="deconnect" class="offset-1 col-10 btn-publi btn-lg btn-block" value="Se deconnecter" />
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>T
</html>