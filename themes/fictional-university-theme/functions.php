<?php 

// 사이트 스타일 및 js 설정
function university_files () {
    wp_enqueue_script("main-university-js", get_theme_file_uri("/build/index.js"), array("jquery"), "1.0", true);
    wp_enqueue_style("custom-google-fonts", '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i'); // fonts
    wp_enqueue_style("font-awesome", '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); // icon
    wp_enqueue_style("university_main_styles", get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style("university_extra_styles", get_theme_file_uri('/build/index.css'));
}

add_action("wp_enqueue_scripts", "university_files");


function university_features () {
    // wordpress에서 nav 메뉴 관리하는 방법
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    // register_nav_menu('footerLocationOne', 'Footer Location One'); 
    // register_nav_menu('footerLocationTwo', 'Footer Location Two'); 
    
    // 사이트 타이틀 설정
    add_theme_support("title-tag"); 
}

add_action("after_setup_theme", "university_features");