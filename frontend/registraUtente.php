<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');

    include '../backend/Utente.php';

    $dati = json_decode(file_get_contents("php://input"));
    $utente = new Utente();
    $utente->registraUtente($dati->nome, $dati->cognome, $dati->email, $dati->password);

    echo 'fatto';


?>