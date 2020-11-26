<?php
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
//remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


add_action('woocommerce_before_main_content', 'get_custom_wc_output_content_wrapper', 11);
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 9);
add_filter( 'woocommerce_show_page_title', '__return_false' );
function get_custom_wc_output_content_wrapper(){

    if(is_shop() OR is_product_category()){ 
        echo '<section class="product-overview-sec"><div class="container"><div class="row"><div class="col-md-12"><div class="product-overview-inr">';
        get_template_part('templates/breadcrumbs');
        get_template_part('templates/shop', 'search');
        echo '<div class="pro-overview-cntnt-cntlr clearfix">';
        echo '<div class="pro-overview-cntnt-lft">';
            get_sidebar('shop');
        echo '</div>';
        echo '<div class="pro-overview-grid-cntlr">';
    }


}

function get_custom_wc_output_content_wrapper_end(){
  if(is_shop() OR is_product_category()){
    echo '</div>';
    echo '</div>'; 
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

        switch ( $product->get_type() ) {
            case "variable" :
                $link   = get_permalink($product->get_id());
                $label  = apply_filters('variable_add_to_cart_text', __('Bestel nu', 'woocommerce'));
            break;
            case "grouped" :
                $link   = get_permalink($product->get_id());
                $label  = apply_filters('grouped_add_to_cart_text', __('Bestel nu', 'woocommerce'));
            break;
            case "external" :
                $link   = get_permalink($product->get_id());
                $label  = apply_filters('external_add_to_cart_text', __('Read More', 'woocommerce'));
            break;
            default :
                $link   = esc_url( $product->add_to_cart_url() );
                $label  = apply_filters('add_to_cart_text', __('Bestel nu', 'woocommerce'));
            break;
        }
        $isShowWeekProdict = get_field('weekend_product', $product->get_id());
        $gridurl = cbv_get_image_src( get_post_thumbnail_id($product->get_id()), 'pgrid' );
        echo '<div class="pro-item">';
        echo '<div class="pro-item-img-cntlr pw-item-img-cntlr">';
        echo '<a class="overlay-link" href="'.get_permalink( $product->get_id() ).'"></a>';
        echo '<div class="pro-item-img dft-transition inline-bg" style="background-image: url('.$gridurl.');"></div>';
        if( $isShowWeekProdict ):
            echo '<div class="pro-item-highlight-text">';
            echo '<span>Product van de week</span>';
            echo '</div>';
        endif;
        echo '</div>';
        echo '<div class="pro-item-desc pw-item-desc">';
        echo '<h3 class="pro-item-desc-title"><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h3>';
        echo '<h6 class="pro-item-desc-sub-title">'.get_the_excerpt().'</h6>';
        echo '<div class="product-price">';
        echo $product->get_price_html();
        echo '<span class="pro-prize-shrt-title show-sm">pp</span>';
        echo '</div>';
        echo '<strong>Aantal personen</strong>';
        echo '<div class="product-quantity product-quantity-cntlr">';
        if ( ! $product->is_in_stock() ) :
            
        else:
            if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && ! $product->is_sold_individually() ) {
            echo '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
            echo '<div class="quantity qty"><span class="minus">-</span>';
            echo woocommerce_quantity_input( array(), $product, false );
            echo '<span class="plus">+</span></div>';
            echo '<div class="product-order-btn"><button type="submit" class="fl-btn">Bestel nu</button></div>';
            echo '</form>';
            }else{
                printf('<div class="product-order-btn"><a class="fl-btn" href="%s" rel="nofollow" data-product_id="%s" class="button add_to_cart_button product_type_%s">%s</a></div>', $link, $product->get_id(), $product->get_type(), $label);
            }
        endif;
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


add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 2;
  return $cols;
}


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
            'wrap_before' => '<ul class="reset-list">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;


/**
 * Build a custom query based on several conditions
 * The pre_get_posts action gives developers access to the $query object by reference
 * any changes you make to $query are made directly to the original object - no return value is requested
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 *
 */
function sm_pre_get_posts( $query ) {
    // check if the user is requesting an admin page 
    // or current query is not the main query
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }

    // edit the query only when post type is 'accommodation'
    // if it isn't, return
    if ( !is_post_type_archive( 'product' ) ){
        return;
    }
    $post_type = 'product';
    $meta_query = array();
    $keyword = '';

    if( isset($_GET['keyword']) && !empty($_GET['keyword']) ){
        $keyword = $_GET['keyword'];
    }
    // add meta_query elements
    /*if( !empty( get_query_var( 'city' ) ) ){
        $meta_query[] = array( 'key' => '_sm_accommodation_city', 'value' => get_query_var( 'city' ), 'compare' => 'LIKE' );
    }

    if( !empty( get_query_var( 'type' ) ) ){
        $meta_query[] = array( 'key' => '_sm_accommodation_type', 'value' => get_query_var( 'type' ), 'compare' => 'LIKE' );
    }

    if( count( $meta_query ) > 1 ){
        $meta_query['relation'] = 'AND';
    }

    if( count( $meta_query ) > 0 ){
        $query->set( 'meta_query', $meta_query );
    }*/

    if( !empty( $keyword ) ){
        $query->set('post_type', $post_type);
        $query->set( 's', $keyword );
        //$query->set( 'category_name', $keyword );
    }
    return $query;
    
}
add_action( 'pre_get_posts', 'sm_pre_get_posts', 1 );