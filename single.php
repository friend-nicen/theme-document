<?php
setPostViews( get_the_ID() );//阅读次数加1
get_header();//加载顶部内容

/*
 * 是否需要输入密码
 * */
if ( post_password_required() ) {
	get_template_part( './template/index/password' );
} else {
	?>
    <main class="main-container">
        <!--  侧边目录  -->
        <?php get_template_part( './template/index/sidebar-left' ); ?>
        <!--  文章  -->
        <div class="main-main">
            <article class="main-content">
                <?php get_template_part( './template/index/article-header' ); ?>
                <!--  文章内容  -->
                <div class="main-article">
                    <?= the_content() ?>
                </div>
                <?php get_template_part( './template/index/fixed' ); ?>
                <?php get_template_part( './template/index/article-footer' ); ?>
            </article>
	        <?php comments_template(); ?>
	        <?php get_template_part( './template/index/footer' ); ?>
        </div>
        <?php get_template_part( './template/index/sidebar-right' ); ?>
    </main>
	<?php
}
get_footer();
?>


