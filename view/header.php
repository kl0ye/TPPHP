<?php if (isset($accueil)){ ?>
    <header class="header-img">
        <img src="./public/img/alaska3.jpg" class="img-alaska" alt="">
        <div class="header-contenu">
            <h1 class="accueil">Billet simple pour l'Alaska</h1>
            <nav class="text-right pb-2 mr-3">
                <?php if (isset($_SESSION['id'])){ ?>
                    <a class="connect" href="index.php?page=login" title="Se connecter">
                        <img src="./public/img/svg/logout.svg" alt="" class="icon icon-log" />
                    </a>
                    <?php if (isset($commentaireSignal)) { ?>
                        <a class="params ml-2" href="index.php?page=commentaires" title="Gérer les commentaires signalé">
                            <img src="./public/img/svg/comment-signal.svg" alt="" class="icon icon-log" />
                        </a> 
                    <?php } ?>
                    <a class="params ml-2 mr-2" href="index.php?page=board" title="Aller au tableau de bord">
                        <img src="./public/img/svg/params.svg" alt="" class="icon icon-log" />
                    </a>
                <?php } else { ?>
                    <a class="connect" href="index.php?page=login" title="Se connecter">
                        <img src="./public/img/svg/login.svg" alt="" class="icon icon-log" />
                    </a>
                <?php } ?>
            </nav>
        </div>
    </header>
<?php } else { ?>
    <header class="header-img-other">
        <img src="./public/img/alaska3.jpg" class="img-alaska" alt="">
        <div class="header-contenu">
            <h1 class="other">Billet simple pour l'Alaska</h1>
            <nav class="text-right pb-2 mr-3">
                <?php if (isset($_SESSION['id'])){ ?>
                    <a class="connect" href="index.php?page=login" title="Se déconnecter">
                        <img src="./public/img/svg/logout.svg" alt="" class="icon icon-log" />
                    </a>
                   <?php if (isset($commentaireSignal)) { ?>
                        <a class="params ml-2" href="index.php?page=commentaires" title="Gérer les commentaires signalé">
                            <img src="./public/img/svg/comment-signal.svg" alt="" class="icon icon-log" />
                        </a> 
                    <?php } ?>
                    <a class="params ml-2 mr-2" href="index.php?page=board" title="Aller au tableau de bord">
                        <img src="./public/img/svg/params.svg" alt="" class="icon icon-log" />
                    </a>
                <?php } else { ?>
                    <a class="connect" href="index.php?page=login" title="Se connecter">
                        <img src="./public/img/svg/login.svg" alt="" class="icon icon-log" />
                    </a>
                <?php } ?>
            </nav>
        </div>
    </header>
<?php } ?>