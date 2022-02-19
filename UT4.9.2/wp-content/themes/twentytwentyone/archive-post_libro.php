<?php
get_header();
/* 8. Archive */
while (have_posts()) :
    the_post();
    $titulo = get_the_title();
    $numPaginas = get_field("num_paginas");
    $foto = get_field("portada");
    $url = $foto['url'];

    echo "<h1>$titulo</h1>";
    echo "<h4>$numPaginas</h1>";
    echo "<img width='128px' src='$url'>";
endwhile;

get_footer();
