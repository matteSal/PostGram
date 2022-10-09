<?php

    session_start();

    include '../backend/Utente.php';
    include '../backend/Post.php';

    $utente = new Utente();
    $utente->creaTabella();

    $post = new Post();
    $post->creaTabella();

    $informazioniUtente = $utente->getInformazioni($_SESSION['sessioneemail']);
    $array = $post->getPost();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Arimo&family=Lora&family=Patua+One&family=Secular+One&family=Tapestry&display=swap" rel="stylesheet">
    <title></title>
</head>
<body>
    <div>
        <h1 class="stilelettere">Aggiungi post</h1>
        <form action="" method="POST">
            <h1 class="aggiungiTitolo">Aggiungi un titolo al tuo post:</h1>
            <input class="titolo" type="text" name="titolo">
            <h1 class="aggiungiDescrizione">Aggiungi una descrizione al tuo post:</h1>
            <input class ="descrizione" type="text" name="descrizione">
            <input class="bottone" type="submit" name="bottone" value="Crea">
        </form>
    </div>
    <div class="contenitorePosts">
        <?php

            foreach($array as $onearray) {

                echo "<div class='primoPost'>
                    <h1>".$utente->getNomeECognome($onearray['idUtente'])."</h1>
                    <h1>".$onearray['titolo']."</h1>
                    <h1>".$onearray['descrizione']."</h1>
                </div>";

            }

        ?>
    </div>
</body>
</html>

<?php

    if(isset($_POST['bottone'])){
        
        $post->inserisciPost($informazioniUtente['id'], $_POST['titolo'], $_POST['descrizione']);

        header("Location: postpage.php");

    }

?>