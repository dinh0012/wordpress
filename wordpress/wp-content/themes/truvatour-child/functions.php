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
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="cruise_type" class="col-md-4">
                                    <option value="">Cruise type</option>
                                    <option value="river">River</option>
                                    <option value="ocean">Ocean</option>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <input type="text" name="cruise_type" class="col-md-4" placeholder="Cruise line">
                            </div>
                            <div class="item col-md-4">
                                <select name="lengthofcruise" class="col-md-4">
                                    <option value="">Length of cruise </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="departure_option" class="col-md-4">
                                    <option value="">Ex-UK departure option</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <input type="text" name="departure_airport" class="col-md-4" placeholder="UK departure airport">
                            </div>
                            <div class="item col-md-4">
                                <select name="no_of_cabins_required" class="col-md-4">
                                    <option value="">No. of cabins required</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="item col-md-4">
                                <select name="cabin_berth" class="col-md-4">
                                    <option value="">Cabin berth</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="item col-md-4 no-pd-r">
                                <select name="cabin_type" class="col-md-4">
                                    <option value="">Cabin type </option>
                                    <option value="inside">Inside</option>
                                    <option value="outside">Outside</option>
                                    <option value="balcony">Balcony</option>
                                    <option value="suite">Suite</option>
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

function custom_search_query( $query ) {
    if ($query->is_search()) {
        // category terms search.
        $query->set('meta_query', array(array(
            'key' => '__meta_key__',
            'field' => 'slug',
            'terms' => array($_GET['product_cat_select'])),
            'compare' => 'LIKE'
        ));
    }
    return $query;
}

add_filter( 'pre_get_posts', 'custom_search_query');