<?php

/*
 * 评论的格式化输出
 * @author 友人a丶
 * @date 2022-07-08
 * */


/**
 * Core class used to implement an HTML list of nav menu items.
 *
 * @since 3.0.0
 *
 * @see Walker
 */
class CommentsWalker extends Walker_Comment {

	public function filter_comment_text( $comment_text, $comment ) {
		$commenter          = wp_get_current_commenter();
		$show_pending_links = ! empty( $commenter['comment_author'] );

		if ( $comment && '0' == $comment->comment_approved && ! $show_pending_links ) {
			$comment_text = wp_kses( $comment_text, array() );
		}

		return '<div class="comment-content">' . $comment_text . "</div>";
	}

}

?>


