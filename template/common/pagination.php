<?php
$pagination = get_the_posts_pagination( array(
	'prev_next'          => false,
	'current'            => max( 1, get_query_var( 'paged' ) ),  //当前页码
	'type'               => 'list'
) );
/*去除多余的元素*/
$pagination=preg_replace( '/^[\s\S]*?(\<ul[\s\S]*\>[\s\S]*\<\/ul\>)[\s\S]*?$/', "$1", $pagination );
?>
<div class="pagination">
	<?=$pagination;?>
</div>

