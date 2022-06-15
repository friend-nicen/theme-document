<?php
/*
 * 处理所有前端请求
 * */


/*
 * 点赞
 * */

if(isset($_GET['nice'])){
	if(is_numeric($_GET['nice'])){
		setPostNice($_GET['nice']);

		/*
		 * 增加作者点赞次数
		 * */

		$query = new WP_Query( array( 'p' => $_GET['nice'] ) );
		$auhor=$query->post->post_author; //作者id

		setAuthorNice($auhor);//作者获赞总数+1


		exit(json_encode([
			'code'=>1,
			'errMsg'=>"点赞成功！"
		]));
	}
}

/*
 * 踩
 * */

if(isset($_GET['bad'])){
	if(is_numeric($_GET['bad'])){
		setPostBad($_GET['bad']);
		exit(json_encode([
			'code'=>1,
			'errMsg'=>"踩成功！"
		]));
	}
}