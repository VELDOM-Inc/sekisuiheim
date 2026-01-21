<?php get_header(); ?>

    <div class="c-mv">
		<h1 class="c-mv__inner">WPテンプレート-404エラー</h1>
	</div>

    <div class="c-breadcrumb">
		<div class="c-breadcrumb__inner">
			<a class="c-breadcrumb__item" href="<?php echo home_url(); ?>">TOP</a>
        	<span class="c-breadcrumb__item">お探しのページが見つかりません</span>
		</div>
    </div>

    <section class="c-error">
        <p class="c-error__txt">お探しのページは一時的に<br class="u-sm-max">アクセスができない状況にあるか、<br>移動もしくは削除された可能性があります。<br>お手数ではございますが、<br class="u-sm-max">トップにて目的のページをお探しください。</p>
        <a class="c_btn" href="<?php echo home_url(); ?>">TOPへ戻る</a>
    </section>

<?php get_footer(); ?>