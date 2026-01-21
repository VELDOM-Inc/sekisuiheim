<?php get_header(); ?>

    <div class="c-mv">
		<h1 class="c_ttl" data-en="CONTACT">お問い合わせ</h1>
	</div>

	<div class="c-contact">

		<section class="c-contact-tel">
			<h2 class="c_ttl">お電話での<br class="u-sm-min">お問い合わせ</h2>
			<a class="freecall_btn" href="tel:0120-380-816">
				<span class="__ttl"></span>
				<span class="__sub">0120-380-816</span>
			</a>
		</section>

		<div class="c-contact-form">

			<section class="c-contact-form__main">
				<h2 class="c_ttl">下記のお問い合わせフォームよりお気軽にご相談ください。</h2>
				<p class="c-contact-form__main--txt">当ページでのお問い合わせについては、後日担当者からご返信させていただいております。</p>
				<p class="c-contact-form__main--quote"><span class="__sub">※</span>は必須項目です。</p>
				<a class="contact_btn" href="http://localhost/sekisuiheim/contact/">セキスイハイム・<br class="u-sm-max">ツーユーホームに<br>お住まいのお客様はコチラ</a>
			</section>

			<div class="c-contact-form__flow">
				<div class="c-contact-form__flow--list __current">入力</div>
				<div class="c-contact-form__flow--list">確認</div>
				<div class="c-contact-form__flow--list">完了</div>
			</div>

			<?php echo do_shortcode('[contact-form-7 id="2b34a53" title="お問い合わせ"]'); ?>
		</div>

    </div>

<?php get_footer(); ?>