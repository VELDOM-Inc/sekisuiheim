<?php get_header(); ?>

    <div class="c-mv">
		<h1 class="c_ttl" data-en="CONTACT">お問い合わせ</h1>
	</div>

	<section class="c-contact-complete">

		<div class="c-contact-form">

			<div class="c-contact-form__flow">
				<div class="c-contact-form__flow--list __current">入力</div>
				<div class="c-contact-form__flow--list __current">確認</div>
				<div class="c-contact-form__flow--list __current">完了</div>
			</div>

		</div>

		<p class="c-contact-complete__ttl">送信完了しました</p>
		<p class="c-contact-complete__txt">お問い合わせいただき<br class="u-sm-max">ありがとうございます。<br>3営業日以内に担当者より<br class="u-sm-max">ご連絡させていただきます。</p>
		<a href="<?php echo home_url(); ?>" class="c-contact-complete__btn">TOPへ戻る</a>

    </section>

<?php get_footer(); ?>