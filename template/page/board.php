<?php

/*
 * 留言的模板页面
 * @author 友人a丶
 * @date 2022-07-08
 * */

get_header();//加载顶部内容
?>
<main class="main-container no-sidebar">
    <!--  文章  -->
    <div class="main-main">
        <article class="main-content">
			<?php get_template_part( './template/index/article-header' ); ?>
            <!--  文章内容  -->
            <div class="main-article">
				<?= the_content() ?>
            </div>
			<?php get_template_part( './template/index/fixed' ); ?>
        </article>
		<?php comments_template(); ?>
    </div>
</main>
<?php
get_footer();
?>


