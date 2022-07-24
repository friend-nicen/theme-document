<?php

/*
 * 作者信息卡片样式
 * @author 友人a丶
 * @date 2022-07-08
 * */



?>

<!--作者信息-->
<div class="author">
    <div class="author-beijin">
        <img src="<?php documents( 'document_author_beijin' ); ?>" title="作者头像"/>
    </div>
    <div class="offset">
        <div class="author-avatar">
            <img src="<?php documents( 'document_author_avatar' ); ?>" title="作者头像"/>
        </div>
        <div class="author-info">
                <div class="nickname">
                      <?php documents( 'document_author_nickname' ); ?>
                </div>
                <div class="tag">
                    <?php documents( 'document_author_profession' ); ?>
                </div>
        </div>
        <div class="author-self">
			<?php documents( 'document_author_description' ); ?>
        </div>
    </div>

</div>