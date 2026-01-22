<?php get_header(); ?>

    <div class="c-mv">
		<h1 class="c_ttl is-fade" data-en="WORKS">実績紹介</h1>
	</div>

	<div class="c-works">

		<p class="__catch is-fade">ゼロからつくる<br>「スケルトンリノベーション」<br class="u-sm-max">の実績を紹介します。</p>
		<div class="c-works-category">
			<div class="c-works-category__list is-fade">	
				<!-- すべて -->
				<a class="c-works-category__link category-all<?php if( is_post_type_archive('works') || is_tax('works_category') ) echo ' __current'; ?>" href="<?php echo get_post_type_archive_link('works'); ?>">すべて</a>
				<?php
    				$terms = get_terms( array(
      					'taxonomy'   => 'works_category',
      					'orderby'    => 'name',
      					'order'      => 'ASC',
      					'hide_empty' => true,
      				));

    				if ( !empty($terms) && !is_wp_error($terms) ):
					foreach ( $terms as $term ) :
					$current_class = ( is_tax('works_category', $term->slug) ) ? ' __current' : '';
				?>	
				<a class="c-works-category__link category-<?php echo esc_attr($term->slug); ?> <?php echo $current_class; ?>" href="<?php echo get_term_link($term); ?>">
					<?php echo esc_html($term->name); ?>
				</a>
				<?php endforeach; endif; ?>

			</div>
		</div>

		<div class="c-works-list">

			<?php
      			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
      			$args = array(
        			'post_type' => 'works',
        			'posts_per_page' => 6,
        			'orderby' => 'date',
        			'paged' => $paged,
      			);
      			$the_query = new WP_Query($args);
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
    		?>

			<div class="c-works-list__item is-fade">
				<a class="c-works-list__link" href="<?php the_permalink(); ?>">
					<div class="c-works-list__img">
						<?php if ( has_post_thumbnail() ) : ?>
							<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="__img" loading="lazy">
						<?php else : ?>
							<img src="<?php echo get_template_directory_uri(); ?>/common/img/common/pic_dummy.png" alt="" class="__img">
						<?php endif; ?>
						<p class="__ttl"><?php the_title(); ?></p>
					</div>

					<div class="c-works-list__info">
						<div class="c-works-list__day"><time datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time></div>
						<div class="c-works-list__category <?php
						$terms = get_the_terms(get_the_ID(), 'works_category');
						if ($terms && !is_wp_error($terms)) {
							$slugs = wp_list_pluck($terms, 'slug');
							echo implode(', ', $slugs);
						}
						?>">
							<?php
							$terms = get_the_terms(get_the_ID(), 'works_category');
							if ($terms && !is_wp_error($terms)) {
								$term_names = wp_list_pluck($terms, 'name');
								echo implode(', ', $term_names);
							}
							?>
						</div>
					</div>
				</a>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
    		<?php else: ?>
				<p class="c-works-list__txt">現在準備中です</p>
    		<?php endif; ?>

		</div>

		<div class="c-works-pager <?php if ($the_query->max_num_pages <= 1) echo 'single-page'; ?>">
			<div class="c-works-pager__inner">
				<?php
					$prev_link = get_previous_posts_link('前のページへ');
					if ($prev_link) {
						echo str_replace('<a', '<a class="c-works-pager__prev"', $prev_link);
					} else {
						echo '<span class="c-works-pager__prev __hidden">前のページへ</span>';
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
				
				<div class="c-works-pager-number">

					<?php
					foreach ($pages as $page_html):
					if (strpos($page_html, 'dots') !== false) {
						$page_html = str_replace('page-numbers dots', 'c-works-pager-number__dots', $page_html);
					} else {
						$page_html = preg_replace(
							'/class=("|\')page-numbers\s+current\1/',
							'class="c-works-pager-number__item __current"',
							$page_html
						);
						$page_html = preg_replace(
							'/class=("|\')page-numbers\1/',
							'class="c-works-pager-number__item"',
							$page_html
						);
					}
					echo $page_html;
					endforeach;
					?>

				</div>
				<?php endif; ?>
				<?php
					$next_link = get_next_posts_link('次のページへ', $the_query->max_num_pages);
					if ($next_link) {
						echo str_replace('<a', '<a class="c-works-pager__next"', $next_link);
					} else {
						echo '<span class="c-works-pager__next __hidden">次のページへ</span>';
					}
				?>
			</div>
    	</div>
	</div>		

	<?php get_footer(); ?>