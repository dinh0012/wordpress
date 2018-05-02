<?php
//write functions here

function truvatour_child_custom_search_form(){
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
                                    for ($i = 1; $i < 12; $i++) {
                                        ?>
                                        <option <?php echo $i == $_GET['departure_month'] ? 'selected' : '' ?>
                                            value="<?php echo $i?>"><?php echo $i?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="cruise_type" class="col-md-4">
                                    <option value="">Cruise type</option>
                                    <option <?php echo 'river' == $_GET['cruise_type'] ? 'selected' : '' ?> value="river">River</option>
                                    <option <?php echo 'ocean' == $_GET['cruise_type'] ? 'selected' : '' ?> value="ocean">Ocean</option>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <input type="text" name="cruise_line" class="col-md-4" placeholder="Cruise line" value="<?php echo $_GET['cruise_line']; ?>">
                            </div>
                            <div class="item col-md-4">
                                <select name="lengthofcruise" class="col-md-4">
                                    <option value="">Length of cruise </option>
                                    <?php
                                    for ($i = 1; $i < 15; $i++) {
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
                                    for ($i = 1; $i < 5; $i++) {
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
    $prefix = 'rw_';

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
                    '11',
                    '12',
                ),
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
                'options' => array(
                    'river' => 'River',
                    'ocean' => 'Ocean',
                ),
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