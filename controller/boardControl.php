<?php 
    function getBoard() {
        $billetManager = new BilletsManager();   
        $billets = $billetManager->getAllBillet();
        require('view/board.php');
    }    