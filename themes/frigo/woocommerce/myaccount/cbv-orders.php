<?php
/**
 * My Orders - Deprecated
 *
 * @deprecated 2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

$customer_orders = get_posts(
	apply_filters(
		'woocommerce_my_account_my_orders_query',
		array(
			'numberposts' => -1,
			'meta_key'    => '_customer_user',
			'meta_value'  => get_current_user_id(),
			'post_type'   => wc_get_order_types( 'view-orders' ),
			'post_status' => array_keys( wc_get_order_statuses() ),
		)
	)
);
?>
<div class="customer-order-details customer-order-controll">
<div><h4>Bestel Geschiedenis</h4></div>
<?php
if ( $customer_orders ) :
?>
<div class="faq-accordion-wrp cbvmyaccount">
    <ul class="clearfix reset-list tabs">
        <?php
		foreach ( $customer_orders as $customer_order ) :
			$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			$item_count = $order->get_item_count();
		?>
        <li>
        <div class="faq-accordion-controller">
			<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
				<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>

			<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created(), 'd. m. Y' ) ); ?></time>

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
            <p>Quam nunc massa scelerisque ultrices viverra aliquet diam tristique aliquam. Pharetra aliquet mattis laoreet cras. Mi tincidunt fames nunc, feugiat nunc, nullam sed <a href="#">commodo ante</a>. Nibh pharetra ullamcorper tempor at viverra scelerisque feugiat. Lectus nunc facilisis vulputate a ridiculus a quam bibendum eu.</p> 

            <p>Facilisi tristique in sed pellentesque ipsum at scelerisque. Habitant augue dictumst non at. Faucibus lorem ornare netus bibendum.</p>
          </div>
        </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<div class="faq-pagi-ctlr">
<ul class="reset-list page-numbers">
  <li>
    <a class="prev page-numbers" href="#">
     <i>
      <svg class="faq-lft-arrows-icon-svg" width="10" height="10" viewBox="0 0 10 10" fill="717171">
        <use xlink:href="#faq-lft-arrows-icon-svg"></use>
      </svg>  
     </i>
     Vorige
   </a>
  </li>
  <li><span class="page-numbers current">1</span></li>
  <li><a class="page-numbers" href="#">2</a></li>
  <li><a class="page-numbers" href="#">3</a></li>
  <li><a class="page-numbers" href="#">4</a></li>
  <li><span class="page-numbers dots">....</span></li>
  <li><a class="page-numbers" href="#">48</a></li>
  <li>
    <a class="next page-numbers" href="#">
    Volgende
    <i>
      <svg class="faq-rgt-arrows-icon-svg" width="10" height="10" viewBox="0 0 10 10" fill="717171">
        <use xlink:href="#faq-rgt-arrows-icon-svg"></use>
      </svg>  
     </i>
    </a>
  </li>
</ul>
</div>
<?php endif; ?>
<a href="javascript: history.go(-1)">terug naar dashboard</a>
</div>