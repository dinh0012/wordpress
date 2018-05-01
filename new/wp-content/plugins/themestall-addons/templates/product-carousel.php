<div class="container-invis woocommerce">
        <?php
		if ( $posts->have_posts() ) {
			$section_title = $posts->data['section_title'];
			$show_view_all = $posts->data['show_view_all'];
			?>
            <div class="list-wrapper products clearfix">
                <div class="section-title clearfix">
                    <h3><?php echo esc_html($section_title); ?> 
                    <?php if($show_view_all == 'yes'): 
					$view_all_text = $posts->data['view_all_text'];
					$view_all_link = $posts->data['view_all_link'];
					?>
                    <small><a href="<?php echo esc_url($view_all_link); ?>"><?php echo esc_html($view_all_text); ?> <i class="fa fa-angle-right"></i></a></small>
                    <?php endif; ?>
                    </h3>
                </div><!-- end section-title -->
                <div class="owl-hotels owl-carousel owl-theme owl-custom">
                <?php
                // Posts are found
                    while ( $posts->have_posts() ) :
                        $posts->the_post();
                        global $post;
						global $product;
                        ?>
                    <div class="owl-item">
                        <div class="list-item">
                            <a href="<?php the_permalink(); ?>" title="">
                            <div class="entry">
                                <?php
                                if(has_post_thumbnail()): 
                                $fullsize = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                                $image = ts_image_resize( $fullsize[0], 1000, 550, true );
                                $img = $image['url'];
                                else:
                                $img = 'http://placehold.it/1000x550';
                                endif;
                                ?>
                                <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="magni-desc">
                                    <?php
									if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
										return;
									?>			
									<?php if ( $rating_html = $product->get_rating_html() ) : ?>
										
										<div class="rating">
										<small><?php echo sprintf(esc_html__('%d (Reviews)', 'truvatour'), $product->get_review_count()); ?></small>
										<?php echo $rating_html; ?>
										</div>
									<?php endif; ?>
                                    </div>
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            </a>

                            <div class="list-desc clearfix">
                                <h4><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h4>
                                <ul class="list-inline">
									<?php
                                    $terms = get_the_terms( $post->ID, 'product_cat' );
                                    if($terms): ?>
                                    <li class="small">
                                    <?php
                                    foreach ($terms as $term) { ?>
                                        <span><?php echo esc_html($term->name); ?></span>
                                    <?php	
                                    }
                                    ?>
                                    </li>
                                    <?php
                                    endif;
                                    ?>
                                    <?php if(get_post_meta($post->ID, 'product_country', true) != ''): ?>           
                                    <li class="small"><?php echo esc_html__('From: ', 'truvatour'); ?> <span class="product-country"><?php echo get_post_meta($post->ID, 'product_country', true); ?></span></li>
                                    <?php endif; ?>
                                </ul>
                                <ul class="list-bottom list-inline">
									<?php
                                    $regular_price = $product->regular_price;
                                    $sales_price = $product->sale_price;
                                    if($sales_price != ''):			
                                        $discount_price = $regular_price - $sales_price;			
                                        $final_price = round($discount_price*100/$regular_price);
                                    ?>
                                    <li><sub><?php echo esc_html($final_price); ?>%</sub> <?php echo esc_html__('Discounts', 'truvatour'); ?></li>
                                    <?php endif; ?>
                                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                                        <li class="price"><?php echo $price_html; ?></li>
                                    <?php endif; ?>
                                    <li class="read-more-details"><a href="<?php esc_url(the_permalink()); ?>" class="readmore"><?php echo esc_html__('View details', 'truvatour'); ?> <i class="fa fa-angle-right"></i></a></li>
                                </ul><!-- end list-bottom -->
                            </div><!-- end list-desc -->
                        </div><!-- end list-item -->
                    </div><!-- end col -->
                    <?php
                    endwhile;
                ?>     
                </div><!-- end row -->
            </div><!-- end list-wrapper -->
            <?php
            }
            // Posts not found
            else { ?>
            <h4><?php echo esc_html__( 'Product not found', 'themestall' ); ?></h4>
            <?php } ?>
</div>