
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
        <?php require('header.php'); ?>
        <section class="row">
            <p class="back-link m-2">
                <a href="index.php">Retour à l'accueil</a>
            </p>

            <article class="news">
                <h2>
                    <?= $billet->getTitre() ?>
                </h2>
                <hr class="mt-0 separator" />
                <p class="date-crea">
                    <em>le <?= $billet->getDateCreation() ?></em>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <a class="editer ml-1" href="index.php?page=update&billet=<?= $billet->getId() ?>" title="Editer l'article">
                            <img src="./public/img/svg/pen.svg" alt="" class="icon icon-editer" />
                            Editer
                        </a>
                        <a class="delete ml-1" href="index.php?page=delete&billet=<?= $billet->getId() ?>" title="Supprimer l'article">
                            <img src="./public/img/svg/trash.svg" alt="" class="icon icon-delete" />
                            Supprimer
                        </a>
                    <?php } ?>
                </p>
                <p class="contenu">
                    <?= $billet->getContenu() ?>
                </p>
            </article>
            <article class="news" id="commentaires">
                <h2>Commentaires</h2>
                <div class="color-box-commentaires">
                    <?php if (isset($signalCom)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <p class="mb-0"> 
                            <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                            <?= $signalCom ?>
                        </p class="alert">
                    </div>
                    <?php } 
                        foreach ($commentaires as $commentaire) { 
                            if ($commentaire->getSignal() === '0' || isset($_SESSION['id'])) {
                    ?>
                    <div class="show-commentaires mb-5 <?php if ($commentaire->getSignal() === '1') { ?>alert-danger<?php } ?>">
                        <p>
                            <strong> <?= $commentaire->getPseudo() ?> </strong> 
                            <em class="small-date">le <?= $commentaire->getDateCommentaire() ?></em>
                        </p>
                        <p class="ml-3"><?= $commentaire->getCommentaire() ?></p>
                        <?php if (($commentaire->getSignal() === '0') && (!isset($_SESSION['id']))) { ?>
                            <p>
                                <a href="index.php?page=signal&billet=<?= $commentaire->getIdBillet() ?>&commentaire=<?= $commentaire->getId() ?>">
                                    Signaler le commentaire
                                </a>   
                            </p>
                        <?php } elseif ($commentaire->getSignal() === '1') { ?>
                            <p class="text-right">Ce commentaire à été signalé.<br>
                                <a class="text-right approuve ml-1" href="index.php?page=approuve&billet=<?= $commentaire->getIdBillet() ?>&commentaire=<?= $commentaire->getId() ?>" title="Approuver le commentaire">
                                    <img src="./public/img/svg/approuve.svg" alt="" class="icon icon-approuve" />
                                    Approuver
                                </a>
                                <a class="text-right delete ml-1" href="index.php?page=delete-com&commentaire=<?= $commentaire->getId() ?>" title="Supprimer le commentaire">
                                    <img src="./public/img/svg/trash.svg" alt="" class="icon icon-delete" />
                                    Supprimer
                                </a>
                            </p>
                        <?php } ?>
                    </div>
                    <?php  } } ?>
                </div>
                <div class="ancre-last-com" id="success"></div>
                <hr class="mt-0" />
                <?php if (isset($errorPseudo)) { ?>
                <div class="alert alert-danger" role="alert">
                    <p class="mb-0"> 
                        <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                        <?= $errorPseudo ?>
                    </p>
                </div>
                <?php } if (isset($errorCom)) { ?>
                <div class="alert alert-danger" role="alert">
                    <p class="mb-0"> 
                        <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                        <?= $errorCom ?>
                    </p>
                </div>
                <?php } if (isset($_GET['send'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <p class="mb-0"> 
                            <img src="./public/img/svg/check.svg" alt="" class="icon icon-alert mr-2" />
                            Votre commentaire a bien été envoyé.
                        </p>
                    </div>
                <?php } ?>
            
                <div class="commentaires">
                    <h4>Laissez un commentaire</h4><br/>
                    <form action="index.php?page=chapitre&billet=<?= $_GET['billet'] ?>#success" method="post">
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
            </article>
        </section>
    </body>
</html>