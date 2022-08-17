<?php

/*
 * 文章列表模板
 * @author 友人a丶
 * @date 2022-07-08
 * */


/*如果不存在结果*/
if (!have_posts() && is_search()) {
    get_template_part('./template/index/empty');
} else {
    get_header();
    ?>
    <main class="main-container index">
        <?php /*get_template_part( './template/main/sidebar-left' ); */ ?>

        <div class="main-main">
            <?php get_template_part('./template/index/result'); ?>
            <!--  文章  -->
            <section class="main-content">
                <!--文章列表-->
                <?php get_template_part('./template/index/article-list'); ?>
                <!--分页-->
                <?php get_template_part('./template/common/pagination'); ?>
                <!--角标-->
                <?php get_template_part('./template/index/fixed'); ?>
            </section>
            <!--底部信息-->
            <?php get_template_part('./template/index/footer'); ?>
        </div>

        <?php
            /*是否显示双栏*/
            if (documents('document_column',true)) {
                get_template_part('./template/index/sidebar-right');
            }
        ?>

    </main>
    <?php get_footer();
} ?>
