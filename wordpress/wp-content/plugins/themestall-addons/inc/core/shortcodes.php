<?php
class Ts_Shortcodes {
	static $tabs = array();
	static $tab_count = 0;

	function __construct() {}

	public static function heading( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'tag'   => 'h2',
				'size'   => 48,
				'color'		=> '#ffffff',
				'align'  => 'center',
				'margin_top' => '20',
				'margin_bottom' => '20',
				'text_transform' => 'uppercase',
				'letter_spacing' => '28',
				'class'  => ''
			), $atts, 'heading' );
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		do_action( 'ts/shortcode/heading', $atts );
				
		return '<' . esc_attr($atts['tag']) . ' class="ts-heading ts-heading-style-2 ts-heading-align-' . esc_attr($atts['align']) . ts_ecssc( $atts ) . '" style="margin-top:' . intval($atts['margin_top']) . 'px; margin-bottom:' . intval($atts['margin_bottom']) . 'px; font-size: ' . intval($atts['size']) . 'px; text-transform: ' . esc_attr($atts['text_transform']) . '; color: '.$atts['color'].'; letter-spacing: ' . intval($atts['letter_spacing']) . 'px; "><span class="ts-heading-inner">' . do_shortcode( $content ) . '</span></' . $atts['tag'] . '>';

	}

	public static function tabs( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'active'   => 1,
				'vertical' => 'no',
				'style'    => 'default', // 3.x
				'class'    => ''
			), $atts, 'tabs' );
		if ( $atts['style'] === '3' ) $atts['vertical'] = 'yes';
		do_shortcode( $content );
		$return = '';
		$tabs = $panes = array();
		if ( is_array( self::$tabs ) ) {
			if ( self::$tab_count < $atts['active'] ) $atts['active'] = self::$tab_count;
			foreach ( self::$tabs as $tab ) {
				$tabs[] = '<span class="' . ts_ecssc( $tab ) . $tab['disabled'] . '"' . $tab['anchor'] . $tab['url'] . $tab['target'] . '>' . ts_scattr( $tab['title'] ) . '</span>';
				$panes[] = '<div class="ts-tabs-pane ts-clearfix' . ts_ecssc( $tab ) . '">' . $tab['content'] . '</div>';
			}
			$atts['vertical'] = ( $atts['vertical'] === 'yes' ) ? ' ts-tabs-vertical' : '';
			$return = '<div class="ts-tabs ts-tabs-style-' . $atts['style'] . $atts['vertical'] . ts_ecssc( $atts ) . '" data-active="' . (string) $atts['active'] . '"><div class="ts-tabs-nav">' . implode( '', $tabs ) . '</div><div class="ts-tabs-panes">' . implode( "\n", $panes ) . '</div></div>';
		}
		// Reset tabs
		self::$tabs = array();
		self::$tab_count = 0;
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		do_action( 'ts/shortcode/tabs', $atts );
		return $return;
	}

	public static function tab( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'    => __( 'Tab title', 'themestall' ),
				'disabled' => 'no',
				'anchor'   => '',
				'url'      => '',
				'target'   => 'blank',
				'class'    => ''
			), $atts, 'tab' );
		$x = self::$tab_count;
		self::$tabs[$x] = array(
			'title'    => $atts['title'],
			'content'  => do_shortcode( $content ),
			'disabled' => ( $atts['disabled'] === 'yes' ) ? ' ts-tabs-disabled' : '',
			'anchor'   => ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '',
			'url'      => ' data-url="' . $atts['url'] . '"',
			'target'   => ' data-target="' . $atts['target'] . '"',
			'class'    => $atts['class']
		);
		self::$tab_count++;
		do_action( 'ts/shortcode/tab', $atts );
	}

	public static function spoiler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'  => __( 'Spoiler title', 'themestall' ),
				'open'   => 'no',
				'style'  => 'default',
				'icon'   => 'plus',
				'anchor' => '',
				'class'  => ''
			), $atts, 'spoiler' );
		$atts['style'] = str_replace( array( '1', '2' ), array( 'default', 'fancy' ), $atts['style'] );
		$atts['anchor'] = ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '';
		if ( $atts['open'] !== 'yes' ) $atts['class'] .= ' ts-spoiler-closed';
		ts_query_asset( 'css', 'font-awesome' );
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		do_action( 'ts/shortcode/spoiler', $atts );
		return '<div class="ts-spoiler ts-spoiler-style-' . $atts['style'] . ' ts-spoiler-icon-' . $atts['icon'] . ts_ecssc( $atts ) . '"' . $atts['anchor'] . '><div class="ts-spoiler-title"><span class="ts-spoiler-icon"></span>' . ts_scattr( $atts['title'] ) . '</div><div class="ts-spoiler-content ts-clearfix" style="display:none">' . ts_do_shortcode( $content, 's' ) . '</div></div>';
	}

	public static function accordion( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'accordion' );
		do_action( 'ts/shortcode/accordion', $atts );
		return '<div class="ts-accordion' . ts_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function divider( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'top'           => 'yes',
				'text'          => __( 'Go to top', 'themestall' ),
				'style'         => 'default',
				'divider_color' => '#999999',
				'link_color'    => '#999999',
				'size'          => '3',
				'margin'        => '15',
				'class'         => ''
			), $atts, 'divider' );
		// Prepare TOP link
		$top = ( $atts['top'] === 'yes' ) ? '<a href="#" style="color:' . $atts['link_color'] . '">' . ts_scattr( $atts['text'] ) . '</a>' : '';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<div class="ts-divider ts-divider-style-' . $atts['style'] . ts_ecssc( $atts ) . '" style="margin:' . $atts['margin'] . 'px 0;border-width:' . $atts['size'] . 'px;border-color:' . $atts['divider_color'] . '">' . $top . '</div>';
	}

	public static function spacer( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'size'  => '20',
				'class' => ''
			), $atts, 'spacer' );
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<div class="ts-spacer' . ts_ecssc( $atts ) . '" style="height:' . (string) $atts['size'] . 'px"></div>';
	}

	public static function highlight( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'background' => '#ddff99',
				'bg'         => null, // 3.x
				'color'      => '#000000',
				'class'      => ''
			), $atts, 'highlight' );
		if ( $atts['bg'] !== null ) $atts['background'] = $atts['bg'];
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<span class="ts-highlight' . ts_ecssc( $atts ) . '" style="background:' . $atts['background'] . ';color:' . $atts['color'] . '">&nbsp;' . do_shortcode( $content ) . '&nbsp;</span>';
	}

	public static function label( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'  => 'default',
				'style' => null, // 3.x
				'class' => ''
			), $atts, 'label' );
		if ( $atts['style'] !== null ) $atts['type'] = $atts['style'];
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<span class="ts-label ts-label-type-' . $atts['type'] . ts_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function quote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'cite'  => false,
				'url'   => false,
				'class' => ''
			), $atts, 'quote' );
		$cite_link = ( $atts['url'] && $atts['cite'] ) ? '<a href="' . $atts['url'] . '" target="_blank">' . $atts['cite'] . '</a>'
		: $atts['cite'];
		$cite = ( $atts['cite'] ) ? '<span class="ts-quote-cite">' . $cite_link . '</span>' : '';
		$cite_class = ( $atts['cite'] ) ? ' ts-quote-has-cite' : '';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		do_action( 'ts/shortcode/quote', $atts );
		return '<div class="ts-quote ts-quote-style-' . $atts['style'] . $cite_class . ts_ecssc( $atts ) . '"><div class="ts-quote-inner ts-clearfix">' . do_shortcode( $content ) . ts_scattr( $cite ) . '</div></div>';
	}

	public static function pullquote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'align' => 'left',
				'class' => ''
			), $atts, 'pullquote' );
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		return '<div class="ts-pullquote ts-pullquote-align-' . $atts['align'] . ts_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function dropcap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'size'  => 3,
				'class' => ''
			), $atts, 'dropcap' );
		$atts['style'] = str_replace( array( '1', '2', '3' ), array( 'default', 'light', 'default' ), $atts['style'] ); // 3.x
		// Calculate font-size
		$em = $atts['size'] * 0.5 . 'em';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<span class="ts-dropcap ts-dropcap-style-' . $atts['style'] . ts_ecssc( $atts ) . '" style="font-size:' . $em . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function frame( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'align' => 'left',
				'class' => ''
			), $atts, 'frame' );
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<span class="ts-frame ts-frame-align-' . $atts['align'] . ' ts-frame-style-' . $atts['style'] . ts_ecssc( $atts ) . '"><span class="ts-frame-inner">' . do_shortcode( $content ) . '</span></span>';
	}

	public static function row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts );
		return '<div class="ts-row' . ts_ecssc( $atts ) . '">' . ts_do_shortcode( $content, 'r' ) . '</div>';
	}

	public static function column( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'size'   => '1/2',
				'center' => 'no',
				'last'   => null,
				'class'  => ''
			), $atts, 'column' );
		if ( $atts['last'] !== null && $atts['last'] == '1' ) $atts['class'] .= ' ts-column-last';
		if ( $atts['center'] === 'yes' ) $atts['class'] .= ' ts-column-centered';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		return '<div class="ts-column ts-column-size-' . str_replace( '/', '-', $atts['size'] ) . ts_ecssc( $atts ) . '"><div class="ts-column-inner ts-clearfix">' . ts_do_shortcode( $content, 'c' ) . '</div></div>';
	}

	public static function ts_list( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'icon' => '',
				'icon_color' => '#333',
				'style' => null,
				'class' => ''
			), $atts, 'list' );
		// Backward compatibility // 4.2.3+
		if ( $atts['style'] !== null ) {
			switch ( $atts['style'] ) {
			case 'star':
				$atts['icon'] = 'icon: star';
				$atts['icon_color'] = '#ffd647';
				break;
			case 'arrow':
				$atts['icon'] = 'icon: arrow-right';
				$atts['icon_color'] = '#00d1ce';
				break;
			case 'check':
				$atts['icon'] = 'icon: check';
				$atts['icon_color'] = '#17bf20';
				break;
			case 'cross':
				$atts['icon'] = 'icon: remove';
				$atts['icon_color'] = '#ff142b';
				break;
			case 'thumbs':
				$atts['icon'] = 'icon: thumbs-o-up';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'link':
				$atts['icon'] = 'icon: external-link';
				$atts['icon_color'] = '#5c5c5c';
				break;
			case 'gear':
				$atts['icon'] = 'icon: cog';
				$atts['icon_color'] = '#ccc';
				break;
			case 'time':
				$atts['icon'] = 'icon: time';
				$atts['icon_color'] = '#a8a8a8';
				break;
			case 'note':
				$atts['icon'] = 'icon: edit';
				$atts['icon_color'] = '#f7d02c';
				break;
			case 'plus':
				$atts['icon'] = 'icon: plus-sign';
				$atts['icon_color'] = '#61dc3c';
				break;
			case 'guard':
				$atts['icon'] = 'icon: shield';
				$atts['icon_color'] = '#1bbe08';
				break;
			case 'event':
				$atts['icon'] = 'icon: bullhorn';
				$atts['icon_color'] = '#ff4c42';
				break;
			case 'idea':
				$atts['icon'] = 'icon: sun';
				$atts['icon_color'] = '#ffd880';
				break;
			case 'settings':
				$atts['icon'] = 'icon: cogs';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'twitter':
				$atts['icon'] = 'icon: twitter-sign';
				$atts['icon_color'] = '#00ced6';
				break;
			}
		}
		
		if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return '<div class="ts-list ts-list-style-' . $atts['style'] . ts_ecssc( $atts ) . '">' . str_replace( '<li>', '<li>' . $atts['icon'] . ' ', ts_do_shortcode( $content, 'l' ) ) . '</div>';
	}

	public static function button( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'        		 => get_option( 'home' ),
				'link'        		=> null, // 3.x
				'target'      		=> 'self',
				'style'       		=> 'default',
				'background'  		=> '#FFFFFF',
				'opacity'	  		=> '0',
				'background_hover'	=> '#ef4416',
				'border'			=> '#121212',
				'color'       		=> '#ffffff',
				'color_hover'  		=> '#ffffff',
				'line_height'		=> 18,
				'dark'        		=> null, // 3.x
				'size'        		=> 3,
				'wide'        		=> 'no',
				'center'      		=> 'no',
				'radius'      		=> 'auto',
				'icon'        		=> false,
				'icon_color'  		=> '#121212',
				'ts_color'    		=> null, // Dep. 4.3.2
				'ts_pos'      		=> null, // Dep. 4.3.2
				'text_shadow' 		=> 'none',
				'desc'        		=> '',
				'onclick'     		=> '',
				'rel'         		=> '',
				'title'       		=> '',
				'class'       		=> ''
			), $atts, 'button' );

		if ( $atts['link'] !== null ) $atts['url'] = $atts['link'];
		if ( $atts['dark'] !== null ) {
			$atts['background'] = $atts['color'];
			$atts['color'] = ( $atts['dark'] ) ? '#000' : '#fff';
		}
		if ( is_numeric( $atts['style'] ) ) $atts['style'] = str_replace( array( '1', '2', '3', '4', '5' ), array( 'default', 'glass', 'bubbles', 'noise', 'stroked' ), $atts['style'] ); // 3.x
		// Prepare vars
		$a_css = array();
		$span_css = array();
		$img_css = array();
		$small_css = array();
		$radius = '0px';
		$before = $after = '';
		// Text shadow values
		$shadows = array(
			'none'         => '0 0',
			'top'          => '0 -1px',
			'right'        => '1px 0',
			'bottom'       => '0 1px',
			'left'         => '-1px 0',
			'top-right'    => '1px -1px',
			'top-left'     => '-1px -1px',
			'bottom-right' => '1px 1px',
			'bottom-left'  => '-1px 1px'
		);
		// Common styles for button
		$styles = array(
			'size'     => round( ( $atts['size'] + 7 ) * 1.3 ),
			'ts_color' => ( $atts['ts_color'] === 'light' ) ? ts_hex_shift( $atts['background'], 'lighter', 50 ) : ts_hex_shift( $atts['background'], 'darker', 40 ),
			'ts_pos'   => ( $atts['ts_pos'] !== null ) ? $shadows[$atts['ts_pos']] : $shadows['none']
		);
		// Calculate border-radius
		if ( $atts['radius'] == 'auto' ) $radius = round( $atts['size'] + 2 ) . 'px';
		elseif ( $atts['radius'] == 'round' ) $radius = round( ( ( $atts['size'] * 2 ) + 2 ) * 2 + $styles['size'] ) . 'px';
		elseif ( is_numeric( $atts['radius'] ) ) $radius = intval( $atts['radius'] ) . 'px';
		// CSS rules for <a> tag
		$background = ts_hex2rgb($atts['background'], ',');
		
		$a_rules = array(
			'color'                 => $atts['color'],
			'background'      		=> 'rgba('.$background.', '.$atts['opacity'].')',
			'border-color'          => $atts['border'],
			'border-radius'         => $radius,
			'-moz-border-radius'    => $radius,
			'-webkit-border-radius' => $radius
		);
		
		$data_hover_background = $atts['background_hover'];
		// CSS rules for <span> tag
		$span_rules = array(
			'padding'               => ( $atts['icon'] ) ? round( ( $atts['size'] ) / 2 + 4 ) . 'px ' . round( $atts['size'] * 2 + 10 ) . 'px' : '0px ' . round( $atts['size'] * 2 + 10 ) . 'px',
			'font-size'             => $styles['size'] . 'px',
			'line-height'           => $atts['line_height']. 'px',
			'border-color'          => $atts['border'],
			'border-radius'         => $radius,
			'-moz-border-radius'    => $radius,
			'-webkit-border-radius' => $radius,
			'text-shadow'           => $styles['ts_pos'] . ' 1px ' . $styles['ts_color'],
			'-moz-text-shadow'      => $styles['ts_pos'] . ' 1px ' . $styles['ts_color'],
			'-webkit-text-shadow'   => $styles['ts_pos'] . ' 1px ' . $styles['ts_color']
		);
		// Apply new text-shadow value
		if ( $atts['ts_color'] === null && $atts['ts_pos'] === null ) {
			$span_rules['text-shadow'] = $atts['text_shadow'];
			$span_rules['-moz-text-shadow'] = $atts['text_shadow'];
			$span_rules['-webkit-text-shadow'] = $atts['text_shadow'];
		}
		// CSS rules for <img> tag
		$img_rules = array(
			'width'     => round( $styles['size'] * 1.5 ) . 'px',
			'height'    => round( $styles['size'] * 1.5 ) . 'px'
		);
		// CSS rules for <small> tag
		$small_rules = array(
			'padding-bottom' => round( ( $atts['size'] ) / 2 + 4 ) . 'px',
			'color' => $atts['color']
		);
		// Create style attr value for <a> tag
		foreach ( $a_rules as $a_rule => $a_value ) $a_css[] = $a_rule . ':' . $a_value;
		// Create style attr value for <span> tag
		foreach ( $span_rules as $span_rule => $span_value ) $span_css[] = $span_rule . ':' . $span_value;
		// Create style attr value for <img> tag
		foreach ( $img_rules as $img_rule => $img_value ) $img_css[] = $img_rule . ':' . $img_value;
		// Create style attr value for <img> tag
		foreach ( $small_rules as $small_rule => $small_value ) $small_css[] = $small_rule . ':' . $small_value;
		// Prepare button classes
		$classes = array( 'ts-button', 'ts-button-style-' . $atts['style'] );
		// Additional classes
		if ( $atts['class'] ) $classes[] = $atts['class'];
		// Wide class
		if ( $atts['wide'] === 'yes' ) $classes[] = 'ts-button-wide';
		// Prepare icon
		if ( $atts['icon']) {
			if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
				$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $styles['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
				ts_query_asset( 'css', 'font-awesome' );
			}
			else $icon = '<img src="' . $atts['icon'] . '" alt="' . esc_attr( $content ) . '" style="' . implode( $img_css, ';' ) . '" />';
		}
		else $icon = '';
		// Prepare <small> with description
		$desc = ( $atts['desc'] ) ? '<small style="' . implode( $small_css, ';' ) . '">' . ts_scattr( $atts['desc'] ) . '</small>' : '';
		// Wrap with div if button centered
		if ( $atts['center'] === 'yes' ) {
			$before .= '<div class="ts-button-center">';
			$after .= '</div>';
		}
		// Replace icon marker in content,
		// add float-icon class to rearrange margins
		if ( strpos( $content, '%icon%' ) !== false ) {
			$content = str_replace( '%icon%', $icon, $content );
			$classes[] = 'ts-button-float-icon';
		}
		// Button text has no icon marker, append icon to begin of the text
		else $content = $content.' '.$icon;
		// Prepare onclick action
		$atts['onclick'] = ( $atts['onclick'] ) ? ' onClick="' . $atts['onclick'] . '"' : '';
		// Prepare rel attribute
		$atts['rel'] = ( $atts['rel'] ) ? ' rel="' . $atts['rel'] . '"' : '';
		// Prepare title attribute
		$atts['title'] = ( $atts['title'] ) ? ' title="' . $atts['title'] . '"' : '';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		return $before . '<a href="' . ts_scattr( $atts['url'] ) . '" data-hoverback="'.esc_attr($atts['background_hover']).'" data-currentbg="'.esc_attr('rgba('.$background.', '.$atts['opacity'].')').'" data-currentbor="'.esc_attr($atts['border']).'" data-currentcolor="'.esc_attr($atts['color']).'" data-hovercolor="'.esc_attr($atts['color_hover']).'" class="' . implode( $classes, ' ' ) . '" style="' . implode( $a_css, ';' ) . '" target="_' . $atts['target'] . '"' . $atts['onclick'] . $atts['rel'] . $atts['title'] . '><span style="' . implode( $span_css, ';' ) . '">' . do_shortcode( stripcslashes( $content ) ) . $desc . '</span></a>' . $after;
	}

	public static function services( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'style'				=> 'style_2',
			), $atts, 'services' );
			
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		if($atts['style'] == 'style_2'){
			return '<div class="row services style2">' . do_shortcode( $content ) . '</div>';
		}
		else {
			return '<div class="services text-center">' . do_shortcode( $content ) . '</div><!--.services-->';
		}
	}

	public static function service( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			    'style'		  => 'default',
				'title'       => __( 'Service title', 'themestall' ),
				'flat_icon'	  => '',
				'icon'        => plugins_url( 'assets/images/service.png', TS_PLUGIN_FILE ),
				'icon_color'  => '#121212',
				'size'        => 65,
				'class'       => ''
			), $atts, 'service' );
		// RTL
		$rtl = ( is_rtl() ) ? 'right' : 'left';
		// Built-in icon
		
		if ( $atts['flat_icon'] != '' ) {
			$icon = '<i class="flaticon-'.$atts['flat_icon'].' alignleft" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$icon = '<img src="' . $atts['icon'] . '" alt="' . $atts['title'] . '" class="img-responsive" />';
		}
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		if($atts['style'] == 'default'){
		return '<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
					<div class="box text-center">   
						' . $icon . '
						<h4>' . ts_scattr( $atts['title'] ) . '</h4>
						<p>' . do_shortcode( $content ) . '</p>
					</div><!-- end box -->
				</div>';
		}else{
		return '<div class="footer-box">
					' . $icon . '					
					<p><strong>' . ts_scattr( $atts['title'] ) . '</strong> ' . do_shortcode( $content ) . '</p>
				</div>';
		}
	}

	public static function box( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'       => __( 'This is box title', 'themestall' ),
				'style'       => 'default',
				'box_color'   => '#333333',
				'title_color' => '#FFFFFF',
				'color'       => null, // 3.x
				'radius'      => '3',
				'class'       => ''
			), $atts, 'box' );
		if ( $atts['color'] !== null ) $atts['box_color'] = $atts['color'];
		// Prepare border-radius
		$radius = ( $atts['radius'] != '0' ) ? 'border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;' : '';
		$title_radius = ( $atts['radius'] != '0' ) ? $atts['radius'] - 1 : '';
		$title_radius = ( $title_radius ) ? '-webkit-border-top-left-radius:' . $title_radius . 'px;-webkit-border-top-right-radius:' . $title_radius . 'px;-moz-border-radius-topleft:' . $title_radius . 'px;-moz-border-radius-topright:' . $title_radius . 'px;border-top-left-radius:' . $title_radius . 'px;border-top-right-radius:' . $title_radius . 'px;' : '';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		// Return result
		return '<div class="ts-box ts-box-style-' . $atts['style'] . ts_ecssc( $atts ) . '" style="border-color:' . ts_hex_shift( $atts['box_color'], 'darker', 20 ) . ';' . $radius . '"><div class="ts-box-title" style="background-color:' . $atts['box_color'] . ';color:' . $atts['title_color'] . ';' . $title_radius . '">' . ts_scattr( $atts['title'] ) . '</div><div class="ts-box-content ts-clearfix">' . ts_do_shortcode( $content, 'b' ) . '</div></div>';
	}

	public static function note( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'note_color' => '#FFFF66',
				'text_color' => '#333333',
				'background' => null, // 3.x
				'color'      => null, // 3.x
				'radius'     => '3',
				'class'      => ''
			), $atts, 'note' );
		if ( $atts['color'] !== null ) $atts['note_color'] = $atts['color'];
		if ( $atts['background'] !== null ) $atts['note_color'] = $atts['background'];
		// Prepare border-radius
		$radius = ( $atts['radius'] != '0' ) ? 'border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;' : '';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		return '<div class="ts-note' . ts_ecssc( $atts ) . '" style="border-color:' . ts_hex_shift( $atts['note_color'], 'darker', 10 ) . ';' . $radius . '"><div class="ts-note-inner ts-clearfix" style="background-color:' . $atts['note_color'] . ';border-color:' . ts_hex_shift( $atts['note_color'], 'lighter', 80 ) . ';color:' . $atts['text_color'] . ';' . $radius . '">' . ts_do_shortcode( $content, 'n' ) . '</div></div>';
	}

	public static function expand( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'more_text'  => __( 'Show more', 'themestall' ),
				'less_text'  => __( 'Show less', 'themestall' ),
				'height'     => '100',
				'hide_less'  => 'no',
				'text_color' => '#333333',
				'link_color' => '#0088FF',
				'link_style' => 'default',
				'link_align' => 'left',
				'more_icon'  => '',
				'less_icon'  => '',
				'class'      => ''
			), $atts, 'expand' );
		// Prepare more icon
		$more_icon = ( $atts['more_icon'] ) ? Ts_Tools::icon( $atts['more_icon'] ) : '';
		$less_icon = ( $atts['less_icon'] ) ? Ts_Tools::icon( $atts['less_icon'] ) : '';
		if ( $more_icon || $less_icon ) ts_query_asset( 'css', 'font-awesome' );
		// Prepare less link
		$less = ( $atts['hide_less'] !== 'yes' ) ? '<div class="ts-expand-link ts-expand-link-less" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $less_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['less_text'] . '</span></a></div>' : '';
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<div class="ts-expand ts-expand-collapsed ts-expand-link-style-' . $atts['link_style'] . ts_ecssc( $atts ) . '" data-height="' . $atts['height'] . '"><div class="ts-expand-content" style="color:' . $atts['text_color'] . ';max-height:' . intval( $atts['height'] ) . 'px;overflow:hidden">' . do_shortcode( $content ) . '</div><div class="ts-expand-link ts-expand-link-more" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $more_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['more_text'] . '</span></a></div>' . $less . '</div>';
	}

	public static function lightbox( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'src'   => false,
				'type'  => 'iframe',
				'class' => ''
			), $atts, 'lightbox' );
		if ( !$atts['src'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct source', 'themestall' ) );
		ts_query_asset( 'css', 'magnific-popup' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'magnific-popup' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<span class="ts-lightbox' . ts_ecssc( $atts ) . '" data-mfp-src="' . ts_scattr( $atts['src'] ) . '" data-mfp-type="' . $atts['type'] . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function lightbox_content( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'id'         => '',
				'width'      => '50%',
				'margin'     => '40',
				'padding'    => '40',
				'text_align' => 'center',
				'background' => '#FFFFFF',
				'color'      => '#333333',
				'shadow'     => '0px 0px 15px #333333',
				'class'      => ''
			), $atts, 'lightbox_content' );
		ts_query_asset( 'css', 'ts-box-shortcodes' );
		if ( !$atts['id'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct ID for this block. You should use same ID as in the Content source field (when inserting lightbox shortcode)', 'themestall' ) );
		$return = '<div class="ts-lightbox-content ' . ts_ecssc( $atts ) . '" id="' . trim( $atts['id'], '#' ) . '" style="display:none;width:' . $atts['width'] . ';margin-top:' . $atts['margin'] . 'px;margin-bottom:' . $atts['margin'] . 'px;padding:' . $atts['padding'] . 'px;background-color:' . $atts['background'] . ';color:' . $atts['color'] . ';box-shadow:' . $atts['shadow'] . ';text-align:' . $atts['text_align'] . '">' . do_shortcode( $content ) . '</div>';
		if ( did_action( 'ts/generator/preview/before' ) ) return '<div class="ts-lightbox-content-preview">' . $return . '</div>';
		else return $return;
	}

	public static function tooltip( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'        => 'yellow',
				'position'     => 'north',
				'shadow'       => 'no',
				'rounded'      => 'no',
				'size'         => 'default',
				'title'        => '',
				'content'      => __( 'Tooltip text', 'themestall' ),
				'behavior'     => 'hover',
				'close'        => 'no',
				'class'        => ''
			), $atts, 'tooltip' );
		// Prepare style
		$atts['style'] = ( in_array( $atts['style'], array( 'light', 'dark', 'green', 'red', 'blue', 'youtube', 'tipsy', 'bootstrap', 'jtools', 'tipped', 'cluetip' ) ) ) ? $atts['style'] : 'plain';
		// Position
		$atts['position'] = str_replace( array( 'top', 'right', 'bottom', 'left' ), array( 'north', 'east', 'south', 'west' ), $atts['position'] );
		$position = array(
			'my' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'bottom center', 'center left', 'top center', 'center right' ), $atts['position'] ),
			'at' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'top center', 'center right', 'bottom center', 'center left' ), $atts['position'] )
		);
		// Prepare classes
		$classes = array( 'ts-qtip qtip-' . $atts['style'] );
		$classes[] = 'ts-qtip-size-' . $atts['size'];
		if ( $atts['shadow'] === 'yes' ) $classes[] = 'qtip-shadow';
		if ( $atts['rounded'] === 'yes' ) $classes[] = 'qtip-rounded';
		// Query assets
		ts_query_asset( 'css', 'qtip' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'qtip' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return '<span class="ts-tooltip' . ts_ecssc( $atts ) . '" data-close="' . $atts['close'] . '" data-behavior="' . $atts['behavior'] . '" data-my="' . $position['my'] . '" data-at="' . $position['at'] . '" data-classes="' . implode( ' ', $classes ) . '" data-title="' . $atts['title'] . '" title="' . esc_attr( $atts['content'] ) . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function ts_private( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'private' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		return ( current_user_can( 'publish_posts' ) ) ? '<div class="ts-private' . ts_ecssc( $atts ) . '"><div class="ts-private-shell">' . do_shortcode( $content ) . '</div></div>' : '';
	}

	public static function media( $atts = null, $content = null ) {
		// Check YouTube video
		if ( strpos( $atts['url'], 'youtu' ) !== false ) return Ts_Shortcodes::youtube( $atts );
		// Check Vimeo video
		elseif ( strpos( $atts['url'], 'vimeo' ) !== false ) return Ts_Shortcodes::vimeo( $atts );
		// Image
		else return '<img src="' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" style="max-width:100%" />';
	}

	public static function youtube( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'youtube' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '?autoplay=1' : '';
		// Create player
		$return[] = '<div class="ts-youtube ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $id . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function youtube_advanced( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$params = array();
		$atts = shortcode_atts( array(
				'url'            => false,
				'width'          => 600,
				'height'         => 400,
				'responsive'     => 'yes',
				'autohide'       => 'alt',
				'autoplay'       => 'no',
				'controls'       => 'yes',
				'fs'             => 'yes',
				'loop'           => 'no',
				'modestbranding' => 'no',
				'playlist'       => '',
				'rel'            => 'yes',
				'showinfo'       => 'yes',
				'theme'          => 'dark',
				'https'          => 'no',
				'wmode'          => '',
				'class'          => ''
			), $atts, 'youtube_advanced' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		// Prepare params
		foreach ( array( 'autohide', 'autoplay', 'controls', 'fs', 'loop', 'modestbranding', 'playlist', 'rel', 'showinfo', 'theme', 'wmode' ) as $param ) $params[$param] = str_replace( array( 'no', 'yes', 'alt' ), array( '0', '1', '2' ), $atts[$param] );
		// Correct loop
		if ( $params['loop'] === '1' && $params['playlist'] === '' ) $params['playlist'] = $id;
		// Prepare protocol
		$protocol = ( $atts['https'] === 'yes' ) ? 'https' : 'http';
		// Prepare player parameters
		$params = http_build_query( $params );
		// Create player
		$return[] = '<div class="ts-youtube ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="' . $protocol . '://www.youtube.com/embed/' . $id . '?' . $params . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function vimeo( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'poster'	 => plugins_url( 'assets/images/blankmacbook.png', TS_PLUGIN_FILE ),
				'class'      => ''
			), $atts, 'vimeo' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		// Create player
		$return = '<div class="row"><div class="col-md-10 col-md-offset-1"><div class="video-laptop post-media">
					<iframe style="background: url('.$atts['poster'].') no-repeat center center;" src="'.$atts['url'].'?title=0&byline=0&portrait=0" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div></div></div>';
		// Return result
		return $return;
	}

	public static function screenr( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'screenr' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = ( preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*screenr\.com(?:[\/\w]*\/videos?)?\/([a-zA-Z0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		// Create player
		$return[] = '<div class="ts-screenr ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://screenr.com/embed/' . $id . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function dailymotion( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'autoplay'   => 'no',
				'background' => '#FFC300',
				'foreground' => '#F7FFFD',
				'highlight'  => '#171D1B',
				'logo'       => 'yes',
				'quality'    => '380',
				'related'    => 'yes',
				'info'       => 'yes',
				'class'      => ''
			), $atts, 'dailymotion' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		$id = strtok( basename( $atts['url'] ), '_' );
		// Check that url is specified
		if ( !$id ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		// Prepare params
		$params = array();
		foreach ( array( 'autoplay', 'background', 'foreground', 'highlight', 'logo', 'quality', 'related', 'info' ) as $param )
			$params[] = $param . '=' . str_replace( array( 'yes', 'no', '#' ), array( '1', '0', '' ), $atts[$param] );
		// Create player
		$return[] = '<div class="ts-dailymotion ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.dailymotion.com/embed/video/' . $id . '?' . implode( '&', $params ) . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function audio( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'width'    => 'auto',
				'title'    => '',
				'autoplay' => 'no',
				'loop'     => 'no',
				'class'    => ''
			), $atts, 'audio' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		// Generate unique ID
		$id = uniqid( 'ts_audio_player_' );
		// Prepare width
		$width = ( $atts['width'] !== 'auto' ) ? 'max-width:' . $atts['width'] : '';
		// Check that url is specified
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		ts_query_asset( 'css', 'ts-players-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'jplayer' );
		ts_query_asset( 'js', 'ts-players-shortcodes' );
		ts_query_asset( 'js', 'ts-players-shortcodes' );
		// Create player
		return '<div class="ts-audio' . ts_ecssc( $atts ) . '" data-id="' . $id . '" data-audio="' . $atts['url'] . '" data-swf="' . plugins_url( 'assets/other/Jplayer.swf', TS_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" style="' . $width . '"><div id="' . $id . '" class="jp-jplayer"></div><div id="' . $id . '_container" class="jp-audio"><div class="jp-type-single"><div class="jp-gui jp-interface"><div class="jp-controls"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-stop"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-volume-max"></span></div><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div><div class="jp-current-time"></div><div class="jp-duration"></div></div><div class="jp-title">' . $atts['title'] . '</div></div></div></div>';
	}

	public static function video( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'poster'   => false,
				'title'    => '',
				'width'    => 600,
				'height'   => 300,
				'controls' => 'yes',
				'autoplay' => 'no',
				'loop'     => 'no',
				'class'    => ''
			), $atts, 'video' );
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		$atts['url'] = ts_scattr( $atts['url'] );
		// Generate unique ID
		$id = uniqid( 'ts_video_player_' );
		// Check that url is specified
		if ( !$atts['url'] ) return Ts_Tools::error( __FUNCTION__, __( 'please specify correct url', 'themestall' ) );
		// Prepare title
		$title = ( $atts['title'] ) ? '<div class="jp-title">' . $atts['title'] . '</div>' : '';
		ts_query_asset( 'css', 'ts-players-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'jplayer' );
		ts_query_asset( 'js', 'ts-players-shortcodes' );
		// Create player
		return '<div style="width:' . $atts['width'] . 'px; max-width: 100%;"><div id="' . $id . '" class="ts-video jp-video ts-video-controls-' . $atts['controls'] . ts_ecssc( $atts ) . '" data-id="' . $id . '" data-video="' . $atts['url'] . '" data-swf="' . plugins_url( 'assets/other/Jplayer.swf', TS_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" data-poster="' . $atts['poster'] . '"><div id="' . $id . '_player" class="jp-jplayer" style="width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px; max-width: 100%;"></div>' . $title . '<div class="jp-start jp-play"></div><div class="jp-gui"><div class="jp-interface"><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-current-time"></div><div class="jp-duration"></div><div class="jp-controls-holder"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-full-screen"></span><span class="jp-restore-screen"></span><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div></div></div></div></div></div>';
	}
	
	public static function custom_video( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'poster'   => plugins_url( 'assets/images/video.jpg', TS_PLUGIN_FILE ),
				'class'    => ''
		), $atts, 'custom_video' );
		return '<video class="videoplayer" poster="'.$atts['poster'].'" autoplay="true" loop="" id="video-background">
			<!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
			<source type="video/mp4" src="'.$atts['url'].'" />
		</video>
		
		<div class="container video-indexing">
			<div class="row">
			<div class="col-md-8 col-md-offset-2">
			'.do_shortcode($content).'
			</div>
			</div><!-- end container -->
		</div>';
	}
	
	public static function custom_audio( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'class'    => ''
		), $atts, 'custom_audio' );
		return '<iframe class="soundcloud" src="https://w.soundcloud.com/player/?url='.$atts['url'].'&amp;color=fbbc25&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>';
	}

	public static function table( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'       => 'default',
				'url'   => false,
				'class' => ''
			), $atts, 'table' );
			if($atts['style'] == 'style_2'){
				$tab_class = 'table-bordered';
			} else {
				$tab_class = 'table-striped';
			}
		$return = '<div class="ts-table ' . ts_ecssc( $atts ) . ' ts-table-'. $atts['style'] .' '.$tab_class.'">';
		$return .= ( $atts['url'] ) ? ts_parse_csv( $atts['url'] ) : do_shortcode( $content );
		$return .= '</div>';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return $return;
	}

	public static function permalink( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'id' => 1,
				'p' => null, // 3.x
				'target' => 'self',
				'class' => ''
			), $atts, 'permalink' );
		if ( $atts['p'] !== null ) $atts['id'] = $atts['p'];
		$atts['id'] = ts_scattr( $atts['id'] );
		// Prepare link text
		$text = ( $content ) ? $content : get_the_title( $atts['id'] );
		return '<a href="' . get_permalink( $atts['id'] ) . '" class="' . ts_ecssc( $atts ) . '" title="' . $text . '" target="_' . $atts['target'] . '">' . $text . '</a>';
	}

	public static function members( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'message'    => __( 'This content is for registered users only. Please %login%.', 'themestall' ),
				'color'      => '#ffcc00',
				'style'      => null, // 3.x
				'login_text' => __( 'login', 'themestall' ),
				'login_url'  => wp_login_url(),
				'login'      => null, // 3.x
				'class'      => ''
			), $atts, 'members' );
		if ( $atts['style'] !== null ) $atts['color'] = str_replace( array( '0', '1', '2' ), array( '#fff', '#FFFF29', '#1F9AFF' ), $atts['style'] );
		// Check feed
		if ( is_feed() ) return;
		// Check authorization
		if ( !is_user_logged_in() ) {
			if ( $atts['login'] !== null && $atts['login'] == '0' ) return; // 3.x
			// Prepare login link
			$login = '<a href="' . esc_attr( $atts['login_url'] ) . '">' . $atts['login_text'] . '</a>';
			ts_query_asset( 'css', 'ts-other-shortcodes' );
			return '<div class="ts-members' . ts_ecssc( $atts ) . '" style="background-color:' . ts_hex_shift( $atts['color'], 'lighter', 50 ) . ';border-color:' .ts_hex_shift( $atts['color'], 'darker', 20 ) . ';color:' .ts_hex_shift( $atts['color'], 'darker', 60 ) . '">' . str_replace( '%login%', $login, ts_scattr( $atts['message'] ) ) . '</div>';
		}
		// Return original content
		else return do_shortcode( $content );
	}

	public static function guests( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'guests' );
		$return = '';
		if ( !is_user_logged_in() && !is_null( $content ) ) {
			ts_query_asset( 'css', 'ts-other-shortcodes' );
			$return = '<div class="ts-guests' . ts_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		}
		return $return;
	}

	public static function feed( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'   => get_bloginfo_rss( 'rss2_url' ),
				'limit' => 3,
				'class' => ''
			), $atts, 'feed' );
		if ( !function_exists( 'wp_rss' ) ) include_once ABSPATH . WPINC . '/rss.php';
		ob_start();
		echo '<div class="ts-feed' . ts_ecssc( $atts ) . '">';
		wp_rss( $atts['url'], $atts['limit'] );
		echo '</div>';
		$return = ob_get_contents();
		ob_end_clean();
		return $return;
	}

	public static function subpages( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'depth' => 1,
				'p'     => false,
				'class' => ''
			), $atts, 'subpages' );
		global $post;
		$child_of = ( $atts['p'] ) ? $atts['p'] : get_the_ID();
		$return = wp_list_pages( array(
				'title_li' => '',
				'echo' => 0,
				'child_of' => $child_of,
				'depth' => $atts['depth']
			) );
		return ( $return ) ? '<ul class="ts-subpages' . ts_ecssc( $atts ) . '">' . $return . '</ul>' : false;
	}

	public static function siblings( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'depth' => 1, 'class' => '' ), $atts, 'siblings' );
		global $post;
		$return = wp_list_pages( array( 'title_li' => '',
				'echo' => 0,
				'child_of' => $post->post_parent,
				'depth' => $atts['depth'],
				'exclude' => $post->ID ) );
		return ( $return ) ? '<ul class="ts-siblings' . ts_ecssc( $atts ) . '">' . $return . '</ul>' : false;
	}

	public static function menu( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'name' => false,
				'class' => ''
			), $atts, 'menu' );
		$return = wp_nav_menu( array(
				'echo'        => false,
				'menu'        => $atts['name'],
				'container'   => false,
				'fallback_cb' => array( __CLASS__, 'menu_fb' ),
				'items_wrap'  => '<ul id="%1$s" class="%2$s' . ts_ecssc( $atts ) . '">%3$s</ul>'
			) );
		return ( $atts['name'] ) ? $return : false;
	}

	public static function menu_fb() {
		return __( 'This menu doesn\'t exists, or has no elements', 'themestall' );
	}

	public static function document( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'        => '',
				'file'       => null, // 3.x
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'document' );
		if ( $atts['file'] !== null ) $atts['url'] = $atts['file'];
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		return '<div class="ts-document ts-responsive-media-' . $atts['responsive'] . '"><iframe src="//docs.google.com/viewer?embedded=true&url=' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="ts-document' . ts_ecssc( $atts ) . '"></iframe></div>';
	}

	public static function gmap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'address'    => 'New York',
				'class'      => ''
			), $atts, 'gmap' );
		ts_query_asset( 'css', 'ts-media-shortcodes' );
		return '<div class="ts-gmap ts-responsive-media-' . $atts['responsive'] . ts_ecssc( $atts ) . '"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://maps.google.com/maps?q=' . urlencode( ts_scattr( $atts['address'] ) ) . '&amp;output=embed"></iframe></div>';
	}

	public static function slider( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'     => 'none',
				'limit'      => 20,
				'gallery'    => null, // Dep. 4.3.2
				'link'       => 'none',
				'target'     => 'self',
				'width'      => 600,
				'height'     => 300,
				'responsive' => 'yes',
				'title'      => 'yes',
				'centered'   => 'yes',
				'arrows'     => 'yes',
				'pages'      => 'yes',
				'mousewheel' => 'yes',
				'autoplay'   => 3000,
				'speed'      => 600,
				'class'      => ''
			), $atts, 'slider' );
		// Get slides
		$slides = (array) Ts_Tools::get_slides( $atts );
		// Loop slides
		if ( count( $slides ) ) {
			// Prepare unique ID
			$id = uniqid( 'ts_slider_' );
			// Links target
			$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Centered class
			$centered = ( $atts['centered'] === 'yes' ) ? ' ts-slider-centered' : '';
			// Wheel control
			$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
			// Prepare width and height
			$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . intval( $atts['width'] ) . 'px;height:' . intval( $atts['height'] ) . 'px';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' ts-lightbox-gallery';
			// Open slider
			$return .= '<div id="' . $id . '" class="ts-slider' . $centered . ' ts-slider-pages-' . $atts['pages'] . ' ts-slider-responsive-' . $atts['responsive'] . ts_ecssc( $atts ) . '" style="' . $size . '" data-autoplay="' . $atts['autoplay'] . '" data-speed="' . $atts['speed'] . '" data-mousewheel="' . $mousewheel . '"><div class="ts-slider-slides">';
			// Create slides
			foreach ( $slides as $slide ) {
				// Crop the image
				$image = ts_image_resize( $slide['image'], $atts['width'], $atts['height'] );
				// Prepare slide title
				$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="ts-slider-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="ts-slider-slide">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $target . 'title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Close slides
			$return .= '</div>';
			// Open nav section
			$return .= '<div class="ts-slider-nav">';
			// Append direction nav
			if ( $atts['arrows'] === 'yes' ) $return .= '<div class="ts-slider-direction"><span class="ts-slider-prev"></span><span class="ts-slider-next"></span></div>';
			// Append pagination nav
			$return .= '<div class="ts-slider-pagination"></div>';
			// Close nav section
			$return .= '</div>';
			// Close slider
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				ts_query_asset( 'css', 'magnific-popup' );
				ts_query_asset( 'js', 'magnific-popup' );
			}
			ts_query_asset( 'css', 'ts-galleries-shortcodes' );
			ts_query_asset( 'js', 'jquery' );
			ts_query_asset( 'js', 'swiper' );
			ts_query_asset( 'js', 'ts-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Ts_Tools::error( __FUNCTION__, __( 'images not found', 'themestall' ) );
		return $return;
	}

	public static function carousel( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'     => 'none',
				'limit'      => 20,
				'gallery'    => null, // Dep. 4.3.2
				'link'       => 'none',
				'target'     => 'self',
				'width'      => 600,
				'height'     => 100,
				'responsive' => 'yes',
				'items'      => 3,
				'scroll'     => 1,
				'title'      => 'yes',
				'centered'   => 'yes',
				'arrows'     => 'yes',
				'pages'      => 'no',
				'mousewheel' => 'yes',
				'autoplay'   => 3000,
				'speed'      => 600,
				'class'      => ''
			), $atts, 'carousel' );
		// Get slides
		$slides = (array) Ts_Tools::get_slides( $atts );
		// Loop slides
		if ( count( $slides ) ) {
			// Prepare unique ID
			$id = uniqid( 'ts_carousel_' );
			// Links target
			$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Centered class
			$centered = ( $atts['centered'] === 'yes' ) ? ' ts-carousel-centered' : '';
			// Wheel control
			$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
			// Prepare width and height
			$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . intval( $atts['width'] ) . 'px;height:' . intval( $atts['height'] ) . 'px';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' ts-lightbox-gallery';
			// Open slider
			$return .= '<div id="' . $id . '" class="ts-carousel' . $centered . ' ts-carousel-pages-' . $atts['pages'] . ' ts-carousel-responsive-' . $atts['responsive'] . ts_ecssc( $atts ) . '" style="' . $size . '" data-autoplay="' . $atts['autoplay'] . '" data-speed="' . $atts['speed'] . '" data-mousewheel="' . $mousewheel . '" data-items="' . $atts['items'] . '" data-scroll="' . $atts['scroll'] . '"><div class="ts-carousel-slides">';
			// Create slides
			foreach ( (array) $slides as $slide ) {
				// Crop the image
				$image = ts_image_resize( $slide['image'], ( round( $atts['width'] / $atts['items'] ) - 18 ), $atts['height'] );
				// Prepare slide title
				$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="ts-carousel-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="ts-carousel-slide">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $target . 'title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Close slides
			$return .= '</div>';
			// Open nav section
			$return .= '<div class="ts-carousel-nav">';
			// Append direction nav
			if ( $atts['arrows'] === 'yes'
			) $return .= '<div class="ts-carousel-direction"><span class="ts-carousel-prev"></span><span class="ts-carousel-next"></span></div>';
			// Append pagination nav
			$return .= '<div class="ts-carousel-pagination"></div>';
			// Close nav section
			$return .= '</div>';
			// Close slider
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				ts_query_asset( 'css', 'magnific-popup' );
				ts_query_asset( 'js', 'magnific-popup' );
			}
			ts_query_asset( 'css', 'ts-galleries-shortcodes' );
			ts_query_asset( 'js', 'jquery' );
			ts_query_asset( 'js', 'swiper' );
			ts_query_asset( 'js', 'ts-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Ts_Tools::error( __FUNCTION__, __( 'images not found', 'themestall' ) );
		return $return;
	}

	public static function custom_gallery( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'  => 'none',
				'limit'   => 20,
				'gallery' => null, // Dep. 4.4.0
				'link'    => 'none',
				'width'   => 90,
				'height'  => 90,
				'title'   => 'hover',
				'target'  => 'self',
				'class'   => ''
			), $atts, 'custom_gallery' );
		$slides = (array) Ts_Tools::get_slides( $atts );
		// Loop slides
		$i = 1;
		if ( count( $slides ) ) {
			// Prepare links target
			$atts['target'] = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' ts-lightbox-gallery';
			// Open gallery
			$return = '<div class="ts-custom-gallery ts-custom-gallery-title-' . $atts['title'] . ts_ecssc( $atts ) . ' gallery">';
			// Create slides
			foreach ( $slides as $slide ) {

				$class_col = 'col-lg-4 col-md-4 col-xs-6';
				// Crop image
				$image = ts_image_resize( $slide['image'], $atts['width'], $atts['height'] );
				// Prepare slide title
				$title = ( $slide['title'] ) ? '<span class="ts-custom-gallery-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="ts-custom-gallery-slide single-work '.$class_col.'">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '" ' . $atts['target'] . ' title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . esc_url($image['url']) . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
				$i++;
			}
			// Clear floats
			$return .= '<div class="ts-clear"></div>';
			// Close gallery
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				ts_query_asset( 'css', 'magnific-popup' );
				ts_query_asset( 'js', 'jquery' );
				ts_query_asset( 'js', 'magnific-popup' );
				ts_query_asset( 'js', 'ts-galleries-shortcodes' );
			}
			ts_query_asset( 'css', 'ts-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Ts_Tools::error( __FUNCTION__, __( 'images not found', 'themestall' ) );
		return $return;
	}

	public static function posts( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/default-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'post_type'           => 'post',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no'
			), $atts, 'posts' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Ts_Tools::error( __FUNCTION__, __( 'template not found', 'themestall' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		return $output;
	}
	
	public static function products( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/product-loop.php',
				'section_title'		  => '',
				'show_view_all'       => 'yes',
				'view_all_text'		  => 'View All',
				'view_all_link'		  => '#',
				'show_all_features'	  => 'no',
				'show_all_features_car'	 => 'no',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'column'			  => '3',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no'
			), $atts, 'products' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => 'product',
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( TS_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Ts_Tools::error( __FUNCTION__, __( 'template not found', 'themestall' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		return $output;
	}

	public static function dummy_text( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'amount' => 1,
				'what'   => 'paras',
				'cache'  => 'yes',
				'class'  => ''
			), $atts, 'dummy_text' );
		$transient = 'su/cache/dummy_text/' . sanitize_text_field( $atts['what'] ) . '/' . intval( $atts['amount'] );
		$return = get_transient( $transient );
		if ( $return && $atts['cache'] === 'yes' && TS_ENABLE_CACHE ) return $return;
		else {
			$xml = simplexml_load_file( 'http://www.lipsum.com/feed/xml?amount=' . $atts['amount'] . '&what=' . $atts['what'] . '&start=0' );
			$return = '<div class="ts-dummy-text' . ts_ecssc( $atts ) . '">' . wpautop( str_replace( "\n", "\n\n", $xml->lipsum ) ) . '</div>';
			set_transient( $transient, $return, 60*60*24*30 );
			return $return;
		}
	}

	public static function dummy_image( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'width'  => 500,
				'height' => 300,
				'theme'  => 'any',
				'class'  => ''
			), $atts, 'dummy_image' );
		$url = 'http://lorempixel.com/' . $atts['width'] . '/' . $atts['height'] . '/';
		if ( $atts['theme'] !== 'any' ) $url .= $atts['theme'] . '/' . rand( 0, 10 ) . '/';
		return '<img src="' . $url . '" alt="' . __( 'Dummy image', 'themestall' ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="ts-dummy-image' . ts_ecssc( $atts ) . '" />';
	}

	public static function animate( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'      => 'bounceIn',
				'duration'  => 1,
				'delay'     => 0,
				'inline'    => 'no',
				'class'     => ''
			), $atts, 'animate' );
		$tag = ( $atts['inline'] === 'yes' ) ? 'span' : 'div';
		$time = '-webkit-animation-duration:' . $atts['duration'] . 's;-webkit-animation-delay:' . $atts['delay'] . 's;animation-duration:' . $atts['duration'] . 's;animation-delay:' . $atts['delay'] . 's;';
		$return = '<' . $tag . ' class="ts-animate' . ts_ecssc( $atts ) . '" style="visibility:hidden;' . $time . '" data-animation="' . $atts['type'] . '" data-duration="' . $atts['duration'] . '" data-delay="' . $atts['delay'] . '">' . do_shortcode( $content ) . '</' . $tag . '>';
		ts_query_asset( 'css', 'animate' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'inview' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		return $return;
	}

	public static function meta( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'key'     => '',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'post_id' => '',
				'filter'  => ''
			), $atts, 'meta' );
		// Define current post ID
		if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
		// Check post ID
		if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="ts-error">Meta: %s</p>', __( 'post ID is incorrect', 'themestall' ) );
		// Check key name
		if ( !$atts['key'] ) return sprintf( '<p class="ts-error">Meta: %s</p>', __( 'please specify meta key name', 'themestall' ) );
		// Get the meta
		$meta = get_post_meta( $atts['post_id'], $atts['key'], true );
		// Set default value if meta is empty
		if ( !$meta ) $meta = $atts['default'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $meta = call_user_func( $atts['filter'], $meta );
		// Return result
		return ( $meta ) ? $atts['before'] . $meta . $atts['after'] : '';
	}

	public static function user( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'field'   => 'display_name',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'user_id' => '',
				'filter'  => ''
			), $atts, 'user' );
		// Check for password requests
		if ( $atts['field'] === 'user_pass' ) return sprintf( '<p class="ts-error">User: %s</p>', __( 'password field is not allowed', 'themestall' ) );
		// Define current user ID
		if ( !$atts['user_id'] ) $atts['user_id'] = get_current_user_id();
		// Check user ID
		if ( !is_numeric( $atts['user_id'] ) || $atts['user_id'] < 1 ) return sprintf( '<p class="ts-error">User: %s</p>', __( 'user ID is incorrect', 'themestall' ) );
		// Get user data
		$user = get_user_by( 'id', $atts['user_id'] );
		// Get user data if user was found
		$user = ( $user && isset( $user->data->$atts['field'] ) ) ? $user->data->$atts['field'] : $atts['default'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $user = call_user_func( $atts['filter'], $user );
		// Return result
		return ( $user ) ? $atts['before'] . $user . $atts['after'] : '';
	}

	public static function post( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'field'   => 'post_title',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'post_id' => '',
				'filter'  => ''
			), $atts, 'post' );
		// Define current post ID
		if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
		// Check post ID
		if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="ts-error">Post: %s</p>', __( 'post ID is incorrect', 'themestall' ) );
		// Get the post
		$post = get_post( $atts['post_id'] );
		// Set default value if meta is empty
		$post = ( empty( $post ) || empty( $post->$atts['field'] ) ) ? $atts['default'] : $post->$atts['field'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $post = call_user_func( $atts['filter'], $post );
		// Return result
		return ( $post ) ? $atts['before'] . $post . $atts['after'] : '';
	}

	// public static function post_terms( $atts = null, $content = null ) {
	//  $atts = shortcode_atts( array(
	//    'post_id'  => '',
	//    'taxonomy' => 'category',
	//    'limit'    => '5',
	//    'links'    => '',
	//    'format'   => ''
	//   ), $atts, 'post_terms' );
	//  // Define current post ID
	//  if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
	//  // Check post ID
	//  if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="ts-error">Post terms: %s</p>', __( 'post ID is incorrect', 'themestall' ) );
	// }

	public static function template( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'name' => ''
			), $atts, 'template' );
		// Check template name
		if ( !$atts['name'] ) return sprintf( '<p class="ts-error">Template: %s</p>', __( 'please specify template name', 'themestall' ) );
		// Get template output
		ob_start();
		get_template_part( str_replace( '.php', '', $atts['name'] ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return result
		return $output;
	}

	public static function qrcode( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'data' => '',
				'title' => '',
				'size' => 200,
				'margin' => 0,
				'align' => 'none',
				'link' => '',
				'target' => 'blank',
				'color' => '#000000',
				'background' => '#ffffff',
				'class' => ''
			), $atts, 'qrcode' );
		// Check the data
		if ( !$atts['data'] ) return 'QR code: ' . __( 'please specify the data', 'themestall' );
		// Prepare link
		$href = ( $atts['link'] ) ? ' href="' . $atts['link'] . '"' : '';
		// Prepare clickable class
		if ( $atts['link'] ) $atts['class'] .= ' ts-qrcode-clickable';
		// Prepare title
		$atts['title'] = esc_attr( $atts['title'] );
		// Query assets
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		// Return result
		return '<span class="ts-qrcode ts-qrcode-align-' . $atts['align'] . ts_ecssc( $atts ) . '"><a' . $href . ' target="_' . $atts['target'] . '" title="' . $atts['title'] . '"><img src="https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode( $atts['data'] ) . '&size=' . $atts['size'] . 'x' . $atts['size'] . '&format=png&margin=' . $atts['margin'] . '&color=' . ts_hex2rgb( $atts['color'] ) . '&bgcolor=' . ts_hex2rgb( $atts['background'] ) . '" alt="' . $atts['title'] . '" /></a></span>';
	}

	public static function scheduler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'time'       => 'all',
				'days_week'  => 'all',
				'days_month' => 'all',
				'months'     => 'all',
				'years'      => 'all',
				'alt'        => ''
			), $atts, 'scheduler' );
		// Check time
		if ( $atts['time'] !== 'all' ) {
			// Get current time
			$now = current_time( 'timestamp', 0 );
			// Sanitize
			$atts['time'] = preg_replace( "/[^0-9-,:]/", '', $atts['time'] );
			// Loop time ranges
			foreach( explode( ',', $atts['time'] ) as $range ) {
				// Check for range symbol
				if ( strpos( $range, '-' ) === false ) return Ts_Tools::error( __FUNCTION__, sprintf( __( 'Incorrect time range (%s). Please use - (minus) symbol to specify time range. Example: 14:00 - 18:00', 'themestall' ), $range ) );
				// Split begin/end time
				$time = explode( '-', $range );
				// Add minutes
				if ( strpos( $time[0], ':' ) === false ) $time[0] .= ':00';
				if ( strpos( $time[1], ':' ) === false ) $time[1] .= ':00';
				// Parse begin/end time
				$time[0] = strtotime( $time[0] );
				$time[1] = strtotime( $time[1] );
				// Check time
				if ( $now < $time[0] || $now > $time[1] ) return $atts['alt'];
			}
		}
		// Check day of the week
		if ( $atts['days_week'] !== 'all' ) {
			// Get current day of the week
			$today = date( 'w', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['days_week'] = preg_replace( "/[^0-9-,]/", '', $atts['days_week'] );
			// Parse days range
			$days = Ts_Tools::range( $atts['days_week'] );
			// Check current day
			if ( !in_array( $today, $days ) ) return $atts['alt'];
		}
		// Check day of the month
		if ( $atts['days_month'] !== 'all' ) {
			// Get current day of the month
			$today = date( 'j', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['days_month'] = preg_replace( "/[^0-9-,]/", '', $atts['days_month'] );
			// Parse days range
			$days = Ts_Tools::range( $atts['days_month'] );
			// Check current day
			if ( !in_array( $today, $days ) ) return $atts['alt'];
		}
		// Check month
		if ( $atts['months'] !== 'all' ) {
			// Get current month
			$now = date( 'n', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['months'] = preg_replace( "/[^0-9-,]/", '', $atts['months'] );
			// Parse months range
			$months = Ts_Tools::range( $atts['months'] );
			// Check current month
			if ( !in_array( $now, $months ) ) return $atts['alt'];
		}
		// Check year
		if ( $atts['years'] !== 'all' ) {
			// Get current year
			$now = date( 'Y', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['years'] = preg_replace( "/[^0-9-,]/", '', $atts['years'] );
			// Parse years range
			$years = Ts_Tools::range( $atts['years'] );
			// Check current year
			if ( !in_array( $now, $years ) ) return $atts['alt'];
		}
		// Return result (all check passed)
		return do_shortcode( $content );
	}
	
	//Featured lists shortcode
	public static function featured_lists( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'title' 		=> '',
				'desc'			=> '',
			), $atts, 'featured_lists' );

		$html = '';
		$html .='<div class="featured-lists">';
					if($atts['title'] != ''){
					$html .='<h3>'.force_balance_tags($atts['title']).'</h3>';
					}
					$html .='<ul class="feature-list">'.do_shortcode($content).'</ul>
				</div>';
		return $html;
	}
	
	//Featured list shortcode
	public static function featured_list( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'style'			=> 'default',
				'title' 		=> '',
				'desc'			=> '',
				'ic_icon'		=> '',
				'icon' 			=> '',
				'size'			=> '',
				'icon_color'	=> '',
			), $atts, 'featured_list' );
			
			$class = '';
			if($atts['style'] == 'style_2'){
				$class = ' alignleft';
			}

		if($atts['ic_icon'] != ''){
			$icon = '<span class="oi'.$class.'" data-glyph="'.esc_attr($atts['ic_icon']).'" style="color:' . $atts['icon_color'] . '; font-size:' . esc_attr($atts['size']) . 'px;"></span>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $icon = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		
		if($atts['style'] == 'style_2'){
			return '<div class="wow fadeIn featured-list" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="widget clearfix">
                            '.$icon.'
                            <div class="widget-title">
                                <h3>'.force_balance_tags($atts['title']).'</h3>
                                <hr>
                            </div>
                            <!-- end title -->
                            <p>'.esc_attr($atts['desc']).'</p>
                        </div>
                        <!--widget -->
                    </div>';
		} else{
		return '<div class="widget clearfix wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
					'.$icon.'
					<div class="widget-title">
						<h3>'.force_balance_tags($atts['title']).'</h3>
						<hr>
					</div><!-- end title -->
					<p>'.esc_attr($atts['desc']).'</p>
				</div>';
		}
	}
	
	
	public static function testimonials( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'style'		=> 'default',
			), $atts, 'testimonials' );
			
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		if($atts['style'] == 'style_3'){
			return '<div class="row testi-style-2">'.do_shortcode($content).'</div>';
		}elseif($atts['style'] == 'style_2'){
			return '<div class="testi-carousel owl-carousel owl-theme custom-list">'.do_shortcode($content).'</div><!--#owl-testimonial-->';
		} else{
			return '<div class="row-fluid custom-list">'.do_shortcode($content).'</div>';
		}
		
	}

	public static function testimonial( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'		=> 'default',
				'name' 		=> 'Nikar avlley',
				'title' 	=> 'rtp',
				'title_color' => '#27293d',
				'site' 		=> 'Wikipedia',
				'site_link'	=> '#',
				'image'		=> '',
				'text_color'=> '#676767',
			), $atts, 'testimonial' );
		
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		
		$class = '';
		if($atts['style'] != 'style_3'){
			$class = 'alignleft';
		}
		if($atts['image'] != ''){
			$image_url = ts_image_resize( esc_url($atts['image']), 365, 370 );
			$image ='<img src="'.$image_url['url'].'" alt="testi-image"  class="img-responsive img-circle wow fadeIn '.$class.'" data-wow-duration="1s" data-wow-delay="0.2s" />';
		}
		
		$html = '';
		if($atts['style'] == 'style_3'){
			$html .= '<div class="col-md-4">
                        <div class="testibox">'.$image.'
                            <br>
                            <p style="color: '.$atts['text_color'].';">' . do_shortcode($content) . '</p>
                            <h4 style="color: '.$atts['title_color'].';">'.$atts['name'].'</h4>
                            <small style="color: '.$atts['text_color'].';">'.$atts['title'].' at <a href="'.$atts['site_link'].'" style="color: '.$atts['text_color'].';">'.$atts['site'].'</a></small>
                        </div>
                    </div>';
		}elseif($atts['style'] == 'style_2'){
			$html .='<div class="carousel-item">
                        <div class="testibox">
                            '.$image.'
                            <p>' . do_shortcode($content) . '</p>
                            <h4>'.$atts['name'].'</h4>
                            <small>'.$atts['title'].' at <a href="'.$atts['site_link'].'">'.$atts['site'].'</a></small>
                        </div>
                    </div>';
		} else{
		$html .='<div class="col-md-6 col-sm-6">
					<div class="testibox">'.$image.'
						<p style="color: '.$atts['text_color'].';">' . do_shortcode($content) . '</p>
						<h4 style="color: '.$atts['title_color'].';">'.$atts['name'].'</h4>
						<small style="color: '.$atts['text_color'].';">'.$atts['title'].' at <a href="'.$atts['site_link'].'" style="color: '.$atts['text_color'].';">'.$atts['site'].'</a></small>
					</div>
				</div>';
		}
		
		return $html; 
	}
	
	public static function frame_message( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'title'			=> '',
				'sub_title'		=> '',
				'button_text'	=> '',
				'button_link'	=> '',
				'class' 		=> '',
				), $atts, 'frame_message' );
		
		return '<div class="frameT"><div class="frameTC">
		<div class="row text-center">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 centermessage">
				<h2>' . $atts['sub_title'] . '</h2>
				<h1>' . $atts['title'] . '</h1>
				<p>'.do_shortcode($content).'</p> 
				<div class="large-buttons">
					<a target="_blank" href="' . $atts['button_link'] . '" class="btn btn-primary btn-lg">' . $atts['button_text'] . '</a>
				</div><!-- end title -->
			</div>
		</div>
		</div>
		</div>';
	}
	
	public static function icons( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'icon' 			=> '',
				'icon_color' 	=> '#333333',
				'font_size'		=> 40,
				'icon_align'	=> 'center',
				'class' 		=> '',
				), $atts, 'icons' );
		if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '; font-size:' . $atts['font_size'] . 'px;"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		
		return '<span class="icons-font '.$atts['class'].'" style="text-align: '.$atts['icon_align'].'">' . $atts['icon'] . '</span>';
	}
	
	public static function icons_info( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'icon' 			=> '',
				'icon_color' 	=> '',
				'font_size'		=> 28,
				'title'			=> 'Australia Office',
				'icon_des'		=> 'PO Box 16122 Collins Street West Victoria',
				'class' 		=> '',
				), $atts, 'icons_info' );
		if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '; font-size:' . $atts['font_size'] . 'px;"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		
		return '<div class="col-md-3 col-sm-6 col-xs-12 contact-informations padding-zero">
				<div class="fun-facts text-center">
					<span class="fun-icon">' . $atts['icon'] . '</span>
					<h3>' . $atts['title'] . '</h3>
					<p>' . $atts['icon_des'] . '</p>
				</div>
				</div><!-- end service-box -->';
	}
	
	public static function counters( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'title' 		=> '',
				'class' 		=> '',
				), $atts, 'counters' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		
		$title = '';
		if($atts['title'] != ''){
			$title = '<h4 class="count-tit">' .$atts['title']. '</h4>'; 
		}
		return '
		<div class="counter-wrap ' .$atts['class']. '">
			<div class="container">
				<div class="row margin-zero">
					<div class="col-sm-12 padding-zero">
						' .$title. '
						' .do_shortcode( $content ). '						
					</div>
				</div> 
			</div> 
		</div>';		
	}
	
	public static function counter_up( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(			
				'number' 		=> 1000,
				'title'			=> '',
				'flat_icon'	    => '',
				'icon' 			=> '',
				'icon_color' 	=> '#f18167',
				'font_size'		=> 28,
				'class' 		=> '',
				), $atts, 'counter_up' );

		
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		if ( $atts['flat_icon'] != '' ) {
			$icon = '<i class="flaticon-'.$atts['flat_icon'].'" style="font-size:' . $atts['font_size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '; font-size:' . $atts['font_size'] . 'px;"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		else $icon = '<img src="' . $atts['icon'] . '" alt="" />';
		ts_query_asset( 'css', 'ts-content-shortcodes' );
		
		return '<div class="stat-wrap text-center">
					'.$icon.'
					<p class="count-number" data-count="' .esc_html($atts['number']). '"><span class="counter">' .esc_html($atts['number']). '</span></p>
					<small>'.$atts['title'].'</small>
				</div>';
	}
	
	public static function partners( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'style' => 'default',
				), $atts, 'partners' );
		
		return '<div id="owl-client" class="owl-client clients '.$atts['style'].'">' . do_shortcode( $content ) . '</div>';		
	}
	
	public static function partner( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'image' 		=> '',
				'image_link' 	=> '#',
				'class'			=> '',
				), $atts, 'partner' );
				
		if( $atts['image'] != '' ){
			$image = '<a href="'.esc_url($atts['image_link']).'"><img src="'.esc_url($atts['image']).'" alt="Client-logo" class="img-responsive"></a>';
			}else{
			$image = '';
		}
		
		$return = '<div class="client-logo">'.$image.'</div>';
		
		//ts_query_asset( 'css', 'animate' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'inview' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		
		return $return;
		
	}
	
	public static function bg_map( $atts = null, $content = null ){
		$atts = shortcode_atts( array(
				'title'        		=> 'Find on Map',
				'latitude' 			=> '-37.815994',
				'longitude'			=> '144.952676',
				'marker_image'		=> plugins_url( 'assets/images/marker.png', TS_PLUGIN_FILE ),
				'maker_title'		=> 'New York',
				'maker_description'	=> 'Our office in the mitte',
				'height'			=> 500,
			), $atts, 'bg_map' );
			ts_query_asset( 'js', 'bg-map' );
		$output = '';
		$output .='<div class="car-details-box clearfix">
                <h3 class="car-single-title">
                    <i class="flaticon-earth-grid-select-language-button"></i>'.$atts['title'].'
                </h3>
                <div class="similar_map_wrap_container mini-map widget clearfix" style="height: ' .esc_attr($atts['height']). 'px">
					<div class="googlemap">
						<div id="similar_map_wrap" style="height: ' .esc_attr($atts['height']). 'px" class="g_map google-map" data-latitude="' .esc_attr($atts['latitude']). '" data-longitude="' .esc_attr($atts['longitude']). '" data-marker="' .esc_attr($atts['marker_image']). '" data-title="' .esc_attr($atts['maker_title']). '" data-description="' .esc_attr($atts['maker_description']). '"></div>
					</div>
                </div>
            </div>';
		return $output;
	}
	
	public static function banner_slider($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'source'        => '',
				'previous_image' => '',
				'next_image' => '',
				'width' => 1400,
				'height' => 700,
				'class'        	=> '',
			), $atts, 'banner_slider' );
			
			$output = '';
			$width = $atts['width'];
			$height = $atts['height'];		
			$slides = (array) Ts_Tools::get_slides( $atts );
			if ( count( $slides ) ) {
				$output .= '<div class="banner-slider" data-prev="'.$atts['previous_image'].'" data-next="'.$atts['next_image'].'">';			
			// Create slides
			foreach ( $slides as $slide ) {
				// Crop image
				$i = 1;
				//$image = $slide['image'];
				$arr = ts_image_resize( esc_url($slide['image']), $width, $height );
				$output .= '<div class="item"><img src="' .$arr['url']. '" alt="slider '.$i.'" /></div>';				
				$i++;
			}
			
			$output .= '</div>';
			

		} else $output = Ts_Tools::error( __FUNCTION__, __( 'images not found', 'ts' ) );
		
		return $output;
	}
	
	public static function contact_address($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'ic_icon'		=> '',
			'icon'        	=> '',
			'size'			=> '',
			'color'			=> '',
			'icon_title'	=> '',
			'title'			=> '',
			'address' 		=> '',
		), $atts, 'contact_address' );
		
		$output = '';
		
		// Built-in icon
		if($atts['ic_icon'] != ''){
			$icon = '<span class="oi" data-glyph="'.esc_attr($atts['ic_icon']).'" style="color:' . $atts['color'] . '; font-size:' . esc_attr($atts['size']) . 'px;"></span>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', esc_attr($atts['icon']) ) ) . '" style="font-size:' . esc_attr($atts['size']) . 'px; color: ' . esc_attr($atts['color']) . ';"></i>';
			ts_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$icon = '<img src="' . esc_url($atts['icon']) . '" width="' . esc_attr($atts['size']) . '" height="' . esc_attr($atts['size']) . '" alt="" />';
		}
			
		$output .='<div class="about-widget clearfix">
						'.$icon.'
						<div class="widget-title">
							<h3>'.$atts['icon_title'].'</h3>
							<hr>
						</div><!-- end title -->
						<div class="education-widget">
							<ul>
								<li>
									<h3>'.$atts['title'].'</h3>
									<p>'.$atts['address'].'</p>
								</li>
							</ul><!-- end ul -->
						</div><!-- end education-widget -->
					</div>';
			
		return $output;
	}
	
	public static function bg_content($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'bg'        	=> '',
		), $atts, 'bg_content' );
		
		$output = '<div class="ts-bg-content" style="background: url('.esc_url($atts['bg']).');">
		<div class="ts-bg-content-main">'.do_shortcode($content).'</div>
		</div>';
			
		return $output;
	}
	
	
	public static function text_color($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'color'        	=> '#ef4416',
		), $atts, 'text_color' );
		
		$output = '<span class="ts-text-color" style="color: '.$atts['color'].';">'.do_shortcode($content).'</span>';
			
		return $output;
	}
	
	public static function typed($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'color'        	=> '#27293d',
			'text1'			=> '',
			'text2'			=> '',
			'text3'			=> '',
			'text4'			=> '',
		), $atts, 'typed' );
		
		$output = '<span class="element" data-text1="'.$atts['text1'].'" data-text2="'.$atts['text2'].'" data-text3="'.$atts['text3'].'" data-text4="'.$atts['text4'].'" style="color: '.$atts['color'].';"></span>';
			
		return $output;
	}
	
	public static function title_subtitle( $atts = null, $content = null ) {
		// Parse attributes
		$atts = shortcode_atts( array(				
				'title'				=> '',
				'title_font_size'	=> '55',
				'subtitle'			=> '',
				'margin_bottom'		=> '45',
			), $atts, 'title_subtitle' );
		
		$output = '';
		$output .='<div class="section-big-title text-center" style="margin-bottom: '.$atts['margin_bottom'].'px;">
                    <h3 style="font-size: '.$atts['title_font_size'].'px;">'.esc_html($atts['title']).'</h3>';
		if($atts['subtitle'] != ''){
			$output .='<p>'.esc_html($atts['subtitle']).'</p>';
		}
        $output .='</div>';
		
		return $output;
	}
	
	public static function color_overlay( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'background' => '#000000',
				'opacity' => '0.5',
				'display_style'	=> 'normal',
			), $atts, 'color_overlay' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );

		$background_color = $atts['background'];
		$background = ts_hex2rgb($atts['background'], ',');
		return '<div class="ts-background-overlay overlay_'.$atts['display_style'].'" style="background:rgba('.$background.', '.$atts['opacity'].');"></div>';
	}
	
	public static function team( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'				=> 'default',
				'name' 				=> 'John DOE',
				'title' 			=> 'Web Designer',
				'image' 			=> '',
				'facebook_link'		=> '',
				'twitter_link'		=> '',
				'linked_in_link'	=> '',		
			), $atts, 'team' );
		
		
			if( $atts['image'] != '' ){
				$arr = ts_image_resize( esc_url($atts['image']), 369, 377 );
				$image = '<img src="'.esc_url($arr['url']).'" alt="'.esc_attr($atts['name']).'" class="img-responsive">';
			}else{
				$image = '';
			}
		
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		
		if($atts['style'] == 'style_2'){
		$html = '<div class="row">
			<div class="col-md-4">
				<div class="team-member-img">'.$image.'
				</div>
			</div>
			<div class="col-md-8">
				<div class="single-team-member">
					<div class="team-member-name">
						<p>'.esc_html($atts['name']).'</p>
						<span>'.esc_html($atts['title']).'</span>
					</div>
					<p>'.do_shortcode($content).'</p>
					<div class="team-member-link">';
						if($atts['facebook_link'] != ''){
							$html .='<a href="'.$atts['facebook_link'].'"><i class="fa fa-facebook"></i></a>';
							}
							if($atts['twitter_link'] != ''){
							$html .='<a href="'.$atts['twitter_link'].'"><i class="fa fa-twitter"></i></a>';
							}
							if($atts['linked_in_link'] != ''){
							$html .='<a href="'.$atts['linked_in_link'].'"><i class="fa fa-linkedin"></i></a>';
						}
					$html .='</div>
				</div>
			</div>
		</div>';
		} else{

		$html = '
		<div class="single-team-member">
			<div class="team-member-img">'.$image.'
			</div>
			<div class="team-member-name">
				<p>'.esc_html($atts['name']).'</p>
				<span>'.esc_html($atts['title']).'</span>
			</div>
			<p>'.do_shortcode($content).'</p>
			<div class="team-member-link">';
				if($atts['facebook_link'] != ''){
				$html .='<a href="'.$atts['facebook_link'].'"><i class="fa fa-facebook"></i></a>';
				}
				if($atts['twitter_link'] != ''){
				$html .='<a href="'.$atts['twitter_link'].'"><i class="fa fa-twitter"></i></a>';
				}
				if($atts['linked_in_link'] != ''){
				$html .='<a href="'.$atts['linked_in_link'].'"><i class="fa fa-linkedin"></i></a>';
				}				
			$html .='</div>
		</div>';
		}
		
		return $html;
	}
	
	public static function socials_icons($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'style'     => 'default',
			), $atts, 'socials_icons' );
			
			return '<ul class="social-links list-inline">'.do_shortcode($content).'</ul><!-- end social -->';
	}
	
	public static function socials_icon($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'name'     => 'facebook',
				'link'      => '#',
				'icon'     => 'icon:facebook',
				'size'		=> 12
			), $atts, 'socials_icon' );
			
			$output = '';
			
			$line_height = $atts['size']*2;
			
			if($atts['link'] != '' && $atts['name']){
			$output .='<li class="icon ' .trim( str_replace( 'icon:', '', $atts['icon'] ) ). '"><a href="' .esc_url($atts['link']). '" style="font-size: ' .$atts['size']. 'px; line-height: ' .$line_height. 'px;">';
				if ( $atts['icon'] ) {
					if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
						$output .= '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '"></i>';
						ts_query_asset( 'css', 'font-awesome' );
					}
					else $output .= '<img src="' . esc_url($atts['icon']) . '" alt="social icon" />';
				}
			$output .= '</a>
            </li>';
			}
		return $output;
	}
	
	public static function callout($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'title'     		=> '',
				'button_link'      	=> '#',
				'button_text'     	=> '',
			), $atts, 'callout' );
			
			$output = '';
			
			$output .='<div class="welcomebox customwidget post-padding">   
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <h2>'.$atts['title'].'</h2>
                            <p>'.do_shortcode($content).'</p>
                        </div><!-- end col -->
                        <div class="col-md-3 col-sm-3 col-xs-12 text-right">
                            <a href="' .esc_url($atts['button_link']). '" class="btn btn-primary">'.$atts['button_text'].'</a>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end callout -->';
		return $output;
	}
	
	public static function alert_box( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'type' => 'success',
				'text' => 'Success confirmation message here',
			), $atts, 'alert_box' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		ts_query_asset( 'css', 'font-awesome' );
		ts_query_asset( 'js', 'jquery' );
		ts_query_asset( 'js', 'ts-other-shortcodes' );
		
		if($atts['type'] == 'success'){
			$icon = 'check';
		} elseif($atts['type'] == 'danger'){
			$icon = 'times';
		} elseif($atts['type'] == 'warning'){
			$icon = 'exclamation-triangle';
		}  elseif($atts['type'] == 'info'){
			$icon = 'exclamation';
		}

		return '<div class="alert alert-'.$atts['type'].' alert-dismissible" role="alert">
		<span class="alert-icon"><i class="fa fa-'.$icon.'"></i></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$atts['text'].'</div>';
	}
	
	public static function title_span_box( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'				=>'style_1',
				'title' 			=> '',
				'title_color'		=> '#ffffff',
				'title_size'		=> '40',
				'span_content' 		=> '',
				'span_color'		=> '',
				'span_size'			=> '',
				'description'		=> '',
				'des_color'			=> '#fff',
				'box_align'			=> 'box-right'
			), $atts, 'title_span_box' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		if($atts['style'] == 'style_2'){
			return '<div class="title-span-box '.$atts['box_align'].' '.$atts['style'].'">
			<p style="color: '.$atts['des_color'].';">'.$atts['description'].'</p>
			<h2 class="title-span" style="font-size: '.$atts['title_size'].'px; color: '.$atts['title_color'].';">			
			'.$atts['title'].'
			<span class="title-content-span" style="font-size: '.$atts['span_size'].'px; color: '.$atts['span_color'].';">'.$atts['span_content'].'</span>
			</h2>
			'.do_shortcode($content).'</div>';
		} else{		
			return '<div class="title-span-box '.$atts['box_align'].'">
			<h2 class="title-span" style="font-size: '.$atts['title_size'].'px; color: '.$atts['title_color'].';">'.$atts['title'].'
			<span class="title-content-span" style="font-size: '.$atts['span_size'].'px; color: '.$atts['span_color'].';">'.$atts['span_content'].'</span></h2>
			<p style="color: '.$atts['des_color'].';">'.$atts['description'].'</p>'.do_shortcode($content).'</div>';
		}
	}
	
	public static function countdown( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'date' 			=> '2016/12/12',
			), $atts, 'countdown' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		return '<ul class="countdown list-inline counters" data-date="'.$atts['date'].'"></ul>';
	}
	
	public static function offer( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'title' 			=> '',
				'desc'				=> '',
				'button_text'		=>'Start Here',
				'form_action'		=>'#',
			), $atts, 'offer' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		return '
		<div class="customwidget text-left w40 ts-offer-list">
			<h3 class="widget-title">'.$atts['title'].'</h3>
			<h4>'.$atts['desc'].'</h4>
			<form action="'.$atts['form_action'].'">
				'.do_shortcode($content).'
				<input type="submit" value="'.$atts['button_text'].'" class="btn btn-primary btn-block" />
			</form>     
		</div><!-- end newsletter -->';
	}
	
	public static function offer_list( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'title' 			=> '',
			), $atts, 'offer_list' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		return '<div class="checkbox checkbox-warning">
					<input name="checkbox1" type="checkbox" class="styled" checked>
					<label>'.$atts['title'].'</label>
				</div>';
	}
	
	public static function bg_animation( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'image'					=> '',
				'animation' 			=> 'slideInRight',
				'height'				=> '',
				'width'					=> '',
				'left'					=> '',
				'top'					=> '',
				'right'					=> '',
				'bottom'				=> '',
			), $atts, 'bg_animation' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );
		
		$css = '';
		$css .='height: '.$atts['height'].'px;';
		$css .='width: '.$atts['width'].'px;';
		$css .='background: url('.$atts['image'].') no-repeat scroll center center;';
		if($atts['left'] != ''){
			$css .='left: '.$atts['left'].'%;';
		}
		if($atts['top'] != ''){
			$css .='top: '.$atts['top'].'px;';
		}
		if($atts['right'] != ''){
			$css .='right: '.$atts['right'].'%;';
		}
		if($atts['bottom'] != ''){
			$css .='bottom: '.$atts['bottom'].'px;';
		}

		return '<div class="macbook-wrap hidden-sm hidden-xs wow '.$atts['animation'].'" style="'.$css.'"></div>';
	}
	
	public static function superslides( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'class' 			=> '',
			), $atts, 'superslides' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		return '<div id="superslides">
		<ul class="slides-container">'.do_shortcode($content).'</ul>
		<nav class="slides-navigation hidden-xs">
			<a href="#" class="next"><i class="fa fa-angle-right fa-2x"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left fa-2x"></i></a>
		</nav>
		</div>';
	}
	
	public static function superslide( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'image'				=> '',
				'title' 			=> '',
				'description' 		=> '',
			), $atts, 'superslide' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		return '<li>
					<img src="'.$atts['image'].'" alt="">
					<div class="general-content">
						<div class="general-text">
							<p class="lead">'.$atts['description'].'</p>
							<h2>'.$atts['title'].'</h2>
						</div>
					</div>
				</li>';
	}
	
	public static function faqs( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'title' 			=> '',
				'description' 		=> '',
			), $atts, 'faqs' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		return '<div class="question">
				<h3><strong>Q:</strong> '.$atts['title'].'</h3>
				<p>'.$atts['description'].'</p>
				</div>';
	}
	
	public static function products_search( $atts = null, $content = null ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'					=> 'default',
				'button_text' 			=> 'E.g: Herta Berlin Hotel',
				'search_title'			=> ''
			), $atts, 'products_search' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		$terms = get_terms( 'product_cat', array( 'hide_empty' => false, 'parent' => 0 ) );
		$html = '';
		if($atts['style'] == 'style_2'){
			$html .= '<div class="sidebar restaurant-sidebar position-relative">
						<div class="widget clearfix">
							<div class="ribbon"><span>SEARCH</span></div>
							<div class="widget-title">
								<h4>'.$atts['search_title'].'</h4>
								<hr>
							</div>
			
			<div class="search-top home-two-search clearfix"><form class="form-inline site-search" action="'.get_permalink( wc_get_page_id( 'shop' ) ).'" method="get" role="search">
					<div class="form-group">
						<input type="hidden" name="post_type" value="product" />
						<input type="text" class="form-control" name="s" value="'.get_search_query().'" placeholder="'.$atts['button_text'].'">
					</div>

					<div class="form-group clearfix text-center">';
							$i = 1;
							foreach ( $terms as $term ){
								$checked = '';
								if($i == 1){
									$checked = 'checked';
								}
								$html .='<div class="checkbox checkbox-primary">
								<input type="radio" id="checkbox'.$i.'" name="product_cat_select" value="'.esc_html($term->slug).'" '.$checked.'>
							<label for="checkbox'.$i.'">
								&nbsp;&nbsp;'.esc_html($term->name).'
							</label></div>';
							$i++;								
							}
						$html .= '
					</div>
					<div class="input-group-addon">
						<button class="btn btn-primary btn-block" type="submit"><span>Search</span></button>
					</div>
				</form></div>
				
				</div></div>';
		} else{
		$html .= '<div class="widget clearfix product-search"><form class="form-inline site-search" action="'.get_permalink( wc_get_page_id( 'shop' ) ).'" method="get" role="search">
					<div class="form-group">
						<div class="input-group">
							<input type="hidden" name="post_type" value="product" />
							<input type="text" class="form-control" name="s" value="'.get_search_query().'" placeholder="'.$atts['button_text'].'">
							<div class="input-group-addon">
								<button class="btn btn-primary" type="submit"><span>Search</span> &nbsp;<i class="flaticon-search"></i></button>
							</div>
						</div>
					</div>

					<div class="form-group clearfix text-center">';
							$i = 1;
							foreach ( $terms as $term ){
								$checked = '';
								if($i == 1){
									$checked = 'checked';
								}
								$html .='<div class="checkbox checkbox-primary">
								<input type="radio" id="checkbox'.$i.'" name="product_cat_select" value="'.esc_html($term->slug).'" '.$checked.'>
							<label for="checkbox'.$i.'">
								&nbsp;&nbsp;'.esc_html($term->name).'
							</label></div>';
							$i++;								
							}
						$html .= '
					</div>
				</form></div>';
		}
	return $html;
	}
	
	public static function agencies( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'per_page'		=> '12',
				'column' 		=> '3',
				'nav'			=> 'yes',
			), $atts, 'agencies' );
		ts_query_asset( 'css', 'ts-other-shortcodes' );

		$html = '<div class="row list-items">';
		
		$limit = $atts['per_page'];
		$current_page = max( 1, get_query_var('paged') );
		$offset = ($current_page - 1) * $limit;
		
		$number_of_contributor = (int)count(get_users('role=contributor'));
		
		$user_query = new WP_User_Query( array( 'role' => 'contributor','number' => $limit, 'paged' => 1, 'order' => 'ASC', 'orderby' => 'display_name', 'offset' => $offset ) );
		
		$total_pages =  ceil( $number_of_contributor / $limit ) ;
		$users = get_users('role=contributor');
		$query_contributor = get_users('role=contributor&offset='.$offset.'&number='.$limit);
		// Get the results
		$authors = $user_query->get_results();
		
		$column = 12/$atts['column'];
		// Check for results
		if (!empty($authors)) {
			// loop through each author
			$i = 2;
			foreach ($authors as $author){
				// get all the user's data
				$author_info = get_userdata($author->ID);
				$html .= '<div class="col-md-'.$column.' wow fadeIn" data-wow-duration="1s" data-wow-delay="0.'.$i.'s">
                        <div class="award-details awards-wrapper">
                            <div class="site-publisher clearfix">
							'.get_avatar( $author->ID, 60 ).'
                                <a href="'.esc_url(get_author_posts_url( $author->ID )).'" title=""><h4>'.esc_html($author_info->display_name );
								
								if(get_user_meta( $author->ID, 'country', true )){
									$html .= '<small>' .esc_html__(' from', 'themestall').'</small> <span>'.get_user_meta( $author->ID, 'country', true ).'</span>';
								}
								$html .= '</h4></a>
                                <small>'.get_user_meta( $author->ID, 'designation', true ).'</small>
                            </div><!-- end publisher -->
                        </div><!-- end details -->
                    </div><!-- end col -->';
			$i++;
			}
		
		} else {
			$html .= esc_html__('No authors found', 'themestall');
		}
		
		if($atts['nav'] == 'yes'){
		$html .= '<nav class="agency-pagination clearfix"><div class="pagination">';
		$html .= paginate_links( array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => 'page/%#%/',
			'prev_text' => __('&laquo;'), // text for previous page
			'next_text' => __('&raquo;'), // text for next page
			'current' => max( 1, get_query_var('paged') ),
			'total' => $total_pages,
		 
		) );
		$html .= '</div></nav>';
		}
	
        $html .= '</div>';
				
		return $html;
	}
	
}

new Ts_Shortcodes;

class ThemeStall_Shortcodes_Shortcodes extends Ts_Shortcodes {
	function __construct() {
		parent::__construct();
	}
}
