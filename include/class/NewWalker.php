<?php
/**
 * Nav Menu API: Walker_Nav_Menu class
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 4.6.0
 */

/**
 * Core class used to implement an HTML list of nav menu items.
 *
 * @since 3.0.0
 *
 * @see Walker
 */
class NewWalker extends Walker_Nav_Menu {


	/**
	 * start_el函数
	 * 主要处理li和里面的a
	 * $depth和$args同上
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args An array of arguments. @see wp_nav_menu()
	 * @param int $id Current item ID.
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // 缩进
		
		if($depth>0){
			return;
		}
		// 定义li的样式
		$depth_classes     = array(
			( $depth == 0 ? '' : '' ), //一级的li，就main-menu-item，其余全部sub-menu-item
			( $depth >= 2 ? 'sub-sub-menu-item' : '' ), //三级的li，添加这个样式
			( $depth % 2 ? '' : '' ), //奇数加样式menu-item-odd,偶数加样式menu-item-even
			'menu-item-depth-' . $depth, //层级同上
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) ); //这句我没看懂，不知道是在干啥
		$zcdnav      = "menu-item-has-children";//这里我的需求是找到WordPress自动生成的子菜单，然后替换成我自己的子菜单样式
		$pos2        = strpos( $class_names, $zcdnav );


		/*
		 * 如果有子菜单
		 * */
		if ( $pos2 !== false ) {

			// 把样式合成到li里面
			$output .= $indent . '<li class="sub-menu-item">';
		} else {
			// 把样式合成到li里面
			$output .= $indent . '<li class="sub-menu-item">';
		}


		// 处理a的属性
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes .= 'title='. $item->title;
		$attributes .= '';

		//添加a的样式
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);
		//上面这个item_output我要说一下。这里写的有点死。
		//如果一级菜单是<a><span>我是菜单</span></a>
		//然而其他级菜单是<a><strong>我是菜单</strong></a>
		//这样的情况，$args->link_before是固定值就不行了，要自行判断
		//$link_before = $depth == 0 ? '<span>' : '<strong>';
		//$link_after = $depth == 0 ? '</span>' : '</strong>';
		//类似这个意思。
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/*
 *
                     public function start_lvl(&$output, $depth = 0, $args = array())
                    {
                        $indent = str_repeat("\t", $depth);
                        $output .= "\n$indent<div class=\"dropdown-menu\">\n";
                    }

                    public function end_lvl(&$output, $depth = 0, $args = array())
                    {
                        $indent = str_repeat("\t", $depth);
                        $output .= "\n$indent</div>\n";
                    }

                    public function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0)
                    {
                        if ($depth == 0) {
                            $output .= "<li><a href='" . $object->url . "' target='" . $object->target . "' title='" . $object->description . "'>" . $object->title . "</a>";
                        } else if ($depth == 1) {
                            $output .= "<a href=" . $object->url . " target='" . $object->target . "' title='" . $object->description . "'>" . $object->title . "</a>";
                        }
                    }

                    public function end_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0)
                    {
                        if ($depth == 0) {
                            $output .= "\n</li>";
                        }
                    }
                }
 *
 * */
?>


