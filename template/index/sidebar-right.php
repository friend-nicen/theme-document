<?php
/*如果有激活的小工具*/
if ( is_active_sidebar( 'sidebar' ) ) {
    ?>
    <div id="fixed">
        <aside class="main-right" id="right">
            <?php dynamic_sidebar( 'sidebar' ); ?>
        </aside>
    </div>
<?php } ?>