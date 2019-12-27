<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="icon" href=".public/img/favicon.png" type="image/png">
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    </head>
        
    <body>
        <?php require('header.php'); ?>
        <section class="row">
            <p class="back-link mt-2 ml-2">
                <a href="index.php">Retour à la l'accueil</a>
            </p>
            <article class="news news-connect row justify-content-center">
                <div class="col-9 col-md-6">
                    <?php if (empty($_SESSION['id'])) { ?>
                    <form action="index.php?page=login" method="post">
                        <h2 class="mb-4">Connexion</h2>
                            <?php if (isset($errorLogin)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <p class="mb-0"> 
                                        <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                                        <?= $errorLogin ?>
                                    </p class="alert">
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="pseudo" class="label-editor pl-2">Pseudo</label>
                                <input type="text" name="pseudo" class="form-control" id="pseudoConnect" placeholder="Votre pseudo" required>
                            </div>
                            <div class="form-group mb-0">
                                <label for="pass" class="label-editor pl-2">Mot de passe</label>
                                <input type="password" name="pass" class="form-control" id="passConnect" placeholder="Password" required>
                            </div>
                            <input type="submit" class=" btn-publi btn-lg btn-block" value="Se connecter" />
                    </form>
                    <?php } else {
                         if (isset($successLogin)) { ?>
                            <h2 class="mb-3">Connexion</h2>
                            <div class="alert alert-success" role="alert">
                                <p class="mb-0"> 
                                <img src="./public/img/svg/check.svg" alt="" class="icon icon-alert mr-2" />
                                <?= $successLogin ?>
                                </p class="alert">
                            </div>
                        <?php } if (isset($commentaireSignal)) { ?> 
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> 
                                    <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                                    <?= $alertCom ?>
                                </p>
                            </div>
                        <?php } ?> 
                        <div class="text-center user m-3">
                            <img src="./public/img/svg/user.svg" alt="" class="icon icon-user align-center p-1" />
                        </div>
                        <h5 class="text-center">Ravie de vous revoir, <?= $user->getPseudo() ?></h5>
                        <p class="text-center m-3">Que souhaitez-vous faire ?</p>
                        <table class="action">
                            <tr>
                                <td class="text-center">
                                    <a class="file ml-2 mr-2" href="index.php?page=editer">
                                        <img src="./public/img/svg/file.svg" alt="" class="icon icon-file" />
                                    </a>
                                </td>
                                <td class="text-center">
                                    <?php if (isset($commentaireSignal)) { ?> 
                                        <a class="m-2" href="index.php?page=commentaires">
                                            <img src="./public/img/svg/comment-signal.svg" alt="" class="icon icon-comment-regular" />
                                        </a>
                                    <?php } else { ?> 
                                        <a class="m-2" href="index.php?page=commentaires">
                                            <img src="./public/img/svg/comment-regular.svg" alt="" class="icon icon-comment-regular" />
                                        </a>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a class="board ml-2 mr-2" href="index.php?page=board">
                                        <img src="./public/img/svg/board.svg" alt="" class="icon icon-board" />
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
                        
                        <form action="index.php?page=login" method="post">
                            <input type="submit" name="deconnect" class="offset-1 col-10 btn-publi btn-lg btn-block" value="Se deconnecter" />
                        </form>
                    <?php } ?>
                </div>
            </article>
        </section>
    </body>T
</html>