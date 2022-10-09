<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');


    include '../backEnd/Post.php';

    $post = new Post();
    $post->creaTabella();
    print_r(json_encode($post->getPost()));


?>