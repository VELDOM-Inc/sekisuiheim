<?php get_header(); ?>

	<div class="c-mv">
		<h1 class="c-mv__inner">WPテンプレート-新着情報詳細</h1>
	</div>

	 <div class="c-breadcrumb">
		<div class="c-breadcrumb__inner">
			<a class="c-breadcrumb__item" href="<?php echo home_url(); ?>">TOP</a>
			<a class="c-breadcrumb__item" href="<?php echo home_url(); ?>/news/">新着情報</a>
        	<span class="c-breadcrumb__item"><?php the_title(); ?></span>
		</div>
    </div>

	<div class="c-news-detail">
		<section class="c-news-detail__item">
			<div class="c-news-detail__info">
				<div class="c-news-detail__time"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time></div>
					<!-- categoryループ -->
					<?php
					$categories = get_the_category();
					if ( ! empty( $categories ) ) {
						$cat_name = $categories[0]->name;
						$cat_slug = $categories[0]->slug;
						echo '<span class="c-news-detail__category c-news-detail__category--' . esc_attr( $cat_slug ) . '">'
						. esc_html( $cat_name ) .
						'</span>';
					}
					?>
				</div>
				<h2 class="c_ttl"><?php the_title(); ?></h2>
				<div class="c-news-detail__img">
					<?php if ( has_post_thumbnail() ) : ?>
        				<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="__img" loading="lazy">
    				<?php else : ?>
						<!--アイキャッチ画像が無い場合は下記画像を表示-->
        				<img src="<?php echo get_template_directory_uri(); ?>/common/img/common/pic_dummy.png" alt="no image" class="__img">
    				<?php endif; ?>
				</div>
				<div class="c-news-detail__contents"><?php the_content(); ?></div>
			</section>

			<div class="c-news-detail-pager">

				<!-- 前へリンクの表示は「'< 前の記事'」を変更 -->
				<?php
				$prev = get_previous_post();
				$prev_link = get_previous_post_link('%link', '< 前の記事');
				$prev_class = empty($prev) ? ' __none' : '';
				?>
				<div class="c-works-detail-pager__prev<?php echo $prev_class; ?>">
    				<?php echo $prev_link; ?>
				</div>

				<a class="c-news-detail-pager__return c-button01 _accent" href="<?php echo home_url(); ?>/news/">
        			<div class="e-btn">お知らせ一覧</div>
    			</a>
				
				<!-- 次へリンクの表示は「'次の記事 >'」を変更 -->
				<?php
				$next = get_next_post();
				$next_link = get_next_post_link('%link', '次の記事 >');
				$next_class = empty($next) ? ' __none' : '';
				?>
				<div class="c-works-detail-pager__next<?php echo $next_class; ?>">
    				<?php echo $next_link; ?>
				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>