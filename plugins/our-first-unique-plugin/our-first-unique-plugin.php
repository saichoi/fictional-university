<?php

/* 
    Plugin Name: Our Test Plugin
    Description: A truly amazing Plugin.
    Version: 1.0
    Author: Choi
    Author URI: http://www.saichoiblog.com/
*/

add_filter('the_content','addToEndOfPost');

function addToEndOfPost($content) {
    if (is_single() && is_main_query()) {
        return $content . '<p>My name is Choi.<p>';
    }

    return $content;
}