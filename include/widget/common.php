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
