<?php
/*
 * 文章聚合的模板页面
 * @author 友人a丶
 * @date 2022-07-08
 * */


get_header();
query_posts( "nopaging=true&posts_per_page=-1&orderby=modified" );//查询所有文章，安装更新日期
?>
    <main class="main-container index">
        <div class="main-main">
            <!--  文章  -->
            <section class="main-content">
                <ul class="list">
					<?php while ( have_posts() ) {
						the_post();//移动文字指定到此处 ?>
                        <li>
                            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                                <div class="datetime"><?= the_time( "Y-m-d" ); ?></div>
                                <div class="info">
                                    <div class="title">
										<?php the_title() ?>
                                    </div>
                                    <div class="excerpt">
										<?php nicen_theme_getExcerpt( get_the_excerpt(), $post->post_password ); ?>
                                    </div>
                                </div>
                            </a>
                        </li>
					<?php }
					wp_reset_query();  //重置文章指指针 ?>
                </ul>
                <!--角标-->
				<?php get_template_part( './template/index/fixed' ); ?>
            </section>
        </div>
    </main>
<?php
get_footer();