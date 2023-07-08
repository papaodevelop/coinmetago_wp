<?php

class td_woo_product_module extends td_module {

	var $product;
    var $module_atts;

    function __construct( $post, $module_atts = array() ) {
        // run the parent constructor
        parent::__construct($post, $module_atts );
	    $this->product = wc_get_product($this->post->ID);
        $this->module_atts = $module_atts;
    }

    function render() {
        ob_start();
        $image_size = $this->get_shortcode_att('img_size');
        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }
        $image_hide = $this->get_shortcode_att('hide_image');
	    $link = apply_filters( 'woocommerce_loop_product_link', get_permalink( $this->product->get_id() ), $this->product );
	    $average_rating = $this->product->get_average_rating();


        $product_title_tag = 'h3';
        if ( $this->get_shortcode_att('product_title_tag') != '' ) {
            $product_title_tag = $this->get_shortcode_att('product_title_tag');
        }

        $show_excerpt = $this->get_shortcode_att('show_excerpt');
        if ( $show_excerpt == 'none' ) {
            $show_excerpt = 'hide';
        }

        $excerpt_type = $this->get_shortcode_att('excerpt_type');
        $cut_at = $this->get_shortcode_att('excerpt_cut');
        if ( $excerpt_type == 'long' ) {
            $excerpt = '<div class="td-excerpt">' . $this->product->get_description() . '</div>';
            if ($cut_at !== '') {
                $excerpt = '<div class="td-excerpt">' . td_util::excerpt($this->product->get_description(), $cut_at) . '</div>';
            }
        } else {
            $excerpt = '<div class="td-excerpt"> ' . $this->product->get_short_description() . ' </div>';
            if ($cut_at !== '') {
                $excerpt = '<div class="td-excerpt">' . td_util::excerpt($this->product->get_short_description(), $cut_at) . '</div>';
            }
        }

        ?>

        <div class="<?php echo $this->get_module_classes();?>">
            <div class="td-module-container">

                <?php if( $image_hide == '' ) { ?>
                    <div class="td-image-container">
                        <?php
                        echo $this->get_image( $image_size, true );
                        echo $this->get_sale_badge();

                        if( isset( $this->module_atts['show_favourites'] ) ) {
                            if ( !empty( $this->get_shortcode_att('show_favourites') ) ) {
                                echo $this->get_favorite_badge( $this->product->get_id() );
                            }
                        }
                        ?>
                    </div>
                <?php } ?>

                <div class="td-module-meta-info">
                    <<?php echo $product_title_tag ?> class="td-module-title"><a href="<?php echo esc_url( $link ) ?>" class="product-link"><?php echo $this->product->get_title() ?></a></<?php echo $product_title_tag ?>>
                    <?php if ( $show_excerpt != 'hide' ) { echo $excerpt; } ?>
                    <?php
                        if( $average_rating ) { ?>
                            <div class="star-rating" title="<?php echo sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average_rating) ?>">
                                <span style="width:<?php echo ( ( $average_rating / 5 ) * 100 ) ?>%">
                                    <strong itemprop="ratingValue" class="rating"><?php echo $average_rating ?></strong>
                                    <?php echo __( 'out of 5', 'woocommerce' ) ?>
                                </span>
                            </div>
                        <?php }
                    ?>

                    <span class="price">
                        <?php echo $this->product->get_price_html(); ?>
                    </span>

                    <div class="read-more">
                        <?php echo $this->add_to_cart(); ?>
                    </div>
                </div>

            </div>
        </div>

        <?php return ob_get_clean();
    }

    function add_to_cart( $args = array() ) {

	    $defaults = array(
		    'quantity'   => 1,
		    'class'      => implode(
			    ' ',
			    array_filter(
				    array(
					    'button',
					    'product_type_' . $this->product->get_type(),
					    $this->product->is_purchasable() && $this->product->is_in_stock() ? 'add_to_cart_button' : '',
					    $this->product->supports( 'ajax_add_to_cart' ) && $this->product->is_purchasable() && $this->product->is_in_stock() ? 'ajax_add_to_cart' : '',
				    )
			    )
		    ),
		    'attributes' => array(
			    'data-product_id'  => $this->product->get_id(),
			    'data-product_sku' => $this->product->get_sku(),
			    'aria-label'       => $this->product->add_to_cart_description(),
			    'rel'              => 'nofollow',
		    ),
	    );

	    $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $this->product );

	    if ( isset( $args['attributes']['aria-label'] ) ) {
		    $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
	    }

	    return apply_filters(
		    'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
		    sprintf(
			    '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			    esc_url( $this->product->add_to_cart_url() ),
			    esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			    esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			    isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			    esc_html( $this->product->add_to_cart_text() )
		    ),
		    $this->product,
		    $args
	    );

    }

    function get_sale_badge() {

        $product = $this->product;
	    $post = $this->post;

	    if ( $product->is_on_sale() ) {
	        return apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product );

        }

	    return  '';
    }

    function get_favorite_badge( $prod_id ) {

        return '<span class="td-favorite tdc-favorite ' . ( td_woo_util::is_product_favourite($prod_id) ? 'tdc-favorite-selected' : '' ) . '" data-prod-id="' . $prod_id . '">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="td-favorite-ico td-favorite-ico-empty"><path d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="td-favorite-ico td-favorite-ico-full"><path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"/></svg>
        </span>';

    }
}
