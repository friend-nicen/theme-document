<ul class="menu">
    <li class="readMode menu-item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/baitian.svg" title="切换夜间模式"/>
    </li>
    <li class="menu-item">
        <a href="/" title="回到首页"><span>首页</span></a>
    </li>
    <li class="menu-item">
        <span>文章分类</span>
        <i class="iconfont icon-you-copy-copy-copy"></i>
		<?php
		/*
		 * 判断菜单是否已经被分配，分配则显示菜单
		 * */
		if ( has_nav_menu( 'top-leval' ) ) {
			wp_nav_menu( [
				'theme_location' => 'top-leval',
				'menu_class'     => 'sub-menu',
				'container'      => 'ul',
				'walker'         => ( new NewWalker() )
			] );
		}
		?>
    </li>
    <li class="menu-item">
        <span>文章归档</span>
		<i class="iconfont icon-you-copy-copy-copy"></i>
	    <?php
	    /*
		 * 判断菜单是否已经被分配，分配则显示菜单
		 * */
	    if ( has_nav_menu( 'top-leval' ) ) {
		    wp_nav_menu( [
			    'theme_location' => 'top-leval',
			    'menu_class'     => 'sub-menu',
			    'container'      => 'ul',
			    'walker'         => ( new NewWalker() )
		    ] );
	    }
	    ?>
    </li>
    <li class="menu-item">
        <a href="/pages" title="文章聚合" target="_blank"><span>文章聚合</span></a>
    </li>
    <li class="menu-item">
        <span>碎片笔记</span>
    </li>
    <li class="menu-item">
        <span>留言板</span>
    </li>
</ul>