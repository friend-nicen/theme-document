<?php

/*
 * 文章顶部面包屑
 * @author 友人a丶
 * @date 2022-07-08
 * */

$category = get_the_category()[0]->cat_name;//目录名
$tags = get_the_tags()[0]->name;//目录名

$link = get_category_link(get_the_category()[0]->term_id);//目录地址
$linkTag = get_term_link(get_the_tags()[0]->term_id);//目录地址

?>
<div class="breadcrumb">
    现在位置: <a href="/" title="首页">首页</a> &gt; <a href="<?= $link ?>" title=" <?= $category; ?>"> <?= $category; ?></a>
    &gt; <a href="<?= $linkTag ?>" title=" <?= $tags; ?>"> <?= $tags; ?></a> &gt; 正文
</div>
