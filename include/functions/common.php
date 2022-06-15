<?php
/*文章浏览次数+1*/
function setPostViews( $postID ) {
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
function getPostViews( $postID ) {
	$count_key = 'post_views_count';
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
function setPostNice( $postID ) {
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
 * 获取作者点赞次数
 */
function getAuthorNice( $author ) {
	$count_key = 'author_nice_count';
	$key       = $author . '-author';
	$count     = get_post_meta( $key, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $key, $count_key );
		add_post_meta( $key, $count_key, '0' );

		return 0;
	}

	return $count;
}


/**
 * 作者点赞次数+1
 */
function setAuthorNice( $author ) {
	$count_key = 'author_nice_count';
	$key       = $author . '-author';
	$count     = get_post_meta( $key, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $key, $count_key );
		add_post_meta( $key, $count_key, '1' );
	} else {
		$count ++;
		update_post_meta( $key, $count_key, $count );
	}
}


/**
 * 获取文章点赞次数
 */
function getPostNice( $postID ) {
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
function setPostBad( $postID ) {
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
function getPostBad( $postID ) {
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
function navigator( $content ) {


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


}


/*
 * 处理文章摘要
 * */
function getExcerpt( $content,$password) {
    
    if($password){
        echo "这是一篇受保护的文章，输入密码后才能查看哈";
        return;
    }

	$content = strip_tags( $content );//去除html
	$content = preg_replace( "/\[[\s\S]*?\]/", "", $content ); //去除短标签
	echo $content;
}


/*
 * 删除目录下的文件
 * */

function removeFiles( $dir ) {

	/*判断目录是否存在*/
	if ( ! file_exists( $dir ) ) {
		return false;
	}

	/*打开目录*/
	if ( $handle = opendir( "$dir" ) ) {

		/*遍历目录内的文件和目录*/
		while ( false !== ( $item = readdir( $handle ) ) ) {

			/*排除当前目录和上级目录链接*/
			if ( $item != "." && $item != ".." ) {

				/*如果是目录，递归删除目录*/
				if ( ! is_dir( "$dir/$item" ) ) {
					/*文件直接删除*/
					if ( is_writable( "$dir/$item" ) ) {
						unlink( "$dir/$item" );
					} else {
						return false;
					}

				}

			}

		}

		/*释放资源句柄*/
		closedir( $handle );

		/*目录内部被清空，删除当前目录*/
		if ( is_writable( $dir ) ) {
			return true;
		} else {
			return false;
		}

	}

}