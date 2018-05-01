<?php
function truvatour_styling_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'preset_color',
        'label'       => esc_html__( 'Preset Color', 'truvatour' ),
        'desc'        => esc_html__( 'Main preset color', 'truvatour' ),
        'std'         => '#f18167',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.section-big-title hr,
							.cdetails p:hover i,
							.restaurant-list .magni-desc a:hover,
							.ribbon_alt span,
							.car-list-wrap .list-categories li:hover,
							.list-grid a.active,
							.car-sidebar .search-top .bootstrap-select.btn-group .dropdown-menu li:hover a,
							.slider-selection,
							.modal .close,
							.pagination > li > a:hover,
							.pagination > li > span:hover,
							.pagination > li > a:focus,
							.pagination > li > span:focus,
							.navbar-default .navbar-toggle,
							.navbar-default .navbar-toggle:hover,
							.navbar-default .navbar-toggle:focus,
							.car-wrapper .list-inline li,
							.car-price,
							.invis-title,
							.btn-primary,
							.owl-custom .owl-nav [class*="owl-"]:hover,
							.owl-custom .owl-nav [class*="owl-"]:focus,
							.topbar .dropdown-menu li:hover a,
							.topbar .dropdown-menu li:focus a,
							.more-link,
							.bootstrap-datetimepicker-widget td span:hover,
							.bootstrap-datetimepicker-widget thead tr:first-child th:hover,
							.bootstrap-datetimepicker-widget td.day:hover,
							.bootstrap-datetimepicker-widget td.hour:hover,
							.bootstrap-datetimepicker-widget td.minute:hover,
							.bootstrap-datetimepicker-widget td.second:hover,
							.bootstrap-datetimepicker-widget td.active,
							.bootstrap-datetimepicker-widget td.active:hover,
							.widget-title hr,
							.search-form .search-submit,
							.tnp-submit,.pagination > li.current > a',
                'property'   => 'background-color'
                ),
                array(
                'selector' => '.lightbox .box h4,
							.question h3 strong,
							.welcome-text a,
							.normal-register .col-register h4,
							.sitemap-title,
							.intro h1,
							.media-body h5 a,
							.authorbox a,
							.closed,
							.blog-meta ul li i,
							.comments-list .media h5,
							.restaurant-list .cruise-span a,
							.vehicle-price strong,
							.agent-contact a,
							.car-single-title i,
							.sidebar .twitter-posts a,
							.breadcrumb > li a,
							.shop-top p a,
							.mapbox-wrap small,
							.copyrights a,
							.stat-wrap i,
							.copyrights a:hover,
							.calloutbox h2 strong,
							.topbar ul li i,
							.navbar-default .navbar-nav > .open > a, 
							.navbar-default .navbar-nav > .open > a:hover, 
							.navbar-default .navbar-nav > .open > a:focus,
							.navbar-toggle,
							.navbar .navbar-toggle:hover,
							.small-title-area i,
							.navbar .navbar-toggle:focus,
							.navbar .dropdown-menu li > a:hover,
							.navbar.navbar-default .dropdown-menu li > a:hover,
							.navbar .dropdown-menu li > a:focus,
							.navbar.navbar-default .dropdown-menu li > a:focus,
							.navbar .dropdown-menu .active > a,
							.navbar.navbar-default .dropdown-menu .active > a,
							.navbar .dropdown-menu .active > a:hover,
							.navbar.navbar-default .dropdown-menu .active > a:hover,
							.navbar .dropdown-menu .active > a:focus,
							.navbar.navbar-default .dropdown-menu .active > a:focus
							.navbar .navbar-nav > .open > a, 
							.navbar .navbar-nav > .open > a:hover, 
							.navbar .navbar-nav > .open > a:focus,
							.navbar .navbar-nav > li > a:hover,
							.navbar .navbar-nav > li > a:focus,
							.navbar .navbar-nav > .active > a,
							.navbar .navbar-nav > .active > a:hover,
							.navbar .navbar-nav > .active > a:focus,
							.navbar .navbar-nav > .disabled > a,
							.navbar .navbar-nav > .disabled > a:hover,
							.navbar .navbar-nav > .disabled > a:focus,
							.comment-edit-link,
							.comment-reply-link,
							.transparent-header .topbar ul li a:hover,
							#owl-tours.owl-custom .owl-nav [class*="owl-"]',
                'property'   => 'color'
                ),
                array(
                    'selector' => '.twitter-posts a, .widget-title hr,
									.search-form .search-submit,
									.btn-primary,.pagination > li.current > a',
                    'property'   => 'border-color'
                ),
                array(
                    'selector' => '',
                    'property'   => 'border-left-color'
                ),
                array(
                    'selector' => '',
                    'property' => 'border-top-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-right-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-bottom-color',
                ),
				array(
                    'selector' => '',
                    'property'   => 'border-color',
					'opacity'	=> 0.7,
                ),
				array(
                'selector' => '',
                'property'   => 'background-color',
				'opacity'	=> 0.93,
                ),
            )
      ),
    );

	return apply_filters( 'truvatour_styling_options', $options );
}  
?>