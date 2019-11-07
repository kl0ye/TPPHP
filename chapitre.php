<?php
    session_start();

    require ('./Model/Billet.php');
    require ('./Model/BilletsManager.php');
    require ('./Model/Commentaire.php');
    require ('./Model/CommentairesManager.php');
    
    $billetManager = new BilletsManager();   
    $billet = $billetManager->get($_GET['billet']);

    $commentaireManager = new CommentairesManager();   


    if (!empty($_POST)) 
    {
        $validation = true;

        if (empty($_POST['pseudo'])) {
            $validation = false;
            $errorPseudo = 'Veuillez saisir un pseudo' ;
        }
        else if (strlen($_POST['pseudo']) <= 3) {
            $validation = false;
            $errorPseudo = 'Le pseudo doit comporter un minimum de 3 caractères.' ;
        }
        if (empty($_POST['commentaire'])) {
            $validation = false;
            $errorCom = 'Veuillez saisir un commentaire.' ;
        }
        else if (strlen($_POST['commentaire']) <= 3) {
            $validation = false;
            $errorCom = 'Le commentaire doit comporter un minimum de 3 caractères.' ;
        }
        if ($validation) {
            $req = $bdd->prepare('INSERT INTO commentaires (id_billet, pseudo, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
            $req->execute(array($_POST['id_billet'], $_POST['pseudo'], $_POST['commentaire']));
            header("Location: chapitre.php?billet=" . $_GET['billet'] ."&send=success");

        }
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
            <p class="back-link m-2">
                <a href="index.php">Retour à l'accueil</a>
            </p>

            <div class="news">
                <h2>
                    <?= htmlspecialchars($billet->getTitre()) ?>
                </h2>
                <hr class="mt-0 separator" />
                <p class="date-crea">
                    <em>le <?= $billet->getDateCreation() ?></em>
                </p>
                <p class="contenu">
                    <?= nl2br(htmlspecialchars($billet->getContenu())) ?>
                </p>
            </div>
            <div class="news" id="commentaires">
            <h2>Commentaires</h2>
            <div class="color-box-commentaires">
            <?php $commentaire = $commentaireManager->getAllCommentaire($_GET['billet']); ?>
            </div>
            <div class="ancre-last-com" id="success"></div>
            <hr class="mt-0" />
            <?php if (isset($errorPseudo)) { ?>
                <div class="alert alert-danger" role="alert">
                    <p class="mb-0"> 
                        <img src="./img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                        <?= $errorPseudo ?>
                    </p class="alert">
                </div>
                <?php } if (isset($errorCom)) { ?>
                <div class="alert alert-danger" role="alert">
                    <p class="mb-0"> 
                        <img src="./img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                        <?= $errorCom ?>
                    </p class="alert">
                </div>
                <?php } if (isset($_GET['send'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <p class="mb-0"> 
                            <img src="./img/svg/check.svg" alt="" class="icon icon-alert mr-2" />
                            Votre commentaire a bien été envoyé.
                        </p class="alert">
                    </div>
                <?php } ?>
            
                <div class="commentaires">
                    <h4>Laissez un commentaire</h4><br/>
                    <form action="chapitre.php?billet=<?= $_GET['billet'] ?>#success" method="post">
                        <input type="hidden" name="id_billet" id="id-billet" value="<?= $_GET['billet'] ?>" />
                        <div class="input-form text-center">
                            <label for="auteur">Pseudo</label>
                            <?php if (isset($_SESSION['id'])) { ?>
                                <input type="text" class="form-control radius" name="pseudo" id="pseudo" value="<?= $_SESSION['pseudo'] ?>" /><br />
                            <?php } else { ?>
                                <input type="text" class="form-control radius" name="pseudo" id="pseudo" /><br />
                            <?php } ?>
                            <label for="commentaire">Commentaire</label>
                            <textarea name="commentaire" class="form-control radius" id="commentaire"></textarea>
                        </div>
                        <input type="submit" class=" btn-publi btn-lg btn-block"  value="Envoyer" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>