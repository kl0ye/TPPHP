<?php if (isset($accueil)){ ?>
    <header class="header-img">
        <img src="./img/alaska3.jpg" class="img-alaska" alt="">
        <div class="header-contenu">
            <h1 class="accueil">Billet simple pour l'Alaska</h1>
            <nav class="text-right pb-2 mr-3">
                <a class="connect" href="login.php">
                    <img src="./img/svg/log.svg" alt="" class="icon icon-log" />
                </a>
                <?php if (isset($_SESSION['id'])){ ?>
                    <a class="params ml-2 mr-2" href="board.php">
                        <img src="./img/svg/params.svg" alt="" class="icon icon-log" />
                    </a>
                <?php } ?>
            </nav>
        </div>
    </header>
<?php } else { ?>
    <header class="header-img-other">
        <img src="./img/alaska3.jpg" class="img-alaska" alt="">
        <div class="header-contenu">
            <h1 class="other">Billet simple pour l'Alaska</h1>
            <nav class="text-right pb-2 mr-3">
                <a class="connect" href="login.php">
                    <img src="./img/svg/log.svg" alt="" class="icon icon-log" />
                </a>
                <?php if (isset($_SESSION['id'])){ ?>
                    <a class="params ml-2 mr-2" href="board.php">
                        <img src="./img/svg/params.svg" alt="" class="icon icon-log" />
                    </a>
                <?php } ?>
            </nav>
        </div>
    </header>
<?php } ?>