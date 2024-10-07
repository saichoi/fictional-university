<?php
// mu-plugins : 테마에 기본적으로 사용해야하는 기능(Custom Post Type)을 플러그인으로 등록할 수 있다.
// Custom Post Type 신규 등록 시에 관리화면에서 setting > permalink를 업데이트해야 worpdress가 인식할 수 있다.

function university_post_types () {
    // Event Post Type
    register_post_type('event', array(
        'capability_type' => 'event',
        'map_meta_cap' => true, // 정상적인 로직을 타도록 만든다.
        'supports'=> array('title', 'editor', 'excerpt'),
        'rewrite' => array(
            'slug' => 'events',
        ),
        'has_archive' => true, // Custom Post Type의 archive 페이지를 사용함. (permalink 업데이트 해야함)
        'public' => true,
        'show_in_rest' => true, // REST API에서 접근 가능하게 설정(최신 편집기 사용할 수 있음)
        'labels'=> array(
            'name'=> 'Events',
            'add_new' => 'Add New Event',
            'edit_item'=> 'Edit Event',
            'all_items'=> 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar'
    ));

    // Program Post Type
    register_post_type('program', array(
        'supports'=> array('title'),
        'rewrite' => array(
            'slug' => 'programs',
        ),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels'=> array(
            'name'=> 'Programs',
            'add_new' => 'Add New Program',
            'edit_item'=> 'Edit Program',
            'all_items'=> 'All Programs',
            'singular_name' => 'Program'
        ),
        'menu_icon' => 'dashicons-awards'
    ));

    // Professor Post Type
    register_post_type('professor', array(
        'supports'=> array('title', 'editor', 'thumbnail'),
        'public' => true,
        'show_in_rest' => true,
        'labels'=> array(
            'name'=> 'Professors',
            'add_new' => 'Add New Professor',
            'edit_item'=> 'Edit Professor',
            'all_items'=> 'All Professors',
            'singular_name' => 'Professor'
        ),
        'menu_icon' => 'dashicons-welcome-learn-more'
    ));

     // Campus Post Type
     register_post_type('campus', array(
        'capability_type' => 'campus',
        'map_meta_cap' => true,
        'supports'=> array('title', 'editor', 'excerpt'),
        'rewrite' => array(
            'slug' => 'campuses',
        ),
        'has_archive' => true, // Custom Post Type의 archive 페이지를 사용함. (permalink 업데이트 해야함)
        'public' => true,
        'show_in_rest' => true, // REST API에서 접근 가능하게 설정(최신 편집기 사용할 수 있음)
        'labels'=> array(
            'name'=> 'Campuses',
            'add_new' => 'Add New Campus',
            'edit_item'=> 'Edit Campus',
            'all_items'=> 'All Campuses',
            'singular_name' => 'Campues'
        ),
        'menu_icon' => 'dashicons-location-alt'
    ));

    // Note Post Type
    register_post_type('note', array(
        'capability_type' => 'note',
        'map_meta_cap' => true,
        'supports'=> array('title', 'editor'),
        'public' => false,
        'show_ui' => true, // show ui to admin dashboard
        'show_in_rest' => true,
        'labels'=> array(
            'name'=> 'Notes',
            'add_new' => 'Add New Note',
            'edit_item'=> 'Edit Note',
            'all_items'=> 'All Notes',
            'singular_name' => 'Note'
        ),
        'menu_icon' => 'dashicons-welcome-write-blog'
    ));
}

add_action("init","university_post_types");