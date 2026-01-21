<?php get_header(); ?>

	<div class="c-mv">
		<h1 class="c_ttl" data-en="WORKS">実績紹介</h1>
	</div>

	<div class="c-works-detail">
		<section class="c-works-detail__item">
			<div class="c-works-detail__info">
				<div class="c-works-detail__time"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time></div>

				<!-- termsループ -->
				<?php
					$terms = get_the_terms( get_the_ID(), 'works_category' );
					if ( !empty($terms) && !is_wp_error($terms) ) {
						$term_name = $terms[0]->name;
						$term_slug = $terms[0]->slug;
						echo '<span class="c-works-detail__category c-works-detail__category--' . esc_attr($term_slug) . '">'
						. esc_html($term_name) .
						'</span>';
					}
				?>
					
			</div>
			<h2 class="c_ttl"><?php the_title(); ?></h2>
			<?php $site_url = get_field('catch'); ?>
			<?php if ( !empty($site_url) ) : ?>
				<p class="__catch"><?php the_field('catch'); ?></p>
			<?php endif; ?>
			<div class="c-works-detail__img">
				<?php if ( has_post_thumbnail() ) : ?>
        			<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="__img" loading="lazy">
    			<?php else : ?>
        			<img src="<?php echo get_template_directory_uri(); ?>/common/img/common/pic_dummy.png" alt="no image" class="__img">
    			<?php endif; ?>
			</div>

			<div class="c-works-detail__column">
				<section class="c-works-detail__column--list __plan">
					<h3 class="c_ttl" data-en="PLAN">間取りプラン</h3>
					<div class="c-works-detail__comparison">
						<div class="c-works-detail__comparison--ttl">
							<span class="__sub">BEFORE</span>
							<span class="__sub">AFTER</span>
						</div>
						<div class="c-works-detail__comparison--img">
							<span class="__sub __before"><img src="<?php the_field('before_img'); ?>" alt="<?php the_title(); ?>" class="__img"></span>
							<span class="__sub __after"><img src="<?php the_field('after_img'); ?>" alt="<?php the_title(); ?>" class="__img"></span>
						</div>
					</div>
				</section>
				<section class="c-works-detail__column--list __before">
					<h3 class="c_ttl" data-en="BEFORE">工事前の様子</h3>
					<div class="c-works-detail__before">
						<?php if(have_rows('state')): ?>
                        	<?php while(have_rows('state')): the_row(); ?>
								<div class="c-works-detail__before--img"><img src="<?php the_sub_field('state_img'); ?>" alt="<?php the_title(); ?>" class="__img"></div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</section>
			</div>
			<section class="c-works-detail__point">
				<h3 class="c_ttl" data-en="POINT">おすすめポイント</h3>
				<ul class="c-works-detail__point--ul">
					<?php if(have_rows('point_txt')): ?>
                        <?php while(have_rows('point_txt')): the_row(); ?>
							<li class="c-works-detail__point--li"><?php the_sub_field('point_txt_list'); ?></li>
						<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>
				</ul>
				<div class="c-works-detail__point--img">
					<?php if(have_rows('point_img')): ?>
                        <?php while(have_rows('point_img')): the_row(); ?>
							<div class="c-works-detail__before--imglist"><img src="<?php the_sub_field('point_img_list'); ?>" alt="<?php the_title(); ?>" class="__img"></div>
						<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>
				</div>
			</section>
		</section>

		<a class="c-works-detail__return" href="<?php echo home_url(); ?>/works/">実績一覧に戻る</a>

	</div>

<?php get_footer(); ?>