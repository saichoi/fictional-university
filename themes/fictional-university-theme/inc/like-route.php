
<?php 

add_action('rest_api_init', 'universityLikeRoutes');

function universityLikeRoutes() {
    register_rest_route('university/v1', 'manageLike', array(
        'methods' => 'POST',
        'callback' => 'createLike',
    ));


    register_rest_route('university/v1', 'manageLike', array(
        'methods' => 'DELETE',
        'callback' => 'deleteLike',
    ));
}

function createLike($data) {
    if (is_user_logged_in()) { // Nonce 코드가 포함되어 있지 않은한 false로 평가된다. => js에서 심어준다.
        $professor = sanitize_text_field($data['professorId']);

        $existQuery = new WP_Query(array(
            // 로그인 하지 않은 경우 0을 반환
            'author' => get_current_user_id(),
            'post_type' => 'like',
            'meta_query' => array(
                array(
                    'key' => 'liked_professor_id',
                    'compare' => '=',
                    'value' => $professor
                )
            )
        ));

        // Like를 클릭한 적이 없는 경우(Like를 각 Professor에 User 1인당 하나씩만 선택할 수 있게 만들기 위함.)
        if ($existQuery->found_posts === 0 AND get_post_type($professor) === 'professor') {
            wp_insert_post(array(
                'post_type' => 'like',
                'post_status' => 'publish',
                'post_title' => 'Our PHT Create Post Test',
                'meta_input' => array(
                    'liked_professor_id' => $professor
                )
            ));
        } else {
            die("Invalid professor id");
        }
    } else {
        die("Only loggend in users can create a like.");
    }
}

function deleteLike() {
    return 'Thanks for tring to delete a like';
}