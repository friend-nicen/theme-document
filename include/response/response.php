<?php
/*
 * 处理所有前端请求
 * */


/*
 * 链接提交
 * */
function nicen_theme_auth() {

	$private = get_option( "document_private" );

	if ( empty( $_GET['private'] ) && empty( $_POST['private'] ) ) {
		exit( json_encode( [
			'code'   => 0,
			'result' => "密钥为空"
		] ) );
	}


	if ( ( $_GET['private'] ?? "" ) != $private && ( $_POST['private'] ?? "" ) != $private ) {
		exit( json_encode( [
			'code'   => 0,
			'result' => "密钥有误"
		] ) );
	}
}


/*
 * 点赞
 * */
if ( isset( $_GET['nice'] ) ) {
	if ( is_numeric( $_GET['nice'] ) ) {
		nicen_theme_setPostNice( $_GET['nice'] );

		exit( json_encode( [
			'code'   => 1,
			'errMsg' => "点赞成功！"
		] ) );
	}
}

/*
 * 踩
 * */
if ( isset( $_GET['bad'] ) ) {
	if ( is_numeric( $_GET['bad'] ) ) {
		nicen_theme_setPostBad( $_GET['bad'] );
		exit( json_encode( [
			'code'   => 1,
			'errMsg' => "踩成功！"
		] ) );
	}
}


/*
 * 百度链接提交
 * */
if ( isset( $_GET['submit'] ) ) {

	nicen_theme_auth(); //权限验证

	$token = get_option( "document_baidu" );

	/*
	 * 检查token
	 * */
	if ( empty( $token ) ) {
		exit( json_encode( [
			'code'   => 0,
			'result' => "token尚未填写，无法进行推送！"
		] ) );
	}

	$site_url = site_url();//获取站点url

	$api     = 'http://data.zz.baidu.com/urls?site=' . $site_url . '&token=' . $token;
	$ch      = curl_init();
	$options = array(
		CURLOPT_URL            => $api,
		CURLOPT_POST           => true,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POSTFIELDS     => implode( "\n", nicen_theme_getLinks() ),
		CURLOPT_HTTPHEADER     => array( 'Content-Type: text/plain' ),
	);

	curl_setopt_array( $ch, $options );
	$result = curl_exec( $ch );

	/*
	 * 输出推送结果
	 * */
	exit( json_encode( [
		'code'   => 0,
		'result' => "$result"
	] ) );
}


/*
* 链接遍历
* */

if ( isset( $_GET['sitemap'] ) ) {

	nicen_theme_auth(); //权限验证

	if ( ! is_writable( $_SERVER['DOCUMENT_ROOT'] ) ) {
		exit( json_encode( [
			'code'   => 0,
			'result' => '根目录不可写，站点地图生成失败！'
		] ) );
	}
	if ( file_put_contents( 'sitemap.txt', implode( "\n", nicen_theme_getLinks() ), LOCK_EX ) ) {
		exit( json_encode( [
			'code'   => 1,
			'result' => '站点地图生成成功！'
		] ) );
	} else {
		exit( json_encode( [
			'code'   => 0,
			'result' => '站点地图生成失败！'
		] ) );
	}
}



/*
 * 请求回复默认配置
 * */
if ( isset( $_GET['default'] ) ) {
	nicen_theme_auth(); //权限验证
	foreach ( CONFIG as $key => $value ) {
		update_option( $key, $value );
	}
	exit( json_encode( [
		'code'   => 1,
		'result' => '成功！'
	] ) );
}
