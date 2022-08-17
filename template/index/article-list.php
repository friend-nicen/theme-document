<?php
/*
  * @author 友人a丶
  * 输出文章列表
  * */
$default = get_template_directory_uri() . "/assets/images/default.png";//默认缩略图

if (have_posts()) : while (have_posts()): the_post();

    /*
     * 判断文章缩略图
     * */
    $thumb = get_the_post_thumbnail_url();

    /*
     * 判断是否为空
     * */
    if ( empty( $thumb ) ) {
        $thumb = $default;
    }

    ?>

    <article class="i-article">
        <div class="i-article-left">
            <h2 class="i-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <div class="i-article-excerpt"><?php getExcerpt(get_the_excerpt(), $post->post_password); ?></div>
            <div class="i-article-info">
                <ul>
                    <?php
                    $author = get_the_author_meta('display_name', $post->post_author);  //获取作者名字
                    $category = getCategory(get_the_ID()); //获取文章分类
                    $link = @get_category_link((get_the_category())[0]->term_id);
                    $url = get_the_author_meta('user_url', $post->post_author);
                    ?>
                    <li class="first" id="author"><i class="iconfont icon-chuangzuozhejieshao"></i><a
                                href="<?= $url ?>" title=" <?= $author; ?>"> <?= $author; ?></a></li>
                    <li><i class="iconfont icon-fenlei"></i><a href="<?= $link ?>"
                                                               title=" <?= $category; ?>"> <?= $category; ?></a>
                    </li>
                    <li id="publish"><i class="iconfont icon-shijian"></i><?= the_time("Y-m-d"); ?></li>
                    <li><i class="iconfont icon-icon-test"></i><?= getPostViews(get_the_ID()); ?>热度</li>
                    <li style="border:none"><i
                                class="iconfont icon-pinglun"></i><?= get_comments_number(); ?>评论
                    </li>
                </ul>
            </div>
        </div>
        <div class="i-article-right">
            <img src="<?=$thumb; ?>" alt="<?php the_title(); ?>" />
        </div>
    </article>
<?php endwhile;endif; ?>