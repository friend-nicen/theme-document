<?php
/*
 * 显示最近更新文章的小部件
 * */


/*
 * 注册小部件的同时 会按照规则插入 option
 * */

class Author extends WP_Widget
{
    /** 构造函数 */
    function __construct()
    {
        parent::__construct(false, $name = '主题小工具【作者信息】', [
            "description" => "显示作者的相关信息"
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

        $avatar = $this->getValue($instance, 'avatar', '/wp-content/themes/nicen_theme/assets/images/avatars.jpg');//作者logo
        $nickname = $this->getValue($instance, 'nickname', '友人a丶'); //作者昵称
        $profession = $this->getValue($instance, 'profession', 'PHPer'); //职业描述
        $beijin = $this->getValue($instance, 'beijin', '/wp-content/themes/nicen_theme/assets/images/bg.jpg'); //作者卡片背景
        $description = $this->getValue($instance, 'description', '前端、PHPer，做更好的自己。'); //文章数量

        include get_template_directory() . '/template/widget/author.php';//最新文章

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
            <label for="<?php echo $this->get_field_id('nickname'); ?>">
        <div style="margin-bottom: 0.5rem;"><?php echo "昵称"; ?></div>
        <input class="widefat" id="<?php echo $this->get_field_id('nickname'); ?>"
               name="<?php echo $this->get_field_name('nickname'); ?>"
               type="text"
               value="<?php echo $this->getValue($instance, 'nickname', '友人a丶'); ?>"/></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('profession'); ?>">
        <div style="margin-bottom: 0.5rem;"><?php echo "职业"; ?></div>
        <input class="widefat" id="<?php echo $this->get_field_id('profession'); ?>"
               name="<?php echo $this->get_field_name('profession'); ?>"
               type="text"
               value="<?php echo $this->getValue($instance, 'profession', 'PHPer'); ?>"/></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>">
        <div style="margin-bottom: 0.5rem;"><?php echo "描述"; ?></div>
        <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>"
                  name="<?php echo $this->get_field_name('description'); ?>"><?php echo $this->getValue($instance, 'description', '前端、PHPer，做更好的自己。'); ?></textarea>
        </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('avatar'); ?>">
        <div style="margin-bottom: 0.5rem;"><?php echo "头像"; ?></div>
        <input class="widefat" id="<?php echo $this->get_field_id('avatar'); ?>"
               name="<?php echo $this->get_field_name('avatar'); ?>"
               type="text"
               value="<?php echo $this->getValue($instance, 'avatar', '/wp-content/themes/document/assets/images/avatars.jpg'); ?>"/></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('beijin'); ?>">
        <div style="margin-bottom: 0.5rem;"><?php echo "背景"; ?></div>
        <input class="widefat" id="<?php echo $this->get_field_id('beijin'); ?>"
               name="<?php echo $this->get_field_name('beijin'); ?>"
               type="text"
               value="<?php echo $this->getValue($instance, 'beijin', '/wp-content/themes/document/assets/images/bg.jpg'); ?>"/></label>
        </p>
        <?php
    }

}
