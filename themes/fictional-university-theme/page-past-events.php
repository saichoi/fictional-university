<?php get_header(); 
pageBanner(array(
    'title' => 'Past Events',
    'subtitle' => 'A recap of our past events'
));
?>

<div class="container container--narrow page-section">
    <?php 

    $today = date('Ymd');
    $pastEvents = new WP_Query(array(
        'paged' => get_query_var('paged', 1), // url에서 페이지 정보를 가져온다. (두번째 파라미터는 default 값)
        'post_type'=> 'event',
        'meta_key'=> 'event_date',
        'orderby' => 'meta_value_num', 
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => $today,
                'type' => 'numeric'
            )
        )
    ));
    while ($pastEvents->have_posts() ) :
        $pastEvents->the_post(); 
        get_template_part('template-parts/content-event');
    endwhile; 
    
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages
    )); // 기본 쿼리를 기준으로 움직이고 있으므로 파라미터를 넣어서 호출해야함.
    ?>
</div>

<?php get_footer(); ?>