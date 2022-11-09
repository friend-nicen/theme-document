<?php

/*
 * 侧边栏最新文章
 * @author 友人a丶
 * @date 2022-07-08
 * */

?>

<div class="div-info">
    <div class="header">
        <ul>
            <li class="active"><?php echo $title; ?></li>
            <!-- <li>修改记录</li>-->
        </ul>
    </div>
    <ul class="ul">

		<?php
		/*
		 * 判断显示类型
		 * */
		$comments = get_comments( "number=" . $number . "&orderby=comment_date_gmt" );

		/*
		 * 递归显示文章
		 * */

		foreach ( $comments as $comment ) {

			$avatar = get_avatar_url( $comment->user_id );

			echo '<li>
                <div class="comment-widget">
                <img class="author-avatar" src="' . $avatar . '" title="头像"/>
                    <a href="' . get_the_permalink( $comment->comment_post_ID ) . '" title="' . $comment->comment_content . '">
                        <span class="name">
                         ' . $comment->comment_author . '
                         </span>
                        <span class="comment-widget-content"> 
                             ' . $comment->comment_content . '
                        </span>
                    </a>
                </div>
            </li>';

		}
		wp_reset_query(); //重置文章指指针
		?>
    </ul>

</div>