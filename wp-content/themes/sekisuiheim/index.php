<?php get_header(); ?>

    <div class="c-mv">
		<h1 class="c-mv__inner">WPテンプレート-新着情報</h1>
	</div>

	 <div class="c-breadcrumb">
		<div class="c-breadcrumb__inner">
			<a class="c-breadcrumb__item" href="<?php echo home_url(); ?>">TOP</a>
        	<span class="c-breadcrumb__item">新着情報</span>
		</div>
    </div>

	<div class="c-news">

        <section class="c-news-category">
			<h2 class="e-h2">カテゴリー一覧</h2>
			<div class="c-news-category__list">
				<a class="c-news-category__link __current" href="<?php echo home_url(); ?>/news/">すべて</a>
			
				<?php
				$categories = get_categories( array(
					'orderby'    => 'name',
					'order'      => 'ASC',
					'hide_empty' => true,
				));
				
				/* categoryループ */
				foreach ( $categories as $category ) :
				$current_class = ( is_category( $category->term_id ) ) ? ' __current' : '';
				$slug_class = ' c-news-category__link--' . esc_attr( $category->slug );
				?>

    			<a class="c-news-category__link<?php echo $current_class . $slug_class; ?>" href="<?php echo get_category_link( $category->term_id ); ?>">
        			<?php echo esc_html( $category->name ); ?>
    			</a>
				<?php endforeach; ?>
			</div>
		</section>

		<div class="c-news-list">

			<?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4, //ページ毎の表示件数変更
                'paged' => $paged
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
            ?>

			<div class="c-news-list__item">
				<a class="c-news-list__link" href="<?php the_permalink(); ?>">
					<div class="c-news-list__img">
						<?php if ( has_post_thumbnail() ) : ?>
							<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="__img" loading="lazy">
						<?php else : ?>
							<!--アイキャッチ画像が無い場合は下記画像を表示-->
							<img src="<?php echo get_template_directory_uri(); ?>/common/img/common/pic_dummy.png" alt="" class="__img">
						<?php endif; ?>
					</div>

					<?php
					$category = get_the_category();
					$cat_name = $category[0]->name;
					$cat_slug = $category[0]->slug;
					?>
					<div class="c-news-list__info">
						<div class="c-news-list__day">
							<time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time>
						</div>
						
						<div class="c-news-list__category c-news-list__category--<?php echo esc_attr( $cat_slug ); ?>"><?php echo esc_html( $cat_name ); ?></div>
					</div>

					<p class="c-news-list__ttl"><?php the_title(); ?></p>

				</a>
			</div>
			<?php endwhile; ?>
        	<?php wp_reset_postdata(); ?>
        	<?php endif; ?>
        </div>

		<div class="c-news-pager">
			<div class="c-news-pager__inner">
				<?php
				/* 前へリンクの表示は「'< 前へ'」を変更 */
				$prev_link = get_previous_posts_link('< 前へ');
				if ($prev_link) {
					echo str_replace('<a', '<a class="c-news-pager__prev"', $prev_link);
				}
				?>
				<?php
				$big = 999999999;
				$pages = paginate_links([
					'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'format'    => '?paged=%#%',
					'current'   => max(1, get_query_var('paged'), get_query_var('page')),
					'total'     => $the_query->max_num_pages,
					'type'      => 'array',
					'prev_next' => false,
					'end_size'  => 1,
					'mid_size'  => 1,
				]);
				if ($pages): ?>
				
				<div class="c-news-pager-number">
					<?php
					foreach ($pages as $page_html):
					if (strpos($page_html, 'dots') !== false) {
						$page_html = str_replace('page-numbers dots', 'c-news-pager-number__dots', $page_html);
					} else {
						$page_html = preg_replace(
							'/class=("|\')page-numbers\s+current\1/',
							'class="c-news-pager-number__item __current"',
							$page_html
						);
						$page_html = preg_replace(
							'/class=("|\')page-numbers\1/',
							'class="c-news-pager-number__item"',
							$page_html
						);
					}
					echo $page_html;
					endforeach;
					?>
				</div>
				<?php endif; ?>
				<?php
				/* 次へリンクの表示は「'次へ >'」を変更 */
				$next_link = get_next_posts_link('次へ >', $the_query->max_num_pages);
				if ($next_link) {
					echo str_replace('<a', '<a class="c-news-pager__next"', $next_link);
				}
				?>
			</div>
    	</div>

    </div>

<?php get_footer(); ?>