<?php 
get_header(); 
$thisID = get_the_ID();
while ( have_posts() ) :
  the_post();
?>
<section class="page-breadcrumbs-sec hide-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-breadcrumbs">
          <?php cbv_both_breadcrump(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="innerpage-con-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <article class="default-page-con">
      	<?php if(have_rows('inhoud')){  ?>
      		<?php while ( have_rows('inhoud') ) : the_row();  ?>
	        <?php 
	        if( get_row_layout() == 'introductietekst' ){ 
	          $title = get_sub_field('titel');
	          $afbeelding = get_sub_field('afbeelding');
	      	?>
			<div class="dft-promo-module clearfix">
				<?php 
		            if( !empty($title) ) printf('<div class="block-930"><strong class="dft-promo-module-title">%s</strong></div>', $title); 
		            if( !empty($afbeelding) ){
		              echo '<div class="dfp-plate-one-img-bx">', cbv_get_image_tag($afbeelding), '</div>';
		            }
	          	?>
			</div>
			<?php 
			}elseif( get_row_layout() == 'teksteditor' ){ 
			$beschrijving = get_sub_field('fc_teksteditor');
			?>
          <div class="block-930">
            <div class="dft-text-module clearfix">
              <?php if( !empty( $beschrijving ) ) echo wpautop($beschrijving); ?>
            </div>
          </div>
          <?php }elseif( get_row_layout() == 'galerij' ){ ?>
          	<?php 		
			$galleries = get_sub_field('afbeeldingen');
			$lightbox = get_sub_field('lightbox');
			$kolom = get_sub_field('kolom');
			if( $galleries ): 
          	?>
				<div class="block-930">
				<div class="gallery-wrap clearfix">
				  <div class="gallery gallery-columns-<?php echo $kolom; ?>">
				  	<?php foreach( $galleries as $image ): ?>
				    <figure class="gallery-item">
				      <div class="gallery-icon portrait">
				        <?php 
			                if( $lightbox ){
								echo "<a data-fancybox='gallery' href='{$image['url']}'>";
								echo cbv_get_image_tag( $image, 'dfpageg1' );
								echo "</a>";
			                }else{
			                	echo cbv_get_image_tag( $image, 'dfpageg1' );
			                }
				        ?>
				      </div>
				    </figure>
					<?php endforeach; ?>
				  </div>
				</div>
				</div>
      		<?php endif; ?>
		    <?php 
		      }elseif( get_row_layout() == 'usps' ){
		      $fc_usps = get_sub_field('fc_usp'); 
		      if( $fc_usps ):
		    ?>
			<div class="dft-works">
				<div class="work-slider-cntlr">
					<div class="work-slider workSlider">
						<?php 
						foreach( $fc_usps as $fcusp ):
						$fcIcon = !empty($fcusp['icon'])? cbv_get_image_tag( $fcusp['icon'], 'full' ): ''; 
						?>
					    <div class="workSlideItem">
					        <div class="work-item-cntlr">
					          <div class="work-item">

					            <div class="work-item-icon mHc">
					              <?php echo $fcIcon; ?>
					            </div>
					            <?php 
			                        if( !empty($fcusp['titel']) ) printf('<h4 class="work-item-title mHc1">%s</h4>', $fcusp['titel']);
			                        if( !empty($fcusp['tekst']) ) echo wpautop( $fcusp['tekst'] );
		                      	?>
					          </div>
					        </div>
					    </div>
					    <?php endforeach; ?>
					</div>
				</div>
			</div>
          	<?php endif; ?>
			<?php 
			}elseif( get_row_layout() == 'afbeelding_tekst' ){ 
			$fc_afbeelding = get_sub_field('fc_afbeelding');
			$imgsrc = cbv_get_image_src($fc_afbeelding, 'dfpageg1');
			$fc_tekst = get_sub_field('fc_tekst');
			$positie_afbeelding = get_sub_field('positie_afbeelding');
			$imgposcls = ( $positie_afbeelding == 'right' ) ? ' fl-dft-rgtimg-lftdes' : '';
			?>
			<div class="block-930">
			<div class="fl-dft-overflow-controller">
			  <div class="fl-dft-lftimg-rgtdes clearfix<?php echo $imgposcls; ?>">
			    <div class="fl-dft-lftimg-rgtdes-lft mHc" style="background-image: url(<?php echo $imgsrc; ?>);"></div>
			    <div class="fl-dft-lftimg-rgtdes-rgt mHc">
			      <?php echo wpautop($fc_tekst); ?>
			    </div>
			  </div>
			</div>
			</div>
	        <?php }elseif( get_row_layout() == 'products' ){
              	$productIDS = get_sub_field('fc_products');
				if( !empty($productIDS) ){
					$count = count($productIDS);
					$pIDS = ( $count > 1 )? $productIDS: $productIDS;
					$pQuery = new WP_Query(array(
					'post_type' => 'product',
					'posts_per_page'=> $count,
					'post__in' => $pIDS,
					'orderby' => 'date',
					'order'=> 'asc',

					));
				  
				}else{
					$pQuery = new WP_Query(array());
				}
				if( $pQuery->have_posts() ):
            ?>
			<div class="dft-pro-items-cntlr">
				<div class="spotlight-slider-cntlr">
				  <div class="spotlight-silder spotlightSlider">
	                <?php 
	                  while($pQuery->have_posts()): $pQuery->the_post(); 
	                  global $product, $woocommerce, $post;
	                ?>
				    <div>
				      <div class="pro-item-cntlr">
	                    <?php 
	                    $person = ' ';
	                    $itemCls = 'notSimple';
	                      switch ( $product->get_type() ) {
	                      case "variable" :
	                          $link   = get_permalink($product->get_id());
	                          $label  = apply_filters('variable_add_to_cart_text', __('Selecteer optie', 'woocommerce'));
	                      break;
	                      case "grouped" :
	                          $link   = get_permalink($product->get_id());
	                          $label  = apply_filters('grouped_add_to_cart_text', __('Selecteer optie', 'woocommerce'));
	                      break;
	                      case "external" :
	                          $link   = get_permalink($product->get_id());
	                          $label  = apply_filters('external_add_to_cart_text', __('Less Meer', 'woocommerce'));
	                      break;
	                      default :
	                          $link   = esc_url( $product->add_to_cart_url() );
	                          $label  = apply_filters('add_to_cart_text', __('Bestel nu', 'woocommerce'));
	                          $person = 'Aantal personen';
	                          $itemCls = 'prsimple';
	                      break;
	                      }
	                      $isShowWeekProdict = get_field('weekend_product', $product->get_id());
	                      $gridurl = cbv_get_image_src( get_post_thumbnail_id($product->get_id()), 'hprogrid' );
	                      echo "<div class='pro-item {$itemCls}'>";
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
	                      echo "<strong>{$person}</strong>";
	                      echo '<div class="product-quantity product-quantity-cntlr">';
	                      if ( ! $product->is_in_stock() ) :

	                      else:
	                      if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && ! $product->is_sold_individually() ) {
	                      echo '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
	                      echo '<div class="quantity qty"><span class="minus">-</span>';
	                      echo woocommerce_quantity_input( array('min_value' => 1, 'max_value' => 5), $product, false );
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
	                    ?>
				      </div>
				    </div>
				    <?php endwhile; ?>
				  </div>
				</div>
			</div>
      		<?php endif; wp_reset_postdata(); ?>
            <?php 
        		}elseif( get_row_layout() == 'getuigenis' ){ 
        		$fc_getuigenis = get_sub_field('fc_getuigenis');
        		$fc_naam = get_sub_field('fc_naam');
            ?>
            <div class="block-930">
	            <div class="dft-blockquote-cntlr">
	              <div class="dft-blockquote">
	                <i>
	                  <svg class="blockquote-icon-svg hide-sm" width="48" height="48" viewBox="0 0 48 48" fill="#A61916">
	                    <use xlink:href="#blockquote-icon-svg"></use>
	                  </svg> 
	                  <span class="show-sm"><img src="<?php echo THEME_URI; ?>/assets/images/blockquote-icon-xs.png"></span>
	                </i>
	                <?php 
                	if( !empty($fc_getuigenis) ) printf('<blockquote>%s</blockquote>', $fc_getuigenis); 
                	if( !empty($fc_naam) ) printf('<strong class="show-sm">%s</strong>', $fc_naam); 
	                ?>
	              </div>
	            </div>
            </div>
      		<?php } ?>
		<?php endwhile; ?>
		<?php }else{ ?>
			<?php the_content(); ?>
		<?php } ?>
		<?php if( is_cart() OR is_checkout() OR is_account_page() ): ?>
		<?php else: ?>
            <div class="block-930">
            <div class="dft-newsletter-form">
              <div class="dft-newsletter-form-hdr">
                <h6 class="nfh-title">Schrijf in op de nieuwsbrief</h6>
                <p>Mauris vehicula non arcu eu facilisis. Morbi vitae lectus eget libero ullamcorper suscipit.</p>
              </div>
              <div class="ftr-top-newsletter"> 
                <form class="needs-validation" novalidate>
                  <div class="from-group-wrp clearfix">
                    <div class="from-group-3-col clearfix">
                      <div class="from-group hide-sm">
                        <input placeholder="Voornaam" type="text" class="form-control" required>
                      </div> 
                      <div class="from-group">
                        <input placeholder="Naam" type="text" class="form-control" required> 
                      </div>
                      <div class="from-group">
                        <input placeholder="E-mail address" type="email" class="form-control" required>
                      </div>
                    </div>
                    <div class="from-group-msg">
                      <p>Wij respecteren uw privacy. Jouw gegevens worden altijd vertrouwelijk behandeld.</p>
                    </div>
                    <div class="from-group-submit">
                      <button type="submit" name="submit">Verzenden</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="dft-btns">
              <div class="dft-btn-cntlr">
                <a href="#" class="dft-btn">BUTTOn</a>
              </div>
            </div>
          </div>
     	 <?php endif; ?>
        </article>
      </div>
    </div>
  </div>
</section>
<?php 
endwhile; 
get_footer(); 
?>