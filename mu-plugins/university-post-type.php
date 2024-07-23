<?php
// mu-plugins : 테마에 기본적으로 사용해야하는 기능(Custom Post Type)을 플러그인으로 등록할 수 있다.

// Event Post Type
function university_post_types () {
    register_post_type('event', array(
        'public' => true,
        'show_in_reset'=> true, // REST API에서 접근 가능하게 설정(최신 편집기 사용할 수 있음)
        'labels'=> array(
            'name'=> 'Events',
            'add_new' => 'Add New Event',
            'edit_item'=> 'Edit Evnet',
            'all_items'=> 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar'
    ));
}

add_action("init","university_post_types");