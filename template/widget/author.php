<?php

/*
 * 作者信息卡片样式
 * @author 友人a丶
 * @date 2022-07-08
 * */

global $wpdb, $table_prefix; //数据库对象，表前缀
$count_posts = wp_count_posts();

$publish = 0; //已发布
$catelog = wp_count_terms( 'category' ) + wp_count_terms( 'post_tag' ); //分类

$comment =  count(get_comments());//评论总数

if ( $count_posts ) {
	$publish = $count_posts->publish;
}


?>

<!--作者信息-->
<div class="author">
    <div class="author-beijin">
        <img src="<?= $beijin; ?>" title="作者头像"/>
    </div>
    <div class="offset">
        <div class="author-avatar">
            <img src="<?= $avatar; ?>" title="作者头像"/>
        </div>
        <div class="author-info">
            <div class="nickname">
				<?= $nickname; ?>
            </div>
            <div class="tag">
				<?= $profession; ?>
            </div>
        </div>
        <div class="author-self">
			<?= $description; ?>
        </div>
        <div class="statistic">

            <div class="item">
                <span class="top">文章数</span>
                <span class="bottom"><?= $publish; ?></span>
            </div>
            <div class="item">
                <span class="top">评论数</span>
                <span class="bottom"><?= $comment; ?></span>
            </div>
            <div class="item">
                <span class="top">分类数</span>
                <span class="bottom"><?= $catelog; ?></span>
            </div>

        </div>
    </div>

</div>