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
function nicen_theme_textToEmoji( $comment_ID ) {

    global $wpdb;


    $comment = get_comment( $comment_ID );
    $html    = $comment->comment_content;
    $path    = get_template_directory_uri() . "/assets/smilies/"; //主题目录
    $dir     = get_template_directory() . "/assets/smilies/"; //主题目录

    
    /*
     * 匹配是否有表情
     * */
    if ( preg_match_all( "/:(.+?):/", $html, $match ) ) {

        $count = 0; //有效表情数量

        /*判断表情是否存在*/
        foreach ( $match[1] as $emoji ) {
            if ( file_exists( $dir . $emoji . ".png" ) ) {
                $html = preg_replace( "/:" . $emoji . ":/", "<img class='comments-emoji' src='" . $path . $emoji . ".png' title='emoji'/>", $html );
                $count ++;
            }
        }

        /*
         * 判断有效的表情数量
         * */
        $wpdb->update( $wpdb->comments, [
            "comment_ID"      => $comment_ID,
            "comment_content" => $html
        ], compact( 'comment_ID' ) );


    }
}


add_action( 'comment_post', 'nicen_theme_textToEmoji' );