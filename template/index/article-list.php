<!--  文章  -->
<div id="default" class="article-list">
	<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
        <article class="i-article">

            <div class="i-article-left">
                <h2 class="i-article-title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="i-article-excerpt"><?php nicen_theme_getExcerpt( get_the_excerpt(), $post->post_password ); ?></div>
                <div class="i-article-info">
                    <ul>
						<?php
						$author   = get_the_author_meta( 'display_name', $post->post_author );  //获取作者名字
						$category = nicen_theme_getCategory( get_the_ID() ); //获取文章分类
						$link     = @get_category_link( ( get_the_category() )[0]->term_id );
						$url      = get_the_author_meta( 'user_url', $post->post_author );
						?>


						<?php if ( nicen_theme_getThumbnail() ) { ?>
                            <li class="category">
                                <a href="<?= $link ?>" title=" <?= $category; ?>"> <?= $category; ?></a>
                            </li>
						<?php } else { ?>
                            <li>
                                <i class="iconfont icon-fenlei"></i><a href="<?= $link ?>"
                                                                       title=" <?= $category; ?>"> <?= $category; ?></a>
                            </li>
						<?php } ?>

                        <li class="first" id="author"><i class="iconfont icon-chuangzuozhejieshao"></i><a
                                    href="<?= $url ?>" title=" <?= $author; ?>"> <?= $author; ?></a></li>

                        <li>
                            <i class="iconfont icon-shijian"></i><?= nicen_theme_timeToString( get_the_time( "Y-m-d H:i:s" ) ); ?>
                        </li>
                        <li><i class="iconfont icon-icon-test"></i><?= nicen_theme_getPostViews( get_the_ID() ); ?>热度</li>
                        <li style="border:none"><i
                                    class="iconfont icon-pinglun"></i><?= get_comments_number(); ?>评论
                        </li>
                    </ul>
                </div>
            </div>

            <!--获取缩略图-->
			<?php get_template_part( './template/index/thumbnail' ); ?>
        </article>
	<?php endwhile;endif; ?>
    <!--分页-->
	<?php
	if ( nicen_theme_getPagiantionType() ) {
		/*为1显示动态分页*/
		if ( nicen_theme_getPagiantionType() == 1 ) {
			get_template_part( './template/pagination/new_pagination' );
		}
	} else {
		get_template_part( './template/pagination/old_pagination' );
	}
	?>
</div>