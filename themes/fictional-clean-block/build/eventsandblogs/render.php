<div class="full-width-split group">
    <div class="full-width-split__one">
    <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

        <?php 
            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
                'posts_per_page'=> 2, // -1 : 모든 게시글을 가져온다.
                'post_type'=> 'event',
                
                // event를 이벤트 날짜 순서대로 정렬하기
                'meta_key'=> 'event_date',
                'orderby' => 'meta_value_num', 
                'order' => 'ASC',

                // 이미 날짜가 지나간 이벤트는 표시하지 않기
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    )
                )
            ));

            while ($homepageEvents->have_posts()) : $homepageEvents->the_post(); 
                get_template_part('template-parts/content', 'event'); // content-event.php

                // * 중복 코드 처리(Brad)
                // 1. 함수 : 매개 변수가 필요한 경우
                // 2. 템플릿 : 매개 변수가 필요 없는 경우
                
            endwhile; ?>


        <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a></p>
    </div>
    </div>
    <div class="full-width-split__two">
    <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
        <?php 
        $homepagePosts = new WP_Query(array(
            'posts_per_page' => '2',
        ));
        
        while ( $homepagePosts->have_posts() ) : $homepagePosts->the_post(); ?>
            <div class="event-summary">
            <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink() ?>">
                <span class="event-summary__month"><?php the_time('M') ?></span>
                <span class="event-summary__day"><?php the_time('d') ?></span>
            </a>
            <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                <p><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                } else  {
                    echo wp_trim_words(get_the_content(), 18);
                } ?> <a href="<?php the_permalink() ?>" class="nu gray">Read more</a></p>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata() ?>
        <p class="t-center no-margin"><a href="<?php echo site_url('/blog') ?>" class="btn btn--yellow">View All Blog Posts</a></p>
    </div>
    </div>
</div>