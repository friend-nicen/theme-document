<?php
/*
 * 显示筛选结果
 * */

if ( is_category() || is_search() || is_tag() || is_archive() ) {

	$match = '';

	if ( is_search() ) {
		$match = '关键字：' . get_search_query();
	} else {
		$match = get_the_archive_title();
	}

	?>


    <div class="non-result">

        <div class="in">
            <span class="belong"><?php echo $match; ?></span> 的文章列表
        </div>
		<?php
		/*
		 * 是否显示搜索数量
		 * */
		if ( nicen_theme_config( 'document_searchnum', false ) ) {
			?>
            <div class="number">
                <i class="iconfont icon-sousuo"></i>
                共<?php global $wp_query;
				echo $wp_query->found_posts; ?>篇文章
            </div>
		<?php } ?>
    </div>

<?php } ?>