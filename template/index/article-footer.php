<?php
$next     = get_next_post();//下一篇文章
$previous = get_previous_post();//上一篇
global $documents;
?>

<footer>
    <div class="donate">
        <div>予人玫瑰，手有余香</div>
        <div class="qrcode">
            <button>赞赏</button>
            <div class="imgIn">
                <div class="angle"></div>
                <img src="<?=$documents['document_donate']?>" title="赞赏"/>
            </div>
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
