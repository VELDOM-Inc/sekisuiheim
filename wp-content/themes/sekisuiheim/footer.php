			<div class="c-link-bottom">
				<section class="c-link-bottom__inner">
					<h2 class="c-link-bottom__ttl">たくさんの『理想の家』を<br class="u-sm-max">創ってきたセキスイハイムが、<br>ご家族の「こうしたい！」を<br class="u-sm-max">カタチにします</h2>
					<div class="c-link-bottom__list">
						<a href="https://www.sekifu.co.jp/company/group/" class="c-link-bottom__list--btn c-link-bottom__list--renovation" target="__blank">
							<span class="__ttl">セキスイハイムグループ<br>全国のマンションリフォーム</span>
							<span class="__logo"><img src="<?php echo get_template_directory_uri(); ?>/common/img/common/pic_renovationheim.png" alt="リノベーションハイム" class="__img"></span>
						</a>
						<a href="https://www.sekisuiheim-owner.jp/" class="c-link-bottom__list--btn c-link-bottom__list--support" target="__blank">
							<span class="__ttl">セキスイハイム戸建て住宅<br>オーナー様のリフォーム実例</span>
							<span class="__logo"><img src="<?php echo get_template_directory_uri(); ?>/common/img/common/pic_owner-support.png" alt="オーナーサポート" class="__img"></span>
						</a>
					</div>
				</section>
			</div>

			<?php if ( !is_page('contact') ): ?>
			<div class="c-contact-bottom">
				<section class="c-contact-bottom__inner">
					<h2 class="c_ttl" data-en="CONTACT">お問い合わせ</h2>
					<p class="c-contact-bottom__catch">
						<span class="__sub">九州エリアで<br class="u-sm-max">マンションリフォームのご相談受付中</span>
					</p>
					<div class="c-contact-bottom__btn">
						<a class="c-contact-bottom__btn--form" href="<?php echo home_url(); ?>/contact/">
							<span class="__catch">お問い合わせフォーム</span>
							<span class="__logo"><img src="<?php echo get_template_directory_uri(); ?>/common/img/common/logo_txt.svg" alt="ファミエス九州" class="__img"></span>
							<span class="__info">マンションデザインofficeへ</span>
						</a>
						<a class="freecall_btn" href="tel:0120-380-816">
							<span class="__ttl"></span>
							<span class="__sub">0120-380-816</span>
						</a>
					</div>
				</section>
			</div>
			<?php endif; ?>

		</main>

			<!-- .l-footer -->
			<footer class="l-footer">
				<div class="l-footer__inner">
					<div class="l-footer-left">
						<div class="l-footer-left__top">
							<a class="ol_link opacity" href="<?php echo home_url(); ?>">TOP</a>
							<a class="ol_link opacity" href="<?php echo home_url(); ?>/works/">実績紹介</a>
							<a class="ol_link opacity" href="<?php echo home_url(); ?>/contact/">お問い合わせ</a>
						</div>
						<div class="l-footer-left__bottom">
							<a class="link_blank opacity" href="https://www.sekisuiheim-owner.jp/kyushu/company/" target="_blank">会社概要</a>
							<a class="link_blank opacity" href="https://www.sekisui.co.jp/privacy_policy/common/" target="_blank">サイトのご利用について</a>
							<a class="link_blank opacity" href="https://www.sekisui.co.jp/privacy_policy/" target="_blank">個人情報保護方針</a>
							<a class="link_blank opacity" href="https://www.sekisui.co.jp/privacy_policy/common/" target="_blank">利用目的と共同利用について</a>
						</div>
					</div>
					<div class="l-footer-right">
						<div class="l-footer-right__logo"><img src="<?php echo get_template_directory_uri(); ?>/common/img/common/logo-bottom.svg" alt="セキスイファミエス九州株式会社" class="__img"></div>
						<div class="l-footer-right__copyright">
							<small>Copyright &copy; セキスイファミエス九州株式会社 <br class="u-sm-max">All Rights Reserved.</small>
						</div>
					</div>
				</div>
			</footer>
			<!-- /.l-footer -->
	
		</div>
		<!-- /.t-wrap -->

		<?php wp_footer(); ?>
	</body>
</html>