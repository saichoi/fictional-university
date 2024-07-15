<?php 

function university_files () {
    wp_enqueue_style("university_main_styles", get_stylesheet_uri()); // get_stylesheet_uri() : wordpress에서 style.css를 불러온다.
}

add_action("wp_enqueue_scripts", "university_files"); // wordrpess hook, function name