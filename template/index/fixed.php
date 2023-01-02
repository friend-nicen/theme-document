<?php

/*
 * 侧边悬浮工具
 * @author 友人a丶
 * @date 2022-07-08
 * */


/*
 * 如果需要显示调色板
 * */

?>

<!--  底部区域  -->
<div class="fixed">
    <!--  回到顶部  -->
    <button class="toTop" data-text="回到顶部"><i class="iconfont icon-you-copy-copy-copy"></i></button>

	<?php
	if ( nicen_theme_config( 'document_switch_theme', false ) ) {
		?>
        <!--  主题色切换  -->
        <button id="theme-color" data-text="主题设置"><i class="iconfont icon-shezhi1">
                <div class="theme-color">
                    <ul>
                        <li>
                            <div class="personal"></div>
                        </li>
                        <li>
                            <div class="theme-one"></div>
                        </li>
                        <li>
                            <div class="theme-two"></div>
                        </li>
                        <li>
                            <div class="theme-three"></div>
                        </li>
                        <li>
                            <div class="theme-four"></div>
                        </li>
                        <li>
                            <div class="theme-five"></div>
                        </li>
                        <li>
                            <div class="theme-six"></div>
                        </li>
                        <li>
                            <div class="theme-seven"></div>
                        </li>
                        <li>
                            <div class="theme-eight"></div>
                        </li>
                    </ul>
                </div>
            </i></button>
		<?php
	}
	?>
    <!--  阅读进度  -->
    <button id="progress" data-text="阅读进度">0%</button>
</div>

