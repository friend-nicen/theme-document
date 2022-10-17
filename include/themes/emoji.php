<?php
/*
* @author 友人a丶
* @date 2022/10/17
* 评论时转换表情为链接
*/


/**
 * @param $html
 *
 * @return void
 * 评论内提取表情
 */
function nicen_theme_textToEmoji( $comment_id ) {

	$comment = get_comment( $comment_id );
	$html    = $comment->comment_content;
	$path    = get_template_directory_uri() . "/assets/smilies/"; //主题目录

	if ( preg_match( "/::(.*?)::/", $html ) ) {
		$content = preg_replace( "/::(.*?)::/", "<img class='comments-emoji' src='" . $path . "$1.png' title='emoji'/>", $html );
		wp_update_comment( [
			"comment_ID"      => $comment_id,
			"comment_content" => $content
		] );
	}
}


add_action( 'comment_post', 'nicen_theme_textToEmoji' );