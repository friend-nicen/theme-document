<?php

/*
 * 全局公共函数
 * @author 友人a丶
 * @date 2022-07-08
 * */


/*
 * 主题选项
 * */
$desination_configs = [];


/*
 * 输出主题选项
 * @param echo，输出还是返回
 * */
function nicen_theme_config( $index, $echo = true ) {

	global $desination_configs;
	if ( $echo ) {
		echo $desination_configs[ $index ];
	} else {
		return $desination_configs[ $index ];
	}
}


/*
 * 加载主题选项
 * */
function nicen_theme_reload() {

	global $desination_configs;


	/*
	 * 遍历整个配置
	 * */
	foreach ( CONFIG as $key => $value ) {
		$desination_configs[ $key ] = get_option( $key );
	}


}

nicen_theme_reload(); //加载主题选项，获取主题需要的选项数据


/*文章浏览次数+1*/
function nicen_theme_setPostViews( $postID ) {

	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count ++;
		update_post_meta( $postID, $count_key, $count );
	}
}


/**
 * 获取文章浏览次数
 */
function nicen_theme_getPostViews( $postID ) {

	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );

		return 0 + intval( nicen_theme_config( 'document_view_add', false ) );
	}

	return $count + intval( nicen_theme_config( 'document_view_add', false ) );
}


/**
 * 文章点赞次数+1
 */
function nicen_theme_setPostNice( $postID ) {

	$count_key = 'post_nice_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count ++;
		update_post_meta( $postID, $count_key, $count );
	}
}


/**
 * 获取文章点赞次数
 */
function nicen_theme_getPostNice( $postID ) {

	$count_key = 'post_nice_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );

		return 0;
	}

	return $count;
}


/**
 * 文章点赞次数+1
 */
function nicen_theme_setPostBad( $postID ) {

	$count_key = 'post_bad_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count ++;
		update_post_meta( $postID, $count_key, $count );
	}
}


/**
 * 获取文章被踩的次数
 */
function nicen_theme_getPostBad( $postID ) {

	$count_key = 'post_bad_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );

		return 0;
	}

	return $count;
}


/*
 * 根据文章内容生成侧边导航
 * */
function nicen_theme_navigator() {


	if ( is_single() ) {
		$content = get_the_content();

		$h1_number = 1; //h1个数
		$h2_number = 1; //h2个数
		$h3_number = 1; //h3个数

		$h = "/\[h2\][\s\S]*?\[\/h2\]|\[h1\][\s\S]*?\[\/h1\]|\[h3\][\s\S]*?\[\/h3\]/"; //匹配h1标题的正则


		preg_match_all( $h, $content, $match, PREG_OFFSET_CAPTURE );

		$replace = '';


		foreach ( $match[0] as $item ) {


			if ( strpos( $item[0], 'h1' ) !== false ) {
				$temp    = str_replace( [ '[h1]', '[/h1]' ], [ '', '' ], $item[0] );
				$replace .= '<li>
							<div class="first-index">
								<div><a href="#h2' . $h1_number . '" title="' . $temp . '">' . $temp . '</a></div>
							</div>
						</li>';
				$h1_number ++;
			} else if ( strpos( $item[0], 'h2' ) !== false ) {
				$temp    = str_replace( [ '[h2]', '[/h2]' ], [ '', '' ], $item[0] );
				$replace .= '<li>
							<div class="secondary-index">
								<div><a href="#h3' . $h2_number . '" title="' . $temp . '">' . $temp . '</a></div>
							</div>
						</li>';
				$h2_number ++;
			} else if ( strpos( $item[0], 'h3' ) !== false ) {
				$temp    = str_replace( [ '[h3]', '[/h3]' ], [ '', '' ], $item[0] );
				$replace .= '<li>
							<div class="third-index">
								<div><a href="#h4' . $h3_number . '" title="' . $temp . '">' . $temp . '</a></div>
							</div>
						</li>';
				$h3_number ++;
			}

		}

		return $replace;
	} else {
		$replace   = '';
		$h1_number = 1; //h1个数

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				$title = get_the_title();

				$replace .= '<li>
							<div class="first-index">
								<div><a href="#h2' . get_the_ID() . '" title="' . $title . '">' . $h1_number . '. ' . $title . '</a></div>
							</div>
						</li>';

				$h1_number ++;
			}

			wp_reset_query(); //重置文章指指针
		}

		return $replace;
	}

}


/*
 * 处理文章摘要
 * */
function nicen_theme_getExcerpt( $content, $password, $flag = false ) {

	/*
	 * 是否有密码
	 * */
	if ( $password ) {
		echo "这是一篇受保护的文章，输入密码后才能查看哈";

		return;
	}

	$content = strip_tags( $content );//去除html
	$content = preg_replace( "/\[[\s\S]*?\]/", "", $content ); //去除短标签
	if ( $flag ) {
		return $content;
	} else {
		echo $content;
	}

}


/*
 * 获取整站的所有链接
 * */
function nicen_theme_getLinks() {


	$site_url = site_url();
	$links    = []; //存储链接

	$links[] = get_home_url(); //首页

	query_posts( "nopaging=true&posts_per_page=-1" );

	/*
	 * 比遍历文章
	 * */
	while ( have_posts() ) {
		the_post();
		$links[] = get_the_permalink();
	}

	wp_reset_query();//重置文章指指针

	$pages = get_pages();

	/*
	 * 遍历页面
	 * */
	foreach ( $pages as $page ) {
		$links[] = get_page_link( $page->ID );
	}

	/*
	 * 遍历目录
	 * */
	$terms = get_terms( 'category', 'orderby=name&hide_empty=0' );

	if ( count( $terms ) > 0 ) {
		foreach ( $terms as $term ) {
			$links[] = $site_url . '/category/' . $term->slug;
		}
	}

	/*
	 * 遍历标签
	 * */
	$tags = get_terms( "post_tag" );
	if ( count( $tags ) > 0 ) {
		foreach ( $tags as $tag ) {
			$links[] = $site_url . '/tag/' . $tag->slug;
		}
	}

	return $links;

}


/*
 * 获取网站状态码
 * */
function nicen_theme_httpcode( $url ) {
	$ch      = curl_init();
	$timeout = 3;
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_HEADER, 1 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );//禁止 cURL 验证对等证书
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );//是否检测服务器的域名与证书上的是否一致
	curl_setopt( $ch, CURLOPT_NOBODY, true );
	curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_exec( $ch );
	$httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	curl_close( $ch );

	return $httpcode;
}


/*
 * 标题
 * */
function nicen_theme_title() {

	/*
	 * 文章和页面
	 * */
	if ( is_page() || is_single() ) {

		$category = nicen_theme_getCategory( get_the_ID() );

		the_title();
		echo nicen_theme_getCategory( get_the_ID() ) == "暂无分类" ? "" : "－" . $category;
		echo "－";
		bloginfo( 'name' );
		/*
		 * 目录和标签
		 * */
	} elseif ( is_category() || is_tag() ) {
		echo preg_replace( '/.*?： ?/', '', strip_tags( get_the_archive_title() ) );
		echo "－";
		bloginfo( 'name' );
	} else {
		bloginfo( 'name' );
		echo "－";
		nicen_theme_config( 'document_subtitle' );
	}
}


/*
 * 站点关键字
 * */
function nicen_theme_description( $flag = false ) {


	global $post;

	if ( is_single() || is_page() ) {
		/*获取文章摘要*/
		return nicen_theme_getExcerpt( get_the_excerpt(), $post->post_password, $flag );
	} elseif ( is_category() || is_tag() ) {
		if ( $flag ) {
			return preg_replace( '/\n/', '', strip_tags( term_description() ) );
		} else {
			echo preg_replace( '/\n/', '', strip_tags( term_description() ) );
		}
	} else {
		if ( $flag ) {
			return nicen_theme_config( 'document_description', false );
		} else {
			nicen_theme_config( 'document_description' );
		}

	}
}


/*
 * 获取分类
 * */
function nicen_theme_getCategory( $id ) {

	$cat = get_the_category( $id );
	if ( $cat ) {
		return $cat[0]->name;
	} else {
		return "暂无分类";
	}
}


/*
 * 获取分类
 * */
function nicen_theme_getTerm( $id ) {

	$cat = get_term( $id );
	if ( $cat instanceof WP_Term ) {
		return [
			'name' => $cat->name,
			'link' => get_term_link( $cat )
		];
	} else {
		return false;
	}
}

/*
 * 创建指定数量的同名元素数组
 * */
function nicen_theme_create_array( $value, $number ) {

	$array = []; //原数组
	for ( $i = 0; $i < $number; $i ++ ) {
		$array[] = $value;
	}

	return $array;
}


/*
 * nicen_theme_timeToString
 * 按照分、时、天输出发布时间
 * */
function nicen_theme_timeToString( $time ) {


	$timestamp = strtotime( $time );

	$day = floor( ( time() - $timestamp ) / 3600 / 24 );

	if ( $day < 1 ) {
		$hour = floor( ( time() - $timestamp ) / 3600 );
		if ( $hour < 1 ) {
			$minute = floor( ( time() - $timestamp ) / 60 );

			return $minute . '分钟前';
		} else {
			return $hour . '小时前';
		}
	}

	if ( $day > nicen_theme_config( 'document_publish_show', false ) ) {
		return date( "Y-m-d", $timestamp );
	} else {
		return $day . '天前';
	}

}


/*
 * 判断页面是否会显示侧边栏
 * 针对防止flex闪烁进行处理
 * */
function nicen_theme_showSidebar() {


	/*
	 * 如果没有激活的小部件
	 * */
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		return 'no-sidebar';
	}

	/*
	 * 文章页
	 * */
	if ( is_single() ) {

		/*
		 * 如果显示目录
		 * */
		if ( nicen_theme_config( 'document_single_show_catalog', false ) ) {
			return 'no-left';
		}

		/*
		 * 如果不显示
		 * */
		if ( ! nicen_theme_config( 'document_single_show_sidebar', false ) ) {
			return 'no-sidebar';
		}

	}

	/*
	 * 页面
	 * */
	if ( is_page() ) {

		/*
		 * 如果不显示
		 * */
		if ( ! nicen_theme_config( 'document_page_show_sidebar', false ) ) {
			return 'no-sidebar';
		}

	}

	/*
	 * 首页
	 * */
	if ( is_home() ) {

		/*
		 * 如果不显示
		 * */
		if ( ! nicen_theme_config( 'document_show_sidebar', false ) ) {
			return 'no-sidebar';
		}

	}

	/*
	 * 分类、标签、作者等栏目
	 * */
	if ( is_category() || is_search() || is_author() || is_tag() ) {
		if ( ! nicen_theme_config( 'document_else_show_sidebar', false ) ) {
			return 'no-sidebar';
		}
	}


	return ""; //代表有侧边栏
}


/*
 * 显示文章详情
 * */
function nicen_theme_showInfo() {


	/*
	 * 页面
	 * */
	if ( is_page() && ! nicen_theme_config( 'document_page_show_info', false ) ) {
		return false;
	}

	/*
	 * 文章
	 * */
	if ( is_single() && ! nicen_theme_config( 'document_single_show_info', false ) ) {
		return false;
	}

	return true;

}


/*
 * 显示目录
 * */
function nicen_theme_showCatelog() {

	if ( is_single() ) {
		return nicen_theme_config( "document_single_show_catalog", false );
	} else {
		return 0;
	}
}


/*
 * 显示面包屑导航
 * */
function nicen_theme_showBread() {


	/*
	 * 页面
	 * */
	if ( is_page() && ! nicen_theme_config( 'document_page_show_bread', false ) ) {
		return false;
	}

	/*
	 * 文章
	 * */
	if ( is_single() && ! nicen_theme_config( 'document_single_show_bread', false ) ) {
		return false;
	}

	return true;

}


/*
 * 显示评论
 * */
function nicen_theme_showComments() {


	if ( is_page( '留言' ) ) {
		return true;
	}

	/*
	 * 页面
	 * */
	if ( is_page() && ! nicen_theme_config( 'document_page_show_comments', false ) ) {
		return false;
	}

	/*
	 * 文章
	 * */
	if ( is_single() && ! nicen_theme_config( 'document_single_show_comments', false ) ) {
		return false;
	}


	return true;

}


/*
 * 获取文章分页类型
 * */
function nicen_theme_getPagiantionType() {

	/*
	 * 如果是动态栏目。同意跟随首页
	 * */
	if ( isset( $_POST['pagination'] ) ) {
		return nicen_theme_config( 'document_pagination', false );
	}

	if ( is_home() ) {
		return nicen_theme_config( 'document_pagination', false );
	} else {
		return nicen_theme_config( 'document_else_pagination', false );
	}
}


/*
 * 动态栏目内容，动态分页判断
 * */
function nicen_theme_dynamicEcho() {

	if ( isset( $_POST['pagination'] ) ) {
		echo "<div>";
		get_template_part( './template/index/article-list' );
		echo "</div>";
		exit();
	}
}


/*
 * 获取当前所在栏目
 * */
function nicen_theme_getCat() {

	if ( is_category() ) {
		$cats = get_query_var( 'cat' );
		$cat  = get_category( $cats );

		return $cat->name;
	} else {
		return '';
	}
}

/*
 * 获取当前所在栏目
 * */
function nicen_theme_getCatLink() {

	if ( is_category() ) {
		$cats = get_query_var( 'cat' );
		$cat  = get_category( $cats );

		return get_term_link( $cat );
	} else {
		return '';
	}
}

/*
 * og协议
 * */
function nicen_theme_og() {

	global $post;
	/*
	 * 首页
	 * */
	if ( is_home() ) {

		return sprintf( '<meta property="og:type" content="webpage" />
<meta property="og:url" content="%s" />
<meta property="og:site_name" content="%s" />
<meta property="og:nicen_theme_title" content="%s" />
<meta property="og:nicen_theme_description" content="%s" />',
			home_url(),
			get_bloginfo( 'name' ),
			get_bloginfo( 'name' ) . '-' . nicen_theme_config( 'document_subtitle', false ),
			nicen_theme_description( true ) );
	} /*
 * 文章或者页面
 * */
	else if ( is_singular() ) {
		return sprintf( '<meta property="og:type" content="article" />
<meta property="og:url" content="%s" />
<meta property="og:site_name" content="%s" />
<meta property="og:nicen_theme_title" content="%s" />
<meta property="og:image" content="%s" />
<meta property="og:nicen_theme_description" content="%s" />',
			get_the_permalink(),
			get_bloginfo( 'name' ),
			get_the_title(),
			nicen_theme_getThumb(),
			nicen_theme_description( true ) );
	} else if ( is_category() || is_tag() ) {

		return sprintf( '<meta property="og:type" content="webpage" />
<meta property="og:url" content="%s" />
<meta property="og:site_name" content="%s" />
<meta property="og:nicen_theme_title" content="%s" />
<meta property="og:nicen_theme_description" content="%s" />',
			nicen_theme_getCatLink(),
			get_bloginfo( 'name' ),
			nicen_theme_getCat(),
			nicen_theme_description( true ) );
	} else {
		return '';
	}
}


/*
 * 是否显示底部结构化数据
 * */
function nicen_theme_showStructure() {

	if ( is_page() ) {
		return nicen_theme_config( "document_page_show_structrue", false );
	} else if ( is_single() ) {
		return nicen_theme_config( "document_single_show_structrue", false );
	} else {
		return false;
	}
}


/*
 * 获取文章缩略图
 * */
function nicen_theme_getThumb() {


	$default = nicen_theme_config( 'document_thumbnail_default', false );

	if ( strpos( $default, 'http' ) === false ) {
		$default = site_url() . $default;
	}


	$thumb = get_the_post_thumbnail_url();

	/*
	 * 判断是否为空
	 * */
	if ( empty( $thumb ) ) {

		/*
		 * 获取文章第一张图片
		 * */
		$number = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches );

		if ( empty( $number ) ) { // 既没有缩略图，文中也没有图，设置一幅默认的图片
			return $default;
		} else {
			return $matches [1] [0];
		}

	} else {

		/*
		 * 返回站点缩略图
		 * */
		if ( strpos( $thumb, 'http' ) === false ) {
			return site_url() . $thumb;
		} else {
			return $thumb;
		}

	}
}


/*
 * 获取缩略图
 * */
function nicen_theme_getThumbnail() {

	$mode = nicen_theme_config( 'document_thumbnail', false );

	/*如果不显示*/
	if ( ! $mode ) {
		return false;
	} else {
		/*如果有缩略图*/
		if ( has_post_thumbnail() ) {
			return get_the_post_thumbnail_url();
		} else {
			if ( $mode == 1 ) {
				return false;
			} else {
				return nicen_theme_getThumb();
			}
		}

	}

}


/*
 * 首页或栏目是否显示文章导航
 * */
function nicen_theme_showArticleCate() {

	if ( is_home() ) {
		return nicen_theme_config( 'document_show_left_nav', false );
	} else {
		return nicen_theme_config( 'document_show_else_left_nav', false );
	}

}