<?php

/*
 * 文章列表模板
 * @author 友人a丶
 * @date 2022-07-08
 * */



/*如果不存在结果*/
if ( ! have_posts() ) {
	get_template_part( './template/index/empty' );
} else {
	get_header();
	?>
    <main class="main-container index">
	    <?php /*get_template_part( './template/main/sidebar-left' ); */?>

        <div class="main-main">
        <?php get_template_part( './template/index/result' ); ?>
        <!--  文章  -->
        <section class="main-content">

			<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>

                <article class="i-article">
                    <div class="i-article-left">
                        <div class="i-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="i-article-excerpt"><?php getExcerpt( get_the_excerpt(),$post->post_password ); ?></div>
                        <div class="i-article-info">
                            <ul>
								<?php
                                    $author   = get_the_author_meta( 'display_name', $post->post_author );
                                    $category = ( get_the_category() )[0]->cat_name;
                                    $link=get_category_link(( get_the_category() )[0]->term_id);
                                    $url=get_the_author_meta( 'user_url', $post->post_author);
								?>
                                <li class="first" id="author"><i class="iconfont icon-chuangzuozhejieshao"></i><a href="<?=$url ?>" title=" <?= $author; ?>"> <?= $author; ?></a></li>
                                <li><i class="iconfont icon-fenlei"></i><a href="<?=$link ?>" title=" <?= $category; ?>"> <?= $category; ?></a></li>
                                <li id="publish"><i class="iconfont icon-shijian"></i><?= the_time( "Y-m-d" ); ?></li>
                                <li><i class="iconfont icon-icon-test"></i><?= getPostViews( get_the_ID() ); ?>热度</li>
                                <li style="border:none"><i
                                            class="iconfont icon-pinglun"></i><?= get_comments_number(); ?>评论
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="i-article-right">
                        <img src="<?php the_post_thumbnail_url(); ?>">
                    </div>
                </article>
			<?php endwhile;endif; ?>
            <!--分页-->
			<?php get_template_part( './template/common/pagination' ); ?>
            <!--角标-->
			<?php get_template_part( './template/index/fixed' ); ?>
        </section>
            <!--底部信息-->
	        <?php get_template_part( './template/index/footer' ); ?>
        </div>
	    <?php get_template_part( './template/index/sidebar-right' ); ?>
    </main>
	<?php get_footer();
} ?>
