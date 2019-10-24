<header>
    <h1>Billet simple pour l'Alaska</h1>
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
</header>