<!--  右边相关信息  -->
<?php
/*
 * 判断是否有活动的小工具
 * */
if ( is_active_sidebar( 'sidebar' ) && nicen_theme_showSidebar() != 'no-sidebar') {
	?>
    <div id="fixed">
        <aside class="main-right" id="right">
			<?php dynamic_sidebar( 'sidebar' ); ?>
        </aside>
    </div>
<?php } ?>