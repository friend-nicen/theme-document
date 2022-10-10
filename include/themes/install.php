<?php



/*
 * 主题激活
 * */
function nicen_theme_switch_theme_self()
{


    /*
     * 相当于手动修改 菜单的显示选项
     * */
    update_user_meta(1, "managenav-menuscolumnshidden", ['xfn']); //显示菜单的所有属性


    /*
     * 更新主题选项
     * 只会在第一次的时候添加，之后都是false
     * */
    foreach (CONFIG as $key => $value) {
        add_option($key, $value); //添加配置参数，和默认值
    }


	nicen_theme_reload();//刷新主题选项
}

/*
 * 主题启用关闭切换后，第一次加载触发的钩子
 * switch_theme
 * */
add_action('after_switch_theme', 'nicen_theme_switch_theme_self');

