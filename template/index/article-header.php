<?php

/*
 * 文章顶部模板
 * @author 友人a丶
 * @date 2022-07-08
 * */

$author   = get_the_author_meta( 'display_name', $post->post_author );
$category = ( get_the_category() )[0]->cat_name;
$link=get_category_link(( get_the_category() )[0]->term_id);
$url=get_the_author_meta( 'user_url', $post->post_author);
?>
<!--  标题  -->
<h1>
	<?= get_the_title(); ?>
</h1>
<!--  文章信息  -->
<!--  仅在文章页面展示 -->
<div class="article-info">
    <ul>
        <li id="author"><i class="iconfont icon-chuangzuozhejieshao"></i><a href="<?=$url ?>" title=" <?= $author; ?>"> <?= $author; ?></a></li>
<?php if(!is_page()){ ?><li><i class="iconfont icon-fenlei"></i><a href="<?=$link ?>" title=" <?= $category; ?>"> <?= $category; ?></a></li><?php } ?>
        <li><i class="iconfont icon-shijian"></i><?= the_time( "Y-m-d" ); ?></li>
        <li><i class="iconfont icon-icon-test"></i><?= getPostViews( get_the_ID() ); ?>热度</li>
        <li style="border:none"><i class="iconfont icon-pinglun"></i><?= get_comments_number(); ?>评论</li>
    </ul>
</div>
