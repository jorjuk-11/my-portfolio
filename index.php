<?php get_header(); ?>

	<main class="cd-main-content">
		<section id="cd-placeholder-1" class="cd-section cd-container">
			<div class="content wrap">
	            <h1>About me</h1>
	            <h3>Привет всем!</h3>
	            <p>
	            	Я увлекаюсь версткой и сайтостроением. Моим любимым занятием является написание валидного, кросбраузерного и красивого кода HTML и CSS с дополнением эффектов при помощи JS, вносящих более оригинальное, изящное и респектабельное отображение веб-ресурса. А многопрофильный подход, постоянное совершенствование и внедрение новейших разработок, в сфере построения современных сайтов, неизменно приносит творческое вдохновение в мою работу. Я увлечен созданием вебсайтов и веб-приложений, которые включают интерактивный дизайн и современные технологии. В основном, я специализируюсь на верстке и установки сайтов на WordPress, но также люблю экспериментировать с новыми технологиями, чтобы улучшить производительность, качество и скорость.
	            </p>
	        </div>
		</section> <!-- #cd-placeholder-1 -->

		<section id="cd-placeholder-2" class="cd-section">
	        <section class="cd-container">
	            <div class="works wrap">
	                <h1>Works</h1>
	                <h3>Все сайты адаптивны</h3>
	                <p>Уменьшайте ширину экрана и убеждайтесь!</p>
	               	<div class="posts">
					    <?php
					    // Используем WP_Query для получения изображений
					    $args = array(
					        'post_type' => 'attachment',
					        'post_status' => 'inherit',
					        'posts_per_page' => -1, // Все изображения
					    );
					    $query = new WP_Query($args);

					    if ($query->have_posts()) :
					        while ($query->have_posts()) :
					            $query->the_post();
					            $image_title = get_the_title();
					            $image_description = get_the_content();
					            $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true); // Получаем alt-текст
					            $image_url = wp_get_attachment_url(get_the_ID()); // Получаем URL изображения
					            $page_link = get_post_meta(get_the_ID(), 'page_link', true); // Получаем ссылку из метаполя "Page Link"

					            ?>
					            <div class="post-image">
					                <h2><a href="<?php echo esc_url($page_link); ?>"><?php echo esc_html($image_title); ?></a></h2>
					                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
					                <p><?php echo esc_html($image_description); ?></p>
					            </div>
					            <?php
					        endwhile;
					        wp_reset_postdata(); // Сбросить данные поста
					    else :
					        echo 'No images found';
					    endif;
					    ?>
					</div>
				</div>
	        </section><!-- cd-container -->
		</section> <!-- #cd-placeholder-2 -->

<?php get_footer(); ?>	

			