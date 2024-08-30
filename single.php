<?php


/*
 * 文章页面模板
 * @author 友人a丶
 * @date 2022-07-08
 * */


nicen_theme_setPostViews( get_the_ID() );//阅读次数加1
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
                <!-- 面包屑导航 -->
				<?php get_template_part( './template/index/breadcrumb' ); ?>
                <!-- 文章顶部 -->
				<?php get_template_part( './template/index/article-header' ); ?>
                <!--  文章内容  -->
                <div class="main-article">
					<?php echo the_content(); ?>
                </div>
                <!-- 文章底部 -->
				<?php get_template_part( './template/index/article-footer' ); ?>
            </article>

			<?php
			/* 底部推荐区域 */
			if ( is_active_sidebar( 'content_down' ) ) {
				dynamic_sidebar( 'content_down' );
			}
			?>

            <!-- 文章评论 -->
			<?php comments_template(); ?>
        </div>
		<?php get_template_part( './template/index/sidebar-right' ); ?>
    </main>
    <!--角标-->
	<?php get_template_part( './template/index/fixed' ); ?>
	<?php
}
get_footer();
?>


