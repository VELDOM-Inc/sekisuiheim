<?php get_header(); ?>

    <div class="c-mv">
		<h1 class="c_ttl contact_ttl" data-en="">ファミエス九州<br>マンションデザインOffice<br class="u-sm-max">お問い合わせ</h1>
	</div>

	<section class="c-contact __confirm">

		<p class="c-contact__step2">下記の内容をご確認の上、<br class="u-sm-min">【この内容で送信する】ボタンをクリックしてください</p>

		<div class="c-contact-form">

			<div class="c-contact-form__flow">
				<div class="c-contact-form__flow--list __current">入力</div>
				<div class="c-contact-form__flow--list __current">確認</div>
				<div class="c-contact-form__flow--list">完了</div>
			</div>

			<?php echo do_shortcode('[contact-form-7 id="527e964" title="お問い合わせ-確認画面"]'); ?>
		</div>

    </section>

<?php get_footer(); ?>