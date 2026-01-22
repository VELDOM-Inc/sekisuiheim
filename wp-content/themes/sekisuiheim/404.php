<?php get_header(); ?>

    <div class="c-mv error-mv">
		<h1 class="c_ttl is-fade" data-en="">404 <br class="u-sm-max">NOT FOUND</h1>
	</div>

    <section class="c-error">
        <h2 class="c_ttl">お探しのページが見つかりません</h2>
        <p class="c_txt">お探しのページは一時的に<br class="u-sm-max">アクセスができない状況にあるか、<br>
        移動もしくは削除された可能性があります。<br>
        お手数ではございますが、<br class="u-sm-max">TOPにて目的のページをお探しください。</p>
        <a class="c_btn" href="<?php echo home_url(); ?>">TOPへ戻る</a>
    </section>

<?php get_footer(); ?>