<?php

    session_start();
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
    <link rel="stylesheet" href="styleAccesso.css">
    <title>Effettua qui l'accesso</title>
</head>
<body>

    <div class="contieneInput">
            <img class="immagineP" src="https://st2.depositphotos.com/1024516/7326/v/950/depositphotos_73268495-stock-illustration-vector-logo-for-letter-p.jpg" alt="">
        <form action="" method="POST">
            <label for="" name="email"></label>
            <input class="email" type="text" name="email" placeholder="Inserisci la tua e-mail">
            <label for="" name="password"></label>
            <input class="password" type="text" name="password" placeholder="Inserisci la tua password">
            <input class="bottone" type="submit" name="button" value="Accedi">
        </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST['button'])) {

        $array = $utente->accessoUtente($_POST['email'], $_POST['password']);


        if(count($array) > 0) {
            
            $_SESSION['sessioneemail'] = $_POST['email'];
            header('Location: postpage.php');
            

        }else {

            echo "<div class='errore'>
            <h1>L'account non esiste, effettua la registrazione.</h1>
        </div>";

        }
        

    }

?>