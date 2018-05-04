<?php
//write functions here

function truvatour_child_custom_search_form(){
    $termCruiseType = get_terms(array(
        'taxonomy' => 'cruise_type',
        'hide_empty' => false,
    ));
    $arrayCruiseType = [];
    foreach ($termCruiseType as $type) {
        $arrayCruiseType[$type->slug] = $type->name;
    }
    ?>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <input type="text" name="s" id="s" class="search_name" placeholder="<?php esc_attr_e('What you are looking for?', 'truvatour'); ?>" value="<?php echo get_search_query(); ?>">
                    <div class="option-search">
                        <div class="form-control">
                            <div class="item col-md-4">
                                <select name="departure_month" class="col-md-4">
                                    <option value="">Departure month</option>
                                    <?php
                                    $arrayMonthName = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                    for ($i = 1; $i < 13; $i++) {
                                        ?>
                                        <option <?php echo $i == $_GET['departure_month'] ? 'selected' : '' ?>
                                            value="<?php echo $i?>"><?php echo $arrayMonthName[$i]?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="cruise_type" class="col-md-4">
                                    <option value="">Cruise type</option>
                                    <?php foreach ($arrayCruiseType as $key => $type): ?>
                                        <option <?php echo $key == $_GET['cruise_type'] ? 'selected' : '' ?> value="<?php echo $key ?>"><?php echo $type ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <input type="text" name="cruise_line" class="col-md-4" placeholder="Cruise line" value="<?php echo $_GET['cruise_line']; ?>">
                            </div>
                            <div class="item col-md-4">
                                <select name="lengthofcruise" class="col-md-4">
                                    <option value="">Length of cruise </option>
                                    <?php
                                    for ($i = 1; $i <= 15; $i++) {
                                        ?>
                                            <option <?php echo $i == $_GET['lengthofcruise'] ? 'selected' : '' ?>
                                                value="<?php echo $i?>"><?php echo $i?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="departure_option" class="col-md-4">
                                    <option value="">Ex-UK departure option</option>
                                    <option  <?php echo 'yes' == $_GET['departure_option'] ? 'selected' : '' ?>  value="yes">Yes</option>
                                    <option <?php echo 'no' == $_GET['departure_option'] ? 'selected' : '' ?> value="no">No</option>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <input type="text" name="departure_airport" class="col-md-4" placeholder="UK departure airport" value="<?php echo $_GET['departure_airport']; ?>">
                            </div>
                            <div class="item col-md-4">
                                <select name="no_of_cabins_required" class="col-md-4">
                                    <option value="">No. of cabins required</option>
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        ?>
                                        <option <?php echo $i == $_GET['no_of_cabins_required'] ? 'selected' : '' ?>
                                            value="<?php echo $i?>"><?php echo $i?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="cabin_berth" class="col-md-4">
                                    <option value="">Cabin berth</option>
                                    <?php
                                    for ($i = 1; $i < 4; $i++) {
                                        ?>
                                        <option <?php echo $i == $_GET['cabin_berth'] ? 'selected' : '' ?>
                                            value="<?php echo $i?>"><?php echo $i?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <select name="cabin_type" class="col-md-4">
                                    <option value="">Cabin type </option>
                                    <option <?php echo 'inside' == $_GET['cabin_type'] ? 'selected' : '' ?> value="inside">Inside</option>
                                    <option <?php echo 'outside' == $_GET['cabin_type'] ? 'selected' : '' ?> value="outside">Outside</option>
                                    <option <?php echo 'balcony' == $_GET['cabin_type'] ? 'selected' : '' ?> value="balcony">Balcony</option>
                                    <option <?php echo 'suite' == $_GET['cabin_type'] ? 'selected' : '' ?> value="suite">Suite</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group-addon">
                            <button class="btn btn-primary" type="submit"><span>Search</span> &nbsp;<i class="flaticon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    global $wp_meta_boxes;
    print_r($wp_meta_boxes);
}
function cruise_register_meta_boxes( $meta_boxes ) {
    $termCruiseType = get_terms(array(
        'taxonomy' => 'cruise_type',
        'hide_empty' => false,
    ));
    $arrayCruiseType = [];
    foreach ($termCruiseType as $type) {
        $arrayCruiseType[$type->slug] = $type->name;
    }
    $prefix = 'rw_';


    $arrayMonthName = ['1' => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    $meta_boxes[] = array(
        'id' => 'cruise_offer',
        'title' => esc_html__( 'Cruise offer', 'metabox-online-generator' ),
        'post_types' => array( 'page' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => false,
        'fields' => array(
            array(
                'id' => $prefix . 'departure_month',
                'name' => esc_html__( 'Departure month', 'metabox-online-generator' ),
                'type' => 'select',
                'options' => $arrayMonthName,
                'std' => '1',
            ),
            array(
                'id' => $prefix . 'cruise_line',
                'type' => 'text',
                'name' => esc_html__( 'Cruise line', 'metabox-online-generator' ),
            ),
            array(
                'id' => $prefix . 'cruise_type',
                'name' => esc_html__( 'Cruise type', 'metabox-online-generator' ),
                'type' => 'select',
                'placeholder' => esc_html__( 'Select an Item', 'metabox-online-generator' ),
                'options' => $arrayCruiseType,
            ),
            array(
                'id' => $prefix . 'lengthofcruise',
                'name' => esc_html__( 'Length ofcruise', 'metabox-online-generator' ),
                'type' => 'select',
                'options' => array(
                    1 => '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '9',
                    '10',
                    '12',
                    '12',
                    '13',
                    '14',
                    '15',
                ),
                'std' => '1',
            ),
            array(
                'id' => $prefix . 'departure_option',
                'name' => esc_html__( 'Ex-UK departure option', 'metabox-online-generator' ),
                'type' => 'select',
                'placeholder' => esc_html__( 'Select an Item', 'metabox-online-generator' ),
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
            ),
            array(
                'id' => $prefix . 'departure_airport',
                'type' => 'text',
                'name' => esc_html__( 'UK departure airport', 'metabox-online-generator' ),
            ),
            array(
                'id' => $prefix . 'no_of_cabins_required',
                'type' => 'select',
                'name' => esc_html__( 'No. of cabins required', 'metabox-online-generator' ),
                'options' => array(
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                ),
            ),
            array(
                'id' => $prefix . 'cabin_type',
                'name' => esc_html__( 'Cabin type', 'metabox-online-generator' ),
                'type' => 'select',
                'options' => array(
                    'inside' => 'Inside',
                    'outside' => 'Outside',
                    'balcony' => 'Balcony',
                    'suite' => 'Suite',
                ),
                'std' => 'inside',
            ),
            array(
                'id' => $prefix . 'cabin_berth',
                'name' => esc_html__( 'Cabin berth', 'metabox-online-generator' ),
                'type' => 'select',
                'placeholder' => esc_html__( 'Select an Item', 'metabox-online-generator' ),
                'options' => array(
                    1 => '1',
                    '2',
                    '3',
                    '4',
                ),
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'cruise_register_meta_boxes' );

function add_query_vars($public_query_vars) {
    $public_query_vars[] = 'rw_departure_month';
    $public_query_vars[] = 'rw_cruise_type';
    $public_query_vars[] = 'rw_cruise_line';
    $public_query_vars[] = 'rw_lengthofcruise';
    $public_query_vars[] = 'rw_departure_option';
    $public_query_vars[] = 'rw_departure_airport';
    $public_query_vars[] = 'rw_no_of_cabins_required';
    $public_query_vars[] = 'rw_cabin_berth';
    $public_query_vars[] = 'rw_cabin_type';
    return $public_query_vars;
}
add_filter('query_vars', 'add_query_vars');

function meta_search_query($query) {

    $query_args_code = array(
        'posts_per_page' => 5,
        'post_type' => 'page',
        'meta_key' => 'post_title',
        'meta_value' => $query->query_vars['s'],
        'meta_compare' => 'LIKE'
    );


    $query_args_meta = array(
        'posts_per_page' => -1,
        'post_type' => 'page',
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'post_title',
                'value' => $query->query_vars['s'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_departure_month',
                'value' => $query->query_vars['departure_month'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_cruise_type',
                'value' => $query->query_vars['cruise_type'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_cruise_line',
                'value' => $query->query_vars['cruise_line'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_lengthofcruise',
                'value' => $query->query_vars['lengthofcruise'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_departure_option',
                'value' => $query->query_vars['departure_option'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_departure_airport',
                'value' => $query->query_vars['departure_airport'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_no_of_cabins_required',
                'value' => $query->query_vars['no_of_cabins_required'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_cabin_berth',
                'value' => $query->query_vars['cabin_berth'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'rw_cabin_type',
                'value' => $query->query_vars['cabin_type'],
                'compare' => 'LIKE'
            ),

        )
    );
    if ( !is_admin() && $query->is_search ) {
        $query->set('meta_query', $query_args_meta);
        $query->set('post_type', 'page'); // optional
    };
}
add_filter( 'pre_get_posts', 'meta_search_query');


add_filter( 'pre_get_posts', 'custom_search_query');

function search_form_homepage($args, $content){
    $optionMonth = '';
    $arrayMonthName = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    for ($i = 0; $i < 12; $i++) {
        $optionMonth .= '<option value="'. $i .'">' . $arrayMonthName[$i] . '</option>';
    }
    $lenghtCruise ='';
    for ($i = 1; $i <= 15; $i++) {
        $lenghtCruise .= '<option value="'. $i . '">'. $i . '</option>';

    }
    $cabinsRequired = '';
        for ($i = 1; $i < 5; $i++) {
            $cabinsRequired .= '<option value="'. $i .'">' . $i .'</option>';
        }
    return '<div class="row">
            <div class="widget clearfix product-search">
                <form id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
                    <input type="text" name="s" id="s" class="search_name" placeholder="'. $args['button_text'] . '">
                    <div class="option-search">
                        <div class="form-control">
                            <div class="item col-md-4">
                                <select name="departure_month" class="col-md-4">
                                    <option value="">Departure month</option>
                                    '.$optionMonth.'
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="cruise_type" class="col-md-4">
                                    <option value="">Cruise type</option>
                                    <option  value="river">River</option>
                                    <option  value="ocean">Ocean</option>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <input type="text" name="cruise_line" class="col-md-4" placeholder="Cruise line" >
                            </div>
                            <div class="item col-md-4">
                                <select name="lengthofcruise" class="col-md-4">
                                    <option value="">Length of cruise </option>
                                   '. $lenghtCruise .'
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="departure_option" class="col-md-4">
                                    <option value="">Ex-UK departure option</option>
                                    <option  value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <input type="text" name="departure_airport" class="col-md-4" placeholder="UK departure airport" >
                            </div>
                            <div class="item col-md-4">
                                <select name="no_of_cabins_required" class="col-md-4">
                                    <option value="">No. of cabins required</option>
                                    '. $cabinsRequired . '
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="cabin_berth" class="col-md-4">
                                    <option value="">Cabin berth</option>
                                   <option  value="1">1</option>
                                   <option  value="2">2</option>
                                   <option  value="3">3</option>
                                   <option  value="4">4</option>
                           
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <select name="cabin_type" class="col-md-4">
                                    <option value="">Cabin type </option>
                                    <option  value="inside">Inside</option>
                                    <option  value="outside">Outside</option>
                                    <option  value="balcony">Balcony</option>
                                    <option  value="suite">Suite</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group-addon">
                            <button class="btn btn-primary" type="submit"><span>Search</span> &nbsp;<i class="flaticon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
    </div>';

}
add_shortcode( 'search_form_homepage', 'search_form_homepage' );


add_action( 'house_cruise_type_add_form_fields', 'add_cruise_type_group_field', 10, 2 );
function add_feature_group_field($taxonomy) {
    global $feature_groups;
    ?><div class="form-field term-group">
    <label for="featuret-group"><?php _e('Cruise type Group', 'my_plugin'); ?></label>
    <select class="postform" id="equipment-group" name="feature-group">
        <option value="-1"><?php _e('none', 'my_plugin'); ?></option><?php foreach ($feature_groups as $_group_key => $_group) : ?>
            <option value="<?php echo $_group_key; ?>" class=""><?php echo $_group; ?></option>
        <?php endforeach; ?>
    </select>
    </div><?php
}

add_action('init', 'register_feature_taxonomy');

function register_feature_taxonomy() {
    $labels = array(
        'name' => _x( 'Cruise type', 'taxonomy general name', 'my_plugin' ),
        'singular_name' => _x('Cruise type', 'taxonomy singular name', 'my_plugin'),
        'search_items' => __('Search Cruise type', 'my_plugin'),
        'popular_items' => __('Common Cruise type', 'my_plugin'),
        'all_items' => __('All Cruise type', 'my_plugin'),
        'edit_item' => __('Edit Cruise type', 'my_plugin'),
        'update_item' => __('Update Cruise type', 'my_plugin'),
        'add_new_item' => __('Add new Cruise type', 'my_plugin'),
        'new_item_name' => __('New Cruise type:', 'my_plugin'),
        'add_or_remove_items' => __('Remove Cruise type', 'my_plugin'),
        'choose_from_most_used' => __('Choose from common Cruise type', 'my_plugin'),
        'not_found' => __('No Cruise type found.', 'my_plugin'),
        'menu_name' => __('Cruise type', 'my_plugin'),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'public'                     => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
    );

    register_taxonomy('cruise_type', array('page'), $args);
}

add_action( 'created_cruise_type', 'save_feature_meta', 10, 2 );

function save_feature_meta( $term_id, $tt_id ){
    if( isset( $_POST['feature-group'] ) && '' !== $_POST['feature-group'] ){
        $group = sanitize_title( $_POST['feature-group'] );
        add_term_meta( $term_id, 'feature-group', $group, true );
    }
}

