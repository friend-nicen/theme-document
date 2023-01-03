<?php

/*
 * 作者信息卡片样式
 * @author 友人a丶
 * @date 2022-07-08
 * */

global $wpdb, $table_prefix; //数据库对象，表前缀
$count_posts = wp_count_posts(); //文章数量

$publish = 0; //已发布

/*$catelog = wp_count_terms('category') + wp_count_terms('post_tag');*/ //分类

/*
 * 获取总浏览量
 * */
$sql = 'select sum(`meta_value`+0) As views from `' . $table_prefix . 'postmeta` where `meta_key` = "post_views_count"';
$result = $wpdb->get_results($sql, ARRAY_A);
$views = $result[0]['views']; //总阅读数

$comment = count(get_comments());//评论总数

if ($count_posts) {
    /* 已发布的数量 */
    $publish = $count_posts->publish;
}


?>

<!--作者信息-->
<div class="author">
    <div class="author-beijin">
        <img src="<?php echo $beijin; ?>" title="作者头像"/>
    </div>
    <div class="offset">
        <div class="author-avatar">
            <img src="<?php echo $avatar; ?>" title="作者头像"/>
        </div>
        <div class="author-info">
            <div class="nickname">
                <?php echo $nickname; ?>
            </div>
            <div class="tag">
                <?php echo $profession; ?>
            </div>
        </div>
        <div class="author-self">
            <?php echo $description; ?>
        </div>
        <div class="statistic">

            <div class="item">
                <span class="top">文章数</span>
                <span class="bottom"><?php echo $publish; ?></span>
            </div>
            <div class="item">
                <span class="top">评论数</span>
                <span class="bottom"><?php echo $comment; ?></span>
            </div>
            <div class="item">
                <span class="top">阅读数</span>
                <span class="bottom"><?php echo $views; ?></span>
            </div>

        </div>
    </div>

</div>