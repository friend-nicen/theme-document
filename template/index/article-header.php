<?php
    $author   = get_the_author_meta( 'display_name', $post->post_author );
    $category = ( get_the_category() )[0]->cat_name;
?>
<!--  标题  -->
<h1>
	<?= get_the_title(); ?>
</h1>
<!--  文章信息  -->
<div class="article-info">
    <ul>
        <li id="author"><i class="iconfont icon-chuangzuozhejieshao"></i><?= $author; ?></li>
        <li><i class="iconfont icon-fenlei"></i><?= $category; ?></li>
        <li><i class="iconfont icon-shijian"></i><?= the_time( "Y-m-d" ); ?></li>
        <li><i class="iconfont icon-icon-test"></i><?= getPostViews( get_the_ID() ); ?>热度</li>
        <li style="border:none"><i class="iconfont icon-pinglun"></i><?= get_comments_number(); ?>评论</li>
    </ul>
</div>