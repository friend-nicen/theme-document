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
        <img src="<?php echo $beijin; ?>" title="作者头像"/>
    </div>
    <div class="offset">
        <div class="author-avatar">
            <img src="<?php echo $avatar; ?>" title="作者头像"/>
        </div>
        <div class="author-info">
                <div class="nickname">
                      <?php echo $nickname; ?>
                </div>
                <div class="tag">
                    <?php echo $profession; ?>
                </div>
        </div>
        <div class="author-self">
			<?php echo $description; ?>
        </div>
    </div>

</div>