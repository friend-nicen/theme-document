<?php

/*
 * 全局底部模板
 * @author 友人a丶
 * @date 2022-07-08
 * */
get_template_part( './template/index/footer' );
nicen_theme_config('document_footer_tongji');
/*
 * 是否显示结构化数据
 * */
if(nicen_theme_showStructure()){
    get_template_part( './template/index/structure' );
}
wp_footer();//wordpress底部代码
?>
</body>
</html>
