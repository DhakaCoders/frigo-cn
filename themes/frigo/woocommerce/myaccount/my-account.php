<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
//do_action( 'woocommerce_account_navigation' ); 
$customer_id = get_current_user_id();                    
global $woocommerce;
?>

<div class="woocommerce-myaccount-content">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		//do_action( 'woocommerce_account_content' );	?>
	<div class="frigo-dashboard">
		<div><h2 class="dashboard-title">Dashboard</h2></div>
		<div class="dashboard-row">
			<div class="dashboard-col dashboard-col-1">
				<div class="frigo-account-form">
					<div class="form-check-option">
						<label for="particular"><input type="radio" name="info_type" id="particular" value="particular"> <span>Particulier</span></label>
						<label for="for-business"><input type="radio" name="info_type" id="for-business" value="for-business" checked="checked"> <span>Zakelijk</span></label>
					</div>
					<div class="particular-form">
					<form method="post">
					<?php 
						$checkout = $woocommerce->checkout();
						$fields = $checkout->get_checkout_fields( 'billing' );

						foreach ( $fields as $key => $field ) {
							woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
						}
					 ?>
					<p class="particular-form-submit-btn">
						<button type="submit" class="button" name="save" value="<?php esc_attr_e( 'Opslaan', 'woocommerce' ); ?>"><?php esc_html_e( 'Opslaan', 'woocommerce' ); ?></button>
						<input type="hidden" name="woocommerce_user_address" value="<?php echo wp_create_nonce('woocommerce-user-address-nonce'); ?>"/>
						<input type="hidden" name="action" value="user_address" />
					</p>
					</form>
					</div>
				</div>
			</div>
			<div class="dashboard-col dashboard-col-2">
	          <div class="faq-accordion-wrp cbvmyaccount">
	          	<div><h4>Bestel Geschiedenis</h4></div>
	          	<?php 

					$customer_orders = get_posts(
						apply_filters(
							'woocommerce_my_account_my_orders_query',
							array(
								'numberposts' => 2,
								'meta_key'    => '_customer_user',
								'meta_value'  => get_current_user_id(),
								'post_type'   => wc_get_order_types( 'view-orders' ),
								'post_status' => array_keys( wc_get_order_statuses() ),
							)
						)
					);
					if ( $customer_orders ) :
	          	?>
	            <ul class="clearfix reset-list tabs">
		            <?php
					foreach ( $customer_orders as $customer_order ) :
						$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						$item_count = $order->get_item_count();
					?>
	                <li>
	                <div class="faq-accordion-controller">
						<a class="code-text" href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
							<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>

						<time class="my-ac-time" datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created(), 'd.m.Y' ) ); ?></time>
						<p>Quam nunc massa scelerisque ultrices </p>
						<?php 
						echo "<div class='order-status'>";
						echo "<label>Status:</label> ";
						echo esc_html( wc_get_order_status_name( $order->get_status() ) );
						echo "</div>";
						?>

						<?php
							echo "<div class='order-price'>{$order->get_formatted_order_total()}</div>";
						?>
	                  <span></span>
	                  <div class="faq-accordion-dsc">
	                    <div class="myac-pro-grds">
	                    	<div class="myac-pro-grd-item">
	                    		<div class="myac-pro-grd-item-inr">
	                    			<div class="myac-pro-grd-img">
	                    				<img src="<?php echo THEME_URI;?>/assets/images/product-img-full-01.jpg">
	                    			</div>
	                    			<h5>Feest Gourmet</h5>
	                    			<p>Pulvinar convallis enim lacus</p>

	                    			<div class="product-price">
	                    				<span class="woocommerce-Price-amount amount">
	                    					<del>
	                    						<span class="woocommerce-Price-currencySymbol">€</span>16,01
	                    					</del>
	                    				</span>
	                    				<span class="woocommerce-Price-amount amount">
	                    					<bdi>
	                    						<span class="woocommerce-Price-currencySymbol">€</span>14,37
	                    					</bdi>
	                    				</span> 
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="myac-pro-grd-item">
	                    		<div class="myac-pro-grd-item-inr">
	                    			<div class="myac-pro-grd-img">
	                    				<img src="<?php echo THEME_URI;?>/assets/images/product-img-full-01.jpg">
	                    			</div>
	                    			<h5>Feest Gourmet</h5>
	                    			<p>Pulvinar convallis enim lacus</p>

	                    			<div class="product-price">
	                    				<span class="woocommerce-Price-amount amount">
	                    					<del>
	                    						<span class="woocommerce-Price-currencySymbol">€</span>16,01
	                    					</del>
	                    				</span>
	                    				<span class="woocommerce-Price-amount amount">
	                    					<bdi>
	                    						<span class="woocommerce-Price-currencySymbol">€</span>14,37
	                    					</bdi>
	                    				</span> 
	                    			</div>
	                    		</div>
	                    	</div>
	                    </div>
	                  </div>
	                </div>
	                </li>
	              <?php endforeach; ?>
	            </ul>
	            <div class="order-details-btn">
	            	<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'cbv-orders' ) ); ?>">Bekijk alles</a>
	            </div>
	            <?php endif; ?>
	          </div>
			</div>
		</div>
	</div>
</div>
