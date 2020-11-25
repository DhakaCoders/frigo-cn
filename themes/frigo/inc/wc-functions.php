<?php
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);


add_action('woocommerce_before_main_content', 'get_custom_wc_output_content_wrapper', 11);
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 9);

function get_custom_wc_output_content_wrapper(){

    if(is_shop() OR is_product_category()){ 
        echo '<section class="product-overview-sec"><div class="container"><div class="row"><div class="col-md-12"><div class="product-overview-inr">';
    }


}

function get_custom_wc_output_content_wrapper_end(){
  if(is_shop() OR is_product_category()){ 
    echo '</div></div></div></div></section>';
  }

}

function get_array( $string ){
    if( !empty( $string ) ){ 
        $str_arr = preg_split ("/\,/", $string);   
        return $str_arr;
    }
    return false;
}

add_filter('woocommerce_catalog_orderby', 'wc_customize_product_sorting');

function wc_customize_product_sorting($sorting_options){
    $sorting_options = array(
        'menu_order' => __( 'sort by', 'woocommerce' ),
        'popularity' => __( 'popularity', 'woocommerce' ),
        'rating'     => __( 'average rating', 'woocommerce' ),
        'date'       => __( 'newness', 'woocommerce' ),
        'price'      => __( 'low price', 'woocommerce' ),
        'price-desc' => __( 'high price', 'woocommerce' ),
    );

    return $sorting_options;
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}

/*Loop Hooks*/


/**
 * Add loop inner details are below
 */

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
    function add_shorttext_below_title_loop() {
        global $product, $woocommerce, $post;
/*        $sc = '[yith_quick_view product_id="'.$product->get_id().'" type="icon" label="QV"]';
    echo '<div class="fl-product-item hello">';
        wc_stock_manage();
        echo '<div class="fl-product-item-fea-img">';
        echo '<a href="'.get_permalink( $product->get_id() ).'">';
        echo wp_get_attachment_image( get_post_thumbnail_id($product->get_id()), 'pgrid' );
        echo '</a>';
        echo '<div class="product-overlay-icons">';
        get_wish_thumb();
        echo '<a href="#" class="product-overlay-icon-search yith-wcqv-button" data-product_id="'.$product->get_id().'"><i class="fas fa-search"></i></a>';
        echo do_shortcode($sc);
        echo '</div>';
        echo '</div>';
        echo '<div class="fl-product-item-des mHc">';
        get_loop_condition();
        echo '<h6 class="fl-product-title"><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h6>';
        echo '<div class="fl-product-box-prices">';
        echo '<div class="fl-product-regular-price">'.$product->get_price_html().'</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';*/
        $gridurl = cbv_get_image_src( get_post_thumbnail_id($product->get_id()), 'pgrid' );
        echo '<div class="pro-item">';
        echo '<div class="pro-item-img-cntlr pw-item-img-cntlr">';
        echo '<a class="overlay-link" href="'.get_permalink( $product->get_id() ).'"></a>';
        echo '<div class="pro-item-img dft-transition inline-bg" style="background-image: url('.$gridurl.');"></div>';
        echo '<div class="pro-item-highlight-text">';
        echo '<span>'.get_the_title().'</span>';
        echo '</div>';
        echo '</div>';
        echo '<div class="pro-item-desc pw-item-desc">';
        echo '<h3 class="pro-item-desc-title"><a href="#">Feest Gourmet</a></h3>';
        echo '<h6 class="pro-item-desc-sub-title">Vers, simpel en panklaar!</h6>';
        echo '<div class="product-price">';
        echo '<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">€</span> 16,01</bdi></span>';
        echo '<span class="pro-prize-shrt-title show-sm">pp</span>';
        echo '</div>';
        echo '<strong>Aantal personen</strong>';
        echo '<div class="product-quantity product-quantity-cntlr">';
        echo '<div class="quantity qty">';
        echo '<span class="minus">-</span>';
        echo '<input type="number" class="count" name="qty" value="1">';
        echo '<span class="plus">+</span>';
        echo '</div>';
        echo '<div class="product-order-btn">';
        echo '<a class="fl-btn" href="#">Bestel nu</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
    }
}


function wc_stock_manage(){
    global $product;
    $StockQ = $product->get_stock_quantity();
    if ( ! $product->managing_stock() && ! $product->is_in_stock() ){
        echo '<span class="out-of-stock">Out of Stock</span>';
        
    } elseif( $StockQ < 1 ) {
        if ($product->backorders_allowed()){
            echo '<span class="backorders">Available on Backorder</span>';
        } elseif ( !$product->backorders_allowed() && $StockQ == 0 && ! $product->is_in_stock()){
            echo '<span class="out-of-stock">Out of Stock</span>';
        } elseif ( $product->is_on_backorder() ){
            echo '<span class="backorders">Available on Backorder</span>';
        }
    } 
}

/*Remove Single page Woocommerce Hooks & Filters are below*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );



//add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
$args['posts_per_page'] = 8; // 4 related products
return $args;
}

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 

function woocommerce_custom_single_add_to_cart_text() {
    return __( 'ADD TO BAG', 'woocommerce' ); 
}

add_action( 'woocommerce_single_product_summary', 'wc_single_product_under_cartbutton', 31 );
function wc_single_product_under_cartbutton(){
    echo '<div class="sharewith">SHARE WITH LOVE +</div>';
}





//custom action 'woocommerce_delivery_text' is used on add to cart button 

//add_action( 'woocommerce_delivery_text', 'wc_single_free_delivery_text' );

function wc_single_free_delivery_text(){

    echo '<div class="free-text"><p>Free Delivery for over 50 <span>€</span></p</div>';
}



// change a number of the breadcrumb defaults.
add_filter( 'woocommerce_breadcrumb_defaults', 'cbv_woocommerce_breadcrumbs' );
if( !function_exists('cbv_woocommerce_breadcrumbs')):
function cbv_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div class="fl-breadcrumbs"><ul class="reset-list">',
            'wrap_after'  => '</ul></div>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;