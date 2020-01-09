
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="Bienvenue sur le blog de Jean Forteroche. Retrouvez chaque semaine un nouveau chapitre de son nouveau roman. Bonne lecture !">
        <link rel="icon" href=".public/img/favicon.png" type="image/png">
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" />
        <link href="./public/css/icon.css" rel="stylesheet" />
        <link href="./public/css/footer.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
        <?php require('./view/header.php'); ?>
        <div class="row">
            <div class="news news-accueil">
                <h2>Bienvenue<br /></h2>
                <hr class="mt-0 separator" />
                <div class="intro-accueil text-left mt-4 mb-5">
                    <img src="./public/img/favicon.png" class="bspa" alt="">
                    <div class="bio">
                        <p class="ml-5 mb-0">
                            Jean Forteroche décide d'innover en matière de publication pour son nouveau roman "Billet simple pour l'Alaska".
                            Chaque semaine vous pourrez ainsi retrouver un nouveau chapitre et découvrir le merveilleux périple d'Odile. 
                            Vous trouverez sous chaque chapitre un espace commentaire pour échanger sur cette incroyable histoire avec les autres lecteurs; 
                            et pourquoi pas même avec Jean Forteroche en personne.
                            Bonne lecture !
                        </p>
                    </div>
                </div>
              
                <hr class="mt-0 separator" />
                <div class="presentation-jean text-right mt-5 mb-5">
                    <div class="bio">
                        <h4 class="mb-4">Biographie</h4>
                        <p class="mr-5 mb-0">
                            À seize ans, Jean Forteroche, interrompt ses études pour aller se soigner dans le Valais 
                            et prend conscience de sa vocation littéraire.
                            En 1954, Jean Forteroche propose un premier roman, Charmoz, à Jean Cayrol, 
                            son compatriote bordelais, lecteur aux éditions du Seuil, 
                            qui le refuse tout en encourageant le jeune auteur à poursuivre dans la voie de l'écriture. 
                            Sous le titre La Ville fermée, Forteroche envoie ensuite son manuscrit à Jacques Lemarchand, 
                            lecteur aux éditions Gallimard, qui lui conseille de le réécrire. 
                            Ce roman ne sera jamais publié. En mai 1954, Jacques Lemarchand accepte le manuscrit de La Fuite.
                            Ce sera le premier roman de Forteroche publié par les Éditions Gallimard.
                        </p>
                    </div>
                    <img src="./public/img/jean.jpg" class="photo-jean" alt="">
                </div>
                <hr class="mt-0 separator" />
                <div class="action-accueil mt-5">
                    <table class="action-accueil-table">
                        <thead>
                            <tr>
                                <td class="text-center">
                                <a class="board ml-2 mr-2" href="index.php?page=home">
                                        <img src="./public/img/svg/list.svg" alt="" class="icon icon-board" />
                                    </a>

                                </td>
                                <td class="text-center">
                                    <h4>
                                        <a class="no-link" href="index.php?page=chapitre&billet=<?= $lastBillet->getId() ?>">
                                            Le plus recent
                                        </a>
                                    </h4>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <h4>
                                        <a class="no-link" href="index.php?page=home">Voir tous les chapitres</a>
                                    </h4>
                                </td>
                                <td class="text-center">
                                    <a class="board ml-2 mr-2" href="index.php?page=chapitre&billet=<?= $lastBillet->getId() ?>">
                                        <img src="./public/img/svg/clock.svg" alt="" class="icon icon-board" />
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <?php require('view/footer.php'); ?>
    </body>
</html>