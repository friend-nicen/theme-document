<?php

/*
 * 文章底部模板
 * @author 友人a丶
 * @date 2022-07-08
 * */


$next     = get_next_post();//下一篇文章
$previous = get_previous_post();//上一篇
?>

<footer>
    <div class="article-footer">


        <!--版权-->
		<?php if ( nicen_theme_config( "document_show_copyright", false ) ) { ?>
            <div class="copyright">
				<?php echo get_copyright(); ?>
            </div>
		<?php } ?>
        <!--赞赏-->
		<?php if ( nicen_theme_config( "document_show_donate", false ) ) { ?>
            <div class="donate">
                <a href="<?php nicen_theme_config( 'document_donate_url' ); ?>">
                    <button>赞赏</button>
                </a>
            </div>
		<?php } ?>
        <!--标签-->
        <div class="label">
            <i class="iconfont icon-biaoqian"></i>
            <ul>
				<?php
				/*遍历输出标签*/
				$tags = get_the_tags();

				if ( empty( $tags ) ) {
					echo "<li>暂无标签</li>";
				} else {

					/*
					 * 遍历标签
					 * */
					foreach ( $tags as $tag ) {

						$name = $tag->name; //标签名
						$link = get_term_link( $tag->term_id ); //标签链接

						echo "<li><a title='" . $name . "' href='" . $link . "'>" . $name . "</a></li>";
					}


				}
				?>
            </ul>
        </div>
    </div>

	<?php
	$equal         = nicen_theme_config( "document_assiciate_type", false ) == 1 ? false : true;
	$next_post     = get_previous_post( $equal );
	$previous_post = get_next_post( $equal );
	?>


    <div class="footer-nav">
        <div class="to">
            <span class="text">上一篇</span>
			<?php if ( ! empty( $next_post ) ) { ?>
                <a href="<?php echo get_permalink( $next_post->ID ) ?>"
                   title="<?php echo $next_post->post_title ?>"><?php echo $next_post->post_title ?></a>
			<?php } else { ?>
                <a href="/" title="首页">没有了</a>
			<?php } ?>
        </div>
        <div class="to right">
            <span class="text">下一篇</span>
			<?php if ( ! empty( $previous_post ) ) { ?>
                <a href="<?php echo get_permalink( $previous_post->ID ) ?>"
                   title="<?php echo $previous_post->post_title ?>"><?php echo $previous_post->post_title ?></a>
			<?php } else { ?>
                <a href="/" title="首页">没有了</a>
			<?php } ?>
        </div>
    </div>
</footer>
