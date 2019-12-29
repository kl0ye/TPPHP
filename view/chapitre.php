
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="Bienvenue sur le blog de Jean Forteroche. Retrouvez chaque semaine un nouveau chapitre de son nouveau roman. Bonne lecture !">
        <link rel="icon" href=".public/img/favicon.png" type="image/png">
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
        <?php require('header.php'); ?>
        <section class="row">
            <div class="back-link mt-2 ml-2">
                <a href="index.php">Retour à l'accueil</a>
            </div>

            <article class="news">
            <div class="link mt-2 d-flex justify-content-between">
                <?php if ($billet->getId() > 1 ) { ?>
                    <a class="link-nav" href="index.php?page=chapitre&billet=<?= $billet->getId()-1 ?>" title="Chapitre précédent">
                        <img src="./public/img/svg/prev.svg" alt="" class="icon icon-nav" />    
                    </a>
                <?php } else { ?>
                    <a class="link-nav"></a>
                <?php } if ($billet->getId() < $allBillet) { ?>
                    <a class="link-nav" href="index.php?page=chapitre&billet=<?= $billet->getId()+1 ?>" title="Chapitre suivant">
                        <img src="./public/img/svg/next.svg" alt="" class="icon icon-nav" />
                    </a>
                <?php } ?>
            </div>
                <h2>
                    <?= $billet->getTitre() ?>
                </h2>
                <hr class="mt-0 separator" />
                <div class="date-crea">
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
                </div>
                <div class="contenu">
                    <?= $billet->getContenu() ?>
                </div>
            </article>
            <article class="news" id="commentaires">
                <h2>Commentaires</h2>
                <div class="color-box-commentaires">
                    <?php if (isset($signalCom)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <p class="mb-0"> 
                            <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                            <?= $signalCom ?>
                        </p>
                    </div>
                    <?php } 
                        foreach ($commentaires as $commentaire) { 
                            if ($commentaire->getSignal() === '0' || isset($_SESSION['id'])) {
                    ?>
                    <div class="show-commentaires pb-4 mb-5 <?php if ($commentaire->getSignal() === '1') { ?>alert-danger<?php } ?>">
                        <div>
                            <strong> <?= $commentaire->getPseudo() ?> </strong> 
                            <em class="small-date">le <?= $commentaire->getDateCommentaire() ?></em>
                        </div>
                        <p class="ml-3 mt-3 mb-0"><?= $commentaire->getCommentaire() ?></p>
                        <?php if (($commentaire->getSignal() === '0') && (!isset($_SESSION['id']))) { ?>
                            <div class="mb-0 text-right signaler">
                                <a href="index.php?page=signal&billet=<?= $commentaire->getIdBillet() ?>&commentaire=<?= $commentaire->getId() ?>">
                                    Signaler le commentaire
                                </a>   
                            </div>
                        <?php } elseif ($commentaire->getSignal() === '1') { ?>
                            <div class="text-right mb-0 signaler">Ce commentaire à été signalé.<br>
                                <a class="text-right approuve ml-1" href="index.php?page=approuve&billet=<?= $commentaire->getIdBillet() ?>&commentaire=<?= $commentaire->getId() ?>" title="Approuver le commentaire">
                                    <img src="./public/img/svg/approuve.svg" alt="" class="icon icon-approuve" />
                                    Approuver
                                </a>
                                <a class="text-right delete ml-1" href="index.php?page=delete-com&commentaire=<?= $commentaire->getId() ?>" title="Supprimer le commentaire">
                                    <img src="./public/img/svg/trash.svg" alt="" class="icon icon-delete" />
                                    Supprimer
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <?php  } } ?>
                </div>
                <div class="ancre-last-com" id="success"></div>
                <hr class="mt-0" />
                <?php if (isset($errorPseudo)) { ?>
                <div class="alert alert-danger" role="alert">
                    <div class="mb-0"> 
                        <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                        <?= $errorPseudo ?>
                    </div>
                </div>
                <?php } if (isset($errorCom)) { ?>
                <div class="alert alert-danger" role="alert">
                    <div class="mb-0"> 
                        <img src="./public/img/svg/alert.svg" alt="" class="icon icon-alert mr-2" />
                        <?= $errorCom ?>
                    </div>
                </div>
                <?php } if (isset($_GET['send'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <div class="mb-0"> 
                            <img src="./public/img/svg/check.svg" alt="" class="icon icon-alert mr-2" />
                            Votre commentaire a bien été envoyé.
                        </div>
                    </div>
                <?php } ?>
            
                <div class="commentaires">
                    <h4>Laissez un commentaire</h4><br/>
                    <form action="index.php?page=chapitre&billet=<?= $_GET['billet'] ?>#success" method="post">
                        <input type="hidden" name="id_billet" id="id-billet" value="<?= $_GET['billet'] ?>" />
                        <div class="input-form text-center">
                            <label for="pseudo">Pseudo</label>
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