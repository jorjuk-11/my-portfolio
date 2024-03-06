<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>
	<div class="container">
		<header>
			<div class="logo">
			    <a href="#" id="scrollTopLink">
			        <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
			        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			        if ( has_custom_logo() ) {
			            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
			        } else {
			            echo '<img src="' . esc_url( get_template_directory_uri() ) . '/images/2.png" alt="logo">';
			        } ?>
			    </a>
			</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('scrollTopLink').addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.body;
            const offset = 0;
            const scrollOptions = {
                top: offset,
                behavior: 'smooth'
            };
            target.scrollIntoView(scrollOptions);
        });
    });
</script>


			<div class="cb-slideshow">
                <div class="img"><span>Image 01</span><div><h3>Всем привет!</h3></div></div>
                <div class="img"><span>Image 02</span><div><h3>С Вами сейчас</h3></div></div>
                <div class="img"><span>Image 03</span><div><h3>Сергей Кирюшин!</h3></div></div>
                <div class="img"><span>Image 04</span><div><h3>Верстка,</h3></div></div>
                <div class="img"><span>Image 05</span><div><h3> доработка сайтов,</h3></div></div>
                <div class="img"><span>Image 06</span><div><h3> написание текстов!</h3></div></div>
            </div>
			<section id="cd-intro">
				<div id="cd-intro-tagline">
				</div> <!-- #cd-intro-tagline -->
			</section> <!-- #cd-intro -->

			<div class="cd-secondary-nav">
				<a href="#0" class="cd-secondary-nav-trigger">Menu<span></span></a> <!-- button visible on small devices -->
				<nav>
					<ul>
						<li>
							<a href="#cd-placeholder-1">
								<b>About me</b>
								<span></span><!-- icon -->
							</a>
						</li>
						<li>
							<a href="#cd-placeholder-2">
								<b>Works</b>
								<span></span><!-- icon -->
							</a>
						</li>
						<li>
							<a href="#cd-placeholder-3">
								<b>Contact Form</b>
								<span></span><!-- icon -->
							</a>
						</li>
					</ul>
				</nav>
			</div> <!-- .cd-secondary-nav -->
		</header>	