<?php

/*
 * 文章列表模板
 * @author 友人a丶
 * @date 2022-07-08
 * */

/*
 * 如果是单独获取分页
 * */
nicen_theme_dynamicEcho(); //动态栏目，动态分页输出

/*如果不存在结果*/
if ( ! have_posts() && is_search() ) {
	get_template_part( './template/index/empty' );
} else {
	get_header();

	?>
    <main class="main-container index <?php echo nicen_theme_showSidebar(); ?>">
        <div class="main-main">
			<?php
			/*
			 * 首页显示小工具
			 * */
			if ( is_home() ) {
				dynamic_sidebar( 'index' );
			}
			?>
			<?php get_template_part( './template/index/result' ); ?>
            <!--  文章  -->
            <section class="main-content <?php /*根据不同分页输出不同样式*/
            echo nicen_theme_getPagiantionType() == 2 ? "nopage" : "";
            echo nicen_theme_config( 'document_dynamic', false ) && is_home() == 1 ? "hasDynamic" : "";
            ?>">
                <!--动态加载文章-->
	            <?php get_template_part( './template/index/dynamic' ); ?>
                <!--文章列表-->
				<?php get_template_part( './template/index/article-list' ); ?>
            </section>
        </div>
		<?php get_template_part( './template/index/sidebar-right' ); ?>
    </main>
    <!--角标-->
	<?php get_template_part( './template/index/fixed' ); ?>
    <!--底部信息-->
	<?php get_footer();
} ?>
