<?php
/*
 * 显示最近更新文章的小部件
 * */


/*
 * 注册小部件的同时 会按照规则插入 option
 * */

class Info extends WP_Widget
{
    /** 构造函数 */
    function __construct()
    {
        parent::__construct(false, $name = '文章信息（Document部件）', [
            "description" => "显示文章统计信息（只在文章页有效）"
        ]);
    }


    /*
     * 获取指定字段值
     * */
    function getValue($instance, $field, $default)
    {

        if (isset($instance[$field])) {
            return $instance[$field];
        } else {
            return $default;
        }

    }


    /*
     * 输出小部件显示的代码
     * @param $args,注册小部件时的array参数
     * */
    function widget($args, $instance)
    {
        $title = $this->getValue($instance, 'title', '最近更新');
        $number = $this->getValue($instance, 'number', 5);; //文章数量
        include get_template_directory() . '/template/widget/info.php';//最新文章

    }

    /*
     * 小部件更新字段
     * */
    function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

}
