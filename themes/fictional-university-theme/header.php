<!DOCTYPE html>
<!-- wordpress의 설정에 맞는 언어 태그를 가져온다. -->
<html <?php language_attributes() ?>>
<head>
    <!-- wordpress 설정에 맞는 글자, 숫자 유형을 알려준다.  -->
    <meta charset="<?php bloginfo('charset') ?>">
    <!-- PC, SP 등 장치들의 원래 크기를 사용하도록 함. 반응형 css 코드 작성이 필요함. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<!-- 각 페이지마다 body 태그에 특징적인 class를 부여해서 스타일링을 할 수 있다. -->
<body <?php body_class() ?>>
    <header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <!-- <?php 
              wp_nav_menu(array(
                'theme_location' => 'headerMenuLocation'
              ));
             ?> -->
            <ul>
              <li <?php // about-us 페이지 이거나 부모 페이지가 about-us(ID = 13)이라면
                    if (is_page('about-us') or wp_get_post_parent_id(0) == 13) echo 'class="current-menu-item"' 
                  ?>
              >
                <a href="<?php echo site_url('/about-us') ?>">About Us</a>
              </li>
              <li><a href="#">Programs</a></li>
              <li><a href="#">Events</a></li>
              <li><a href="#">Campuses</a></li>
              <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>>
                <a href="><?php echo site_url('/blog') ?>">Blog</a>
              </li>
            </ul>
          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>