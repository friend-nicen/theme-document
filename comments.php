<?php

/*
 * 评论页面模板
 * @author 友人a丶
 * @date 2022-07-08
 * */


/*
 * 如果需要显示评论
 * */

if ( nicen_theme_showComments() ) {

	/*如果开启了评论*/
	if ( comments_open() ) {

		//是否登录
		$isLogin = is_user_logged_in();
		//获取管理员用户信息
		$adminUserInfo    = wp_get_current_user();
		$currentCommenter = wp_get_current_commenter();

		//参数
		$nickname = $isLogin ? ( $adminUserInfo->exists() ? $adminUserInfo->display_name : '' ) : htmlspecialchars( $currentCommenter['comment_author'] );
		$email    = $isLogin ? ( $adminUserInfo->exists() ? $adminUserInfo->user_email : '' ) : htmlspecialchars( $currentCommenter['comment_author_email'] );
		$webUrl   = $isLogin ? site_url() : htmlspecialchars( $currentCommenter['comment_author_url'] );
		$default  = get_template_directory_uri() . '/assets/images/avatar.png?ver=' . filemtime( get_template_directory() . '/assets/images/avatar.png' );
		$avatar   = $isLogin ? ( get_avatar_url( $adminUserInfo->ID ) ?? $default ) : $default;

		$reply_to_id = isset( $_GET['replytocom'] ) ? (int) $_GET['replytocom'] : false;

		if ( $reply_to_id ) {
			$comment = get_comment( $reply_to_id );
		}//获取当前回复的评论


		?>

        <div class="div-info">
            <div class="header">
                <ul>
                    <li class="active">评论区</li>
                    <!-- <li>修改记录</li>-->
                </ul>
            </div>
            <form class="comment-form" action="/wp-comments-post.php" method="post">
                <!--评论表单头部元素-->
                <div class="comment-header">
                    <!--评论者信息-->
                    <div class="comment-person">
                        <div class="comment-avatar">
                            <img src="<?= $avatar ?>" alt="默认头像" title="默认头像"/>
                        </div>
                        <div class="comment-info">
                            <div class="comment-info-top"><?php echo ( ! $comment ) ? '发表评论' : '回复 ' . $comment->comment_author . '的评论'; ?></div>
                            <div class="comment-info-bottom"><?php echo $isLogin ? $nickname . '，做更好的自己！' : '匿名网友'; ?></div>
                        </div>
                    </div>
                    <div class="comment-loginout">
						<?php if ( $comment ) {
							cancel_comment_reply_link( '取消回复' );
						} ?>
                        <a style="display: <?php echo $isLogin ? 'block' : 'none' ?>" title="注销登录"
                           href="<?php echo wp_logout_url( apply_filters( 'the_permalink', get_permalink(), '' ) ); ?>">注销登录</a>
                    </div>
                </div>
                <div class="comment-form-main">
					<?php wp_nonce_field( 'unfiltered-html-comment_' . get_the_ID(), '_wp_unfiltered_html_comment', false ); ?>
                    <input type="hidden" name="comment_parent"
                           value=" <?php echo $reply_to_id ? $comment->comment_ID : ''; ?>">
                    <input type="hidden" name="comment_post_ID" value="<?= get_the_ID(); ?>" id="comment_post_ID">
                    <textarea name="comment" maxlength="65525" placeholder="三言两语,安慰自己,冷言冷语,坚持自己" rows="5"
                              class="comment-content"></textarea>
                    <div class="comment-container">
                        <input placeholder="昵称" name="author" type="text" class="comment-name" value="<?= $nickname ?>"
                               required/>
                        <input placeholder="邮箱" name="email" type="email" class="comment-mail" value="<?= $email ?>"
                               required/>
                        <input placeholder="网址" name="url" type="url" class="comment-url" value="<?= $webUrl ?>"
                               required/>
                    </div>
                </div>
                <div class="comment-form-footer">
                    <button type="submit">提交</button>
                </div>
            </form>

            <!--输出评论-->
			<?php if ( have_comments() ) { ?>
                <div class="comment_list">
                    <ul class="front">
						<?php wp_list_comments( [
							'style'  => 'ul',
							'type'   => 'all',
							'walker' => ( new CommentsWalker() )
						] ); ?>
                    </ul>
                </div>
				<?php if ( get_comment_pages_count() > 1 ) { ?>
                    <div class="pagination">
						<?php paginate_comments_links( [ 'prev_next' => false ] ); ?>
                    </div>
				<?php } ?>
			<?php } ?>
        </div>

		<?php

	} else { ?>
        <div class="div-info">
            <div class="header" style="padding: 20px 20px 0 20px;text-align: center;border: none;">
                评论区未打开，无法接收留言！
            </div>
        </div>
		<?php
	} ?>

	<?php
}