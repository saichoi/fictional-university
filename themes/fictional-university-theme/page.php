<?php 
    
    while(have_posts()) {
        the_post(); ?>
        <h1>This is Page, not a Post</h1>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?>
        <hr>
    <?php }

?>