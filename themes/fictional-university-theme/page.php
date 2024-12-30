<?php 

    get_header();
    
    while(have_posts()) {
        the_post(); 
        pageBanner();
        ?>

            <div class="container container--narrow page-section">
                <?php 
                    // 부모 페이지가 없는 경우 0으로 평가됨
                    $theParent = wp_get_post_parent_id(get_the_ID());
                    if ($theParent) { ?>
                        <div class="metabox metabox--position-up metabox--with-home-link">
                            <p>
                            <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent) ?>">
                                <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent) // ID에 해당하는 게시글의 제목을 가져온다. ?>
                            </a> 
                            <span class="metabox__main">
                                <?php the_title() // 현재 게시글의 제목을 가져옴 ?></span>
                            </p>
                        </div>
                    <?php }

                $testArray = get_pages(array(
                    'child_of' => get_the_ID(),
                ));

                // 부모 페이지가 있거나 자식 페이지가 있는 경우 
                if ($theParent or $testArray) {
                ?>
                    <div class="page-links">
                        <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent) ?>"><?php echo get_the_title($theParent) ?></a></h2>
                        <ul class="min-list">
                            <?php 
                                // 부모 페이지가 있다면, 즉 자식 페이지라면 부모 페이지의 자식들을 리스트에 표시하고
                                if ($theParent) {
                                    $findChildrenOf = $theParent;
                                // 부모 페이지라면 해당 페이지 즉 부모 페이지의 자식들을 리스트에 표시한다.
                                } else {
                                    $findChildrenOf = get_the_ID();
                                }
                                wp_list_pages(array(
                                    'title_li' => NULL, // 'Page' 라는 제목을 비표시하고 Page에 해당하는 자식을 가져온다.
                                    'child_of' => $findChildrenOf,
                                    'sort_culumn' => 'menu_order' // 관리화면의 편집 시에 적용하는 order
                                ));
                            ?>
                        </ul>
                    </div>

                <?php } ?>

                <div class="generic-content">
                    <?php the_content();

                    $skyColorValue = sanitize_text_field(get_query_var('skyColor'));
                    $GrassColorValue = sanitize_text_field(get_query_var('grassColor'));

                        if ($skyColorValue == 'blue' AND $GrassColorValue == 'green') {
                            echo '<p>The sky is blue today and grass is green. Life is good.</p>';
                        }
                        
                    ?>
                    <form method="GET">
                        <input name="skyColor" placeholder="Sky color">
                        <input name="grassColor" placeholder="Grass color">
                        <button>Submit</button>
                    </form>
                </div>
            </div>  
    <?php }

    get_footer()
?>