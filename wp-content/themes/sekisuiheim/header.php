<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta name="keywords" content="">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&family=Zen+Kaku+Gothic+Antique:wght@300;400;500;700;900&family=Zen+Old+Mincho:wght@400;500;600;700;900&display=swap" rel="stylesheet">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/common/img/common/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/common/img/common/apple_touch_icon.png">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<!-- .t-wrap -->
		<div class="t-wrap">

			<!-- .l-header -->
			<header class="l-header">
				<div class="l-header__inner">
					<div class="l-header-logo">
						<a class="l-header-logo__link" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/common/img/common/logo.svg" alt="SEKISUI HEIM" class="__img">
						</a>
					</div>
					<div class="l-gnav">
						<div class="l-gnav__logo">
							<span class="__sub"><img src="<?php echo get_template_directory_uri(); ?>/common/img/common/logo_rect.svg" alt="九州エリアのリフォームなら" class="__img"></span>
							<span class="__sub"><img src="<?php echo get_template_directory_uri(); ?>/common/img/common/logo_famisk.svg" alt="セキスイファミエス九州" class="__img"></span>
						</div>
						<nav class="l-gnav__inner">
							<ul class="l-gnav__list">
								<!--<li class="l-gnav__item">
									<a class="ol_link opacity" href="<?php echo home_url(); ?>">TOP</a>
								</li>-->
								<li class="l-gnav__item works_nav">
									<a class="ol_link opacity" href="<?php echo home_url(); ?>/works/">実例紹介</a>
								</li>
								<li class="l-gnav__item contact_nav">
									<a class="ol_link opacity" href="<?php echo home_url(); ?>/contact/">お問い合わせ</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="l-header-sp">
						<div class="l-header-sp__toggle">
							<span class="__sub"></span>
							<span class="__sub"></span>
							<span class="__sub"></span>
						</div>
						<div class="l-header-sp__menu">
							<!--<a class="l-header-sp__menu--link" href="<?php echo home_url(); ?>">TOP</a>
							<a class="l-header-sp__menu--link" href="<?php echo home_url(); ?>/works/">実例紹介</a>-->
							<a class="contact_btn" href="<?php echo home_url(); ?>/contact/">お問い合わせフォーム</a>
							<a class="freecall_btn" href="tel:0120-380-816">
								<span class="__ttl"></span>
								<span class="__sub">0120-380-816</span>
							</a>
							<a class="contact_btn opacity __works" href="<?php echo home_url(); ?>/works/">実例紹介は<br class="u-lg-min">こちら</a>
							<div class="l-header-sp__submenu">
								<a class="link_blank" href="https://www.sekisuiheim-owner.jp/kyushu/company/" target="_blank">会社概要</a>
								<a class="link_blank" href="https://www.sekisui.co.jp/privacy_policy/common/" target="_blank">サイトのご利用について</a>
								<a class="link_blank" href="https://www.sekisui.co.jp/privacy_policy/" target="_blank">個人情報保護方針</a>
								<a class="link_blank" href="https://www.sekisui.co.jp/privacy_policy/common/" target="_blank">利用目的と共同利用について</a>
							</div>
						</div>
					</div>
				</div>
			</header> 
			<!-- /.l-header -->
			
			<!-- .l-contents -->
			<main class="l-contents<?php if ( is_front_page() ) echo ' c-index'; ?>">
