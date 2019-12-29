<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="icon" href=".public/img/favicon.png" type="image/png">
        <title>Billet simple pour l'Alaska</title>
        <link href="./public/css/style.css" rel="stylesheet" /> 
        <script src="/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
        <script>tinymce.init({ selector:'textarea' });</script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
        <?php require('view/header.php'); ?>
        <section class="row">
            <p class="back-link mt-2 ml-2">
                <a href="index.php?page=board">Retour au tableau de bord</a>
            </p>
            <article class="news">
                <div class="commentaires">
                    <form action="index.php?page=editer" method="post">
                        <h2 class="mb-5">Nouveau Chapitre</h2>
                        <div class="input-form mb-4 text-center">
                            <label class="label-editor" for="titre">Titre</label>
                            <input type="text" class="form-control radius" name="titre" id="titre" required />
                        </div>  
                        <div class="input-form mb-4 text-center">
                            <label class="label-editor" for="contenu">Contenu</label>
                            <textarea class="form-control radius" rows="15" name="contenu" id="contenu" minlength="250"></textarea>
                        </div>    
                        <input type="submit" class=" btn-publi btn-lg btn-block" value="Publier" />
                    </form>
                </div>
            </article>
        </section>
    </body>
</html>