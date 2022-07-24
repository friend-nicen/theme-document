<?php
/*
 * 显示筛选结果
 * */
?>

<?php

if(is_category() || is_search() || is_tag() || is_archive()){

	$match='';

    if(is_search()){
        $match='关键字：'.get_search_query();
    }else{
        $match=get_the_archive_title();
    }

?>





<div class="non-result">

	<div class="in">
        <span class="belong"><?php echo $match;?></span> 的文章列表
	</div>
	<div class="number">
        <i class="iconfont icon-sousuo"></i>
        共<?php global $wp_query; echo $wp_query -> found_posts; ?>篇文章
	</div>

</div>

<?php } ?>