<?php

/*
 * 全局底部模板
 * @author 友人a丶
 * @date 2022-07-08
 * */


global $documents; //主题全局选项
echo $documents['document_footer'];//额外的页脚内容
wp_footer();//wordpress底部代码
?>
</body>
</html>
