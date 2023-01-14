<?php
/*
 * 表单输出
 * */
function widget_input( $that, $instance, $args, $isArray = false ) {
	$value = $that->getValue( $instance, $args['field'], $args['default'] );
	?>
    <p>
        <label for="<?php echo $that->get_field_id( $args['field'] ); ?>">
    <div style="margin-bottom: 0.5rem;"><?php echo $args['title']; ?></div>
    <input class="widefat" id="<?php echo $that->get_field_id( $args['field'] ); ?>"
           name="<?php echo $that->get_field_name( $args['field'] ) . ( $isArray ? '[]' : '' ); ?>"
           type="<?php echo $args['type'] ?>"
           value="<?php echo $isArray ? $value[ $args['index'] ] : $value; ?>"/></label>
    </p>
	<?php
}


/*
 * 时间选择
 * */
function widget_datepicker( $that, $instance, $args, $isArray = false ) {
	static $count = 1;
	$value = $that->getValue( $instance, $args['field'], $args['default'] );
	?>
    <p>
        <label for="<?php echo $that->get_field_id( $args['field'] ); ?>">
    <div style="margin-bottom: 0.5rem;"><?php echo $args['title']; ?></div>
    <input id="select-datetime-<?php echo $count; ?>" data-count="<?php echo $count; ?>" class="widefat select-datetime"
           id="<?php echo $that->get_field_id( $args['field'] ); ?>"
           name="<?php echo $that->get_field_name( $args['field'] ) . ( $isArray ? '[]' : '' ); ?>"
           type="<?php echo $args['type'] ?>"
           value="<?php echo $isArray ? $value[ $args['index'] ] : $value; ?>"/></label>
    </p>
	<?php
	$count ++;
}

/*
 * 时间选择
 * */
function widget_media( $that, $instance, $args, $isArray = false ) {
	$value = $that->getValue( $instance, $args['field'], $args['default'] );
	?>
    <p>
        <label for="<?php echo $that->get_field_id( $args['field'] ); ?>">
    <div style="margin-bottom: 0.5rem;"><?php echo $args['title']; ?></div>
    <div style="display: flex;align-items: center;">
        <input class="widefat" id="<?php echo $that->get_field_id( $args['field'] ); ?>"
               name="<?php echo $that->get_field_name( $args['field'] ) . ( $isArray ? '[]' : '' ); ?>"
               type="<?php echo $args['type'] ?>"
               value="<?php echo $isArray ? $value[ $args['index'] ] : $value; ?>"/></label>
        <button style="margin-left: 10px;white-space: nowrap;" class="select-media" type="button">选择</button>
    </div>


    </p>
	<?php
}


/*
 * 选择框
 * 考虑到值是数组的情况
 * */
function widget_select( $that, $instance, $args, $options, $isArray = false ) {
	$current = $that->getValue( $instance, $args['field'], $args['default'] );
	?>

    <p>
        <label for="<?php echo $that->get_field_id( $args['field'] ); ?>">
    <div style="margin-bottom: 0.5rem;"><?php echo $args['title']; ?></div>
    <select class="widefat" id="<?php echo $that->get_field_id( $args['field'] ); ?>"
            name="<?php echo $that->get_field_name( $args['field'] ) . ( $isArray ? '[]' : '' ); ?>">
		<?php
		foreach ( $options as $key => $value ) {
			?>
            <option value="<?php echo $key; ?>" <?php echo ( $isArray ? $value[ $args['index'] ] : $current ) == $key ? "selected" : ""; ?>>
				<?php echo $value; ?>
            </option>
		<?php } ?>
    </select>
    </label>
    </p>
	<?php
}
