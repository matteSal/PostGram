<?php

    include '../backend/Utente.php';

    $utente = new Utente();
    $utente->creaTabella();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRegistrazione.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Arimo&family=Lora&family=Patua+One&family=Secular+One&family=Tapestry&display=swap" rel="stylesheet">
    <title>Registrati per la prima volta!</title>
</head>
<body>
    <div class="contieneInput">
        <img class="immagineP" src="https://st2.depositphotos.com/1024516/7326/v/950/depositphotos_73268495-stock-illustration-vector-logo-for-letter-p.jpg" alt="">
    <form action="" method="POST">
        <label for="" name="nome"></label>
        <input class="nome" type="text" name="nome" placeholder="Inserisci il tuo nome" required>
        <label for="" name="cognome"></label>
        <input class="cognome" type="text" name="cognome" placeholder="Inserisci il tuo cognome" required>
        <label for="" name="email"></label>
        <input class="email" type="text" name="email" placeholder="Inserisci la tua e-mail" required>
        <label for="" name="password"></label>
        <input class="password" type="text" name="password" placeholder="Inserisci la tua password" required>
        <input class="bottone" type="submit" name="button" value="Registrati">
        <h1 class="accesso">Sei già un nostro utente? </h1><a href="accesso.php"><h1 class="accedi" >Accedi.</h1></a>
    </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST['button'])) {

        $utente->registraUtente($_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['password']);
        header('Location: accesso.php');

    }
    
    

?>