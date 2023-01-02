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
        <div class="copyright"><?php echo nicen_theme_config( "document_copyright" ); ?></div>

        <!--赞赏-->
        <div class="donate">
            <a href="<?php echo nicen_theme_config( 'document_donate_url' ); ?>">
                <button>赞赏</button>
            </a>
        </div>

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
    <div class="footer-nav">
        <div class="to">
            <span class="text">上一篇</span>
			<?php if ( ! empty( $next ) ) { ?>
                <a href="<?php echo get_permalink( $next->ID ) ?>"
                   title="<?php echo $next->post_title ?>"><?php echo $next->post_title ?></a>
			<?php } else { ?>
                <a href="/" title="首页">没有了</a>
			<?php } ?>
        </div>
        <div class="to right">
            <span class="text">下一篇</span>
			<?php if ( ! empty( $previous ) ) { ?>
                <a href="<?php echo get_permalink( $previous->ID ) ?>"
                   title="<?php echo $previous->post_title ?>"><?php echo $previous->post_title ?></a>
			<?php } else { ?>
                <a href="/" title="首页">没有了</a>
			<?php } ?>
        </div>
    </div>
</footer>
