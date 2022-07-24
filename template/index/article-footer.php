<?php

/*
 * 文章底部模板
 * @author 友人a丶
 * @date 2022-07-08
 * */


$next     = get_next_post();//下一篇文章
$previous = get_previous_post();//上一篇
global $documents;
?>

<footer>
    <div class="donate">
        <div>予人玫瑰，手有余香</div>
        <div class="qrcode">
            <a href="<?=$documents['document_donate']?>"><button>赞赏</button></a>
            <!--<div class="imgIn">
                <div class="angle"></div>
                <img src="" title="赞赏"/>
            </div>-->
        </div>
    </div>
    <div class="footer-nav">
        <div class="to">
            <span class="text">上一篇</span>
			<?php if ( ! empty( $next ) ) { ?>
                <a href="<?= get_permalink( $next->ID ) ?>"
                   title="<?= $next->post_title ?>"><?= $next->post_title ?></a>
			<?php } else { ?>
                <a href="/" title="首页">没有了</a>
			<?php } ?>
        </div>
        <div class="to right">
            <span class="text">下一篇</span>
			<?php if ( ! empty( $previous ) ) { ?>
                <a href="<?= get_permalink( $previous->ID ) ?>"
                   title="<?= $previous->post_title ?>"><?= $previous->post_title ?></a>
			<?php } else { ?>
                <a href="/" title="首页">没有了</a>
			<?php } ?>
        </div>
    </div>
</footer>
