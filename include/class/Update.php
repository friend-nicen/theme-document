<?php
/*
 * 显示最近更新文章的小部件
 * */


/*
 * 注册小部件的同时 会按照规则插入 option
 * */

class Update extends WP_Widget
{
    /** 构造函数 */
    function __construct()
    {
        parent::__construct(false, $name = '最近更新（Document部件）',[
                "description"=>"显示最近更新的文章列表"
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
        include get_template_directory() . '/template/widget/update.php';//最新文章

    }

    /*
     * 小部件更新字段
     * */
    function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    /*
     * 小部件选项表单
     * @param $instance，当前选项字段的数组
     * */
    function form($instance)
    {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>">
                <div style="margin-bottom: 0.5rem;"><?php echo "文章数量"; ?></div>
                <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>"
                       name="<?php echo $this->get_field_name('number'); ?>"
                       type="number"
                       value="<?php echo $this->getValue($instance, 'number', 5); ?>"/></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>">
                <div style="margin-bottom: 0.5rem;"><?php echo "显示标题"; ?></div>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                       name="<?php echo $this->get_field_name('title'); ?>"
                       type="text"
                       value="<?php echo $this->getValue($instance, 'title', '最近更新'); ?>"/></label>
        </p>
        <?php
    }

}
