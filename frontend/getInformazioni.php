<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');

    include '../backEnd/Utente.php';

    $utente = new Utente();
    $utente->getInformazioni($_GET['email']);
    print_r(json_encode($utente->getInformazioni($_GET['email'])));

?>