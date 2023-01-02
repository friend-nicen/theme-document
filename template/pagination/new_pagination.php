<?php

/*
 * 文章分页
 * @author 友人a丶
 * @date 2022-07-08
 * */


$pagination = get_the_posts_pagination( array(
	'next_text' => "next",
	'current'   => max( 1, get_query_var( 'paged' ) ),  //当前页码
	'type'      => 'list'
) );

/*去除多余的元素*/
$pagination = preg_match( '/<a class=\"next(?:.*?)href=\"(.*?)\"/', $pagination, $match );

?>
<div class="pagination">
    <button class="loadnext" data-next="<?php echo $match[1] ?? ""; ?>"><i
                class="iconfont icon-loading"></i><span><?php echo isset( $match[1] ) ? "点击查看更多" : "没有更多了"; ?></span>
    </button>
</div>

