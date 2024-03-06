<section id="cd-placeholder-3" class="cd-section cd-container">
				<div class="contact_form_bottom wrap">
                    <div class="text_form">
                        <h1>Contact Form</h1>
                        <h3>Оставляем заявки,</h3>
                        <p> и я в Вашем распоряжении!</p>
                    </div>
				    <div class="contact_form form_info">
				    <form class="adress adress_info" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" name="adress" data-action="my_custom_action">
				        <?php wp_nonce_field( 'my_custom_action_nonce', 'my_custom_action_nonce' ); ?>
				        <input type="text" name="name" placeholder="Name:" />
				        <input type="text" name="email" placeholder="Email:" />
				        <input type="text" name="country" placeholder="Country:" />
				        <div class='mes mes_info'>
				            <textarea name="message" cols="40" rows="6" required placeholder="Message:"></textarea>
				        </div>
				        <div class="clears">
				            <button class="submit clear" type="button"><a href="javascript:void(0);">Clear</a></button>
				        </div>
				        <div class="push">
				            <button class="submit send" type="submit"><a href="javascript:void(0);">Submit</a></button>
				        </div>
				    </form>
				</div>
                </div> 
			</section> <!-- #cd-placeholder-3 -->
		</main> <!-- .cd-main-content -->

		<section id="cd-placeholder-4" class="cd-section">
			<footer>
	            <div class="wrap_foot">
	                <ul class="menu_foot">
					    <li><a href="#" class="smooth-scroll">Главная</a></li>
					    <li><a href="#cd-placeholder-1" class="smooth-scroll">Обо мне</a></li>
					    <li><a href="#cd-placeholder-2" class="smooth-scroll">Работы</a></li>
					    <li><a href="#">Блог</a></li>
					    <li><a href="#cd-placeholder-3" class="smooth-scroll">Контакты</a></li>
					</ul>
					<div class="mail">
					    <a href="#" id="openModal">kirushinsv@yahoo.com</a>
					</div>
					<div class="overlay" id="overlay"></div>
					<div id="myModal" class="modal">
					    <div class="modal-content">
					        <span class="close">&times;</span>
					        <h2>Форма заказа</h2>
					        <form id="orderForm">
					            <label for="name">Имя:</label>
					            <input type="text" id="name" name="name" required><br><br>
					            <label for="email">Email:</label>
					            <input type="email" id="email" name="email" required><br><br>
					            <label for="phone">Телефон:</label>
					            <input type="tel" id="phone" name="phone" required><br><br>
					            <label for="description">Описание заказа (до 500 символов):</label><br>
					            <textarea id="description" name="description" rows="4" cols="50" maxlength="500" required></textarea><br><br>
					            <input class="form" type="submit" value="Отправить">
					            <input class="form clear1" type="reset" value="Очистить">
					        </form>
					    </div>
					</div>
					<div class="social">
		                <ul>
						    <li><a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						    <li><a href="https://plus.google.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						    <li><a href="https://twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						    <li><a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
	            </div> 
	        </footer>   
		</section> <!-- #cd-placeholder-4 -->
	</div>	
		
	
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->

<!-- Подключение jQuery -->
<script src="http://wordpress:180/wp-includes/js/jquery/jquery.js"></script>

<!-- JavaScript для обработки формы через AJAX -->
<script type="text/javascript">
    jQuery(function($) {
        $('form[name="adress"]').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var formAction = $(this).data('action');

            $.ajax({
                type: 'post',
                url: 'http://wordpress:180/wp-admin/admin-ajax.php',
                data: formData + '&action=' + formAction,
                success: function(response) {
                    console.log(response);
                    // Добавьте здесь код для обработки успешного ответа, например, показ сообщения об успешной отправке
                }
            });
        });
    });
// ---------------------------------------
    jQuery(function($) {
    $('.clear').click(function(e) {
        e.preventDefault();
        $(this).closest('form').find('input[type="text"], textarea').val('');
    });
});
// ---------------------------------------
    jQuery(function($) {
    $('a.smooth-scroll').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        if (target === '#') {
            $('html, body').animate({
                scrollTop: 0
            }, 1000);
        } else {
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 1000);
        }
    });
});
// -----------------------------------------------------------
    document.addEventListener("DOMContentLoaded", function() {
    var openModal = document.getElementById('openModal');
    var closeModal = document.getElementsByClassName('close')[0];
    var modal = document.getElementById('myModal');
    var overlay = document.getElementById('overlay');
    var orderForm = document.getElementById('orderForm');

    openModal.addEventListener('click', function(e) {
        e.preventDefault();
        modal.style.display = 'block';
        overlay.style.display = 'block';
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
        overlay.style.display = 'none';
    });

    orderForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(orderForm);
        fetch('mailto:kirushinsv@yahoo.com', {
            method: 'POST',
            body: formData
        }).then(response => {
            if (response.ok) {
                alert('Заявка отправлена успешно!');
                modal.style.display = 'none';
                overlay.style.display = 'none';
            } else {
                alert('Произошла ошибка при отправке заявки.');
            }
        }).catch(error => {
            alert('Произошла ошибка при отправке заявки.');
        });
    });
});

</script>


<?php wp_footer(); ?>
</body>
</html>