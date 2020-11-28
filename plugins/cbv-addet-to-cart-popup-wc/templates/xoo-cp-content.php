<?php 

//Exit if accessed directly
if(!defined('ABSPATH')){
	return; 	
}

global $xoo_cp_gl_qtyen_value;

$cart = WC()->cart->get_cart();

$cart_item = $cart[$cart_item_key];


$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

$thumbnail 		= apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

$product_name 	=  apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
					
$product_price 	= apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

$product_subtotal = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );

// Meta data
$attributes = '';

//Variation
$attributes .= $_product->is_type('variable') || $_product->is_type('variation')  ? wc_get_formatted_variation($_product) : '';
// Meta data
if(version_compare( WC()->version , '3.3.0' , "<" )){
	$attributes .=  WC()->cart->get_item_data( $cart_item );
}
else{
	$attributes .=  wc_get_formatted_cart_item_data( $cart_item );
}


//Quantity input
$max_value = apply_filters( 'woocommerce_quantity_input_max', product_max_qty($product_id), $_product );
$min_value = apply_filters( 'woocommerce_quantity_input_min', product_min_qty($product_id), $_product );
$step      = apply_filters( 'woocommerce_quantity_input_step', 1, $_product );
$pattern   = apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' );

?>



<div class="xoo-cp-pdetails clearfix">
	<div class="container" data-xoo_cp_key="<?php echo $cart_item_key; ?>">
		<div class="row">
			<div class="col-3">
				<div class="xoo-cp-pimg"><a href="<?php echo  $product_permalink; ?>"><?php echo $thumbnail; ?></a></div>
			</div>
			<div class="col-5">
				<div class="xoo-cp-ptitle">
					<a href="<?php echo  $product_permalink; ?>"><?php echo $product_name; ?></a>

				<?php if($attributes): ?>
					<div class="xoo-cp-variations"><?php echo $attributes; ?></div>
				<?php endif; ?>
					<div class="xoo-cp-pqty">
						<?php if ( $_product->is_sold_individually() || !$xoo_cp_gl_qtyen_value ): ?>
							<span><?php echo $cart_item['quantity']; ?></span>				
						<?php else: ?>
							<div class="xoo-cp-qtybox">
							<span class="xcp-minus xcp-chng">-</span>
							<input type="number" class="xoo-cp-qty" max="<?php esc_attr_e( 0 < $max_value ? $max_value : '' ); ?>" min="<?php esc_attr_e($min_value); ?>" step="<?php echo esc_attr_e($step); ?>" value="<?php echo $cart_item['quantity']; ?>" pattern="<?php esc_attr_e( $pattern ); ?>">
							<span class="xcp-plus xcp-chng">+</span></div>
						<?php endif; ?>
						<span class="xoo-cp-pprice"><?php echo  $product_price; ?></span>
					</div>
				</div>
			</div>
			<div class="col-4">
			<div class="product-order-btn">
				<a class="fl-btn" href="<?php echo wc_get_checkout_url(); ?>"><?php _e('afrekenen','added-to-cart-popup-woocommerce'); ?></a>
				<a class="fl-btn"><?php _e('Winkel verder','added-to-cart-popup-woocommerce'); ?></a>
			</div>
			</div>
		</div>

	</div>
</div>

