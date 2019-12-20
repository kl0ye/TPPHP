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
   
    if (isset($_POST['titre']) && isset($_POST['contenu'])) 
    {
        $req = $bdd->prepare('INSERT INTO billet (titre, contenu, date_creation) VALUES(?, ?, NOW())');
        $req->execute(array($_POST['titre'], $_POST['contenu']));
        header('Location: index.php');
    }
    $accueil = true;
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
        <?php require('./view/header.php'); ?>
        <div class="row">
            <div class="news news-accueil">
                <h2>Bienvenue<br /></h2>
                <hr class="mt-0 separator" />

                <div class="action-accueil">
                    <table class="action-accueil">
                        <tr>
                            <td class="text-center">
                                <h4>Voir tous les chapitres</h4>
                            </td>
                            <td class="text-center">
                                <h4>Le plus commente</h4>
                            </td>
                            <td class="text-center">
                                <h4>Le plus recent</h4>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="img-jean">
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
                    <img src="./public/img/jean.jpg"class="photo-jean" alt="">
                </div>
                
            </div>
        </div>
    </body>
</html>