<?php get_header(); ?>
<section class="search-sec show-md">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="search-cntlr">
          <form action="" class="bnr-search">
            <input type="text" placeholder="Zoeken">
            <button>
              <i>
                <svg class="bnr-srch-icon-svg" width="30" height="30" viewBox="0 0 30 30" fill="#A61916">
                  <use xlink:href="#bnr-srch-icon-svg"></use>
                </svg>
              </i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php  
  $hbanner = get_field('home_banner', HOMEID);
  if($hbanner):
    $bannerposter = !empty($hbanner['afbeelding'])? cbv_get_image_src( $hbanner['afbeelding'], 'full' ): '';
?>
<section class="banner-sec inline-bg" style="background-image: url('<?php echo $bannerposter; ?>');">
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-inr">
            <?php if( !empty($hbanner['titel']) ) printf( '<h1 class="bnr-title">%s</h1>', $hbanner['titel'] ); ?>
            <h6 class="bnr-sub-title">
              
              <?php if( !empty($hbanner['subtitel']) ) printf( '<span><i>*</i>%s</span>', $hbanner['subtitel'] ); ?>
            </h6>
            <form action="" class="bnr-search">
              <input type="text" placeholder="Zoeken Producten">
              <button>
                <i>
                  <svg class="bnr-srch-icon-svg" width="30" height="30" viewBox="0 0 30 30" fill="#A61916">
                    <use xlink:href="#bnr-srch-icon-svg"></use>
                  </svg>
                </i>
              </button>
            </form>
            <strong>- OF - </strong>
            <?php 
              $hbknop = $hbanner['knop'];
              if( is_array( $hbknop ) &&  !empty( $hbknop['url'] ) ){
                  printf('<div class="bnr-btn"><a class="fl-btn" href="%s" target="%s">%s</a></div>', $hbknop['url'], $hbknop['target'], $hbknop['title']); 
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php  
  $showhide_products = get_field('showhide_products', HOMEID);
  if($showhide_products): 
?>
<section class="spotlight-sec">
  <div class="container-lg">
      <div class="row">
        <div class="col-md-12">
          <?php 
            $hproduct = get_field('homeproduct');
            if( $hproduct ): 
          ?>
          <div class="spotlight-inr">
            <div class="sec-entry-hdr">
              <?php 
                if( !empty($hproduct['titel']) ) printf('<h2 class="sec-entry-hdr-title">%s</h2>', $hproduct['titel']);
                if( !empty($hproduct['beschrijving']) ) echo wpautop( $hproduct['beschrijving'] );
              ?>
            </div>
            <?php 
            $productIDS = $hproduct['products'];
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
              $pQuery = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page'=> 9,
                'orderby' => 'date',
                'order'=> 'desc',

              ));
            }
            if( $pQuery->have_posts() ):
            ?>
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
                      echo loop_qty_input();
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
            <?php endif; wp_reset_postdata(); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
  </div>    
</section>
<?php endif; ?>
<?php  
  $showhide_hoewerkt = get_field('showhide_hoewerkt', HOMEID);
  if($showhide_hoewerkt): 
?>
<section class="work-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php 
          $hwhdr = get_field('hoe_werkt_hdr', HOMEID);
          $hwusps= get_field('hoe_werkt_usp', HOMEID);
        ?>
        <div class="work-inr">
          <?php if( $hwhdr ): ?>
          <div class="sec-entry-hdr work-sec-entry-hdr">
            <?php 
              if( !empty($hwhdr['titel']) ) printf('<h2 class="sec-entry-hdr-title">%s</h2>', $hwhdr['titel']);
              if( !empty($hwhdr['beschrijving']) ) echo wpautop( $hwhdr['beschrijving'] );
            ?>
          </div>
          <?php endif; ?>
          <?php if( $hwusps ): ?>
          <div class="work-slider-cntlr">
            <div class="work-slider workSlider">
              <?php 
              foreach( $hwusps as $hwusp ):
              $hwuspIcon = !empty($hwusp['icon'])? cbv_get_image_tag( $hwusp['icon'], 'full' ): ''; 
              ?>
              <div>
                <div class="work-item-cntlr">
                  <div class="work-item">
                      
                      <div class="work-item-icon mHc">
                        <?php echo $hwuspIcon; ?>
                      </div>
                      <?php 
                        if( !empty($hwusp['titel']) ) printf('<h4 class="work-item-title mHc1">%s</h4>', $hwusp['titel']);
                        if( !empty($hwusp['tekst']) ) echo wpautop( $hwusp['tekst'] );
                      ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>
          <?php 
            $hoe_werktknop = get_field('hoe_werktknop', HOMEID);
            $hwknop = $hoe_werktknop['knop'];
            if( is_array( $hwknop ) &&  !empty( $hwknop['url'] ) ){
                printf('<div class="work-sec-btn"><a class="fl-btn" href="%s" target="%s">%s</a></div>', $hwknop['url'], $hwknop['target'], $hwknop['title']); 
            }
          ?>
        </div>
        
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php  
  $showhide_overons = get_field('showhide_overons', HOMEID);
  if($showhide_overons): 
?>
<section class="about-frigobox">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php 
          $hoverons = get_field('home_overons', HOMEID);
          if( $hoverons ):
          $hoverposter = !empty($hoverons['afbeelding'])? cbv_get_image_src( $hoverons['afbeelding'], 'hhovergrid' ): '';
        ?>
        <div class="lft-img-rt-desc-mdul-cntlr">
          <div class="lft-img-rt-desc-mdul-img inline-bg" style="background-image: url('<?php echo $hoverposter; ?>');">
            
          </div>
          <div class="lft-img-rt-desc-mdul-desc">
            <?php 
              if( !empty($hoverons['titel']) ) printf('<h4 class="lft-img-rt-desc-mdul-desc-title">%s</h4>', $hoverons['titel']);
              if( !empty($hoverons['beschrijving']) ) echo wpautop( $hoverons['beschrijving'] );
              $hovknop = $hoverons['knop'];
              if( is_array( $hovknop ) &&  !empty( $hovknop['url'] ) ){
                  printf('<div class="lft-img-rt-desc-mdul-desc-btn"><a class="fl-btn" href="%s" target="%s">%s</a></div>', $hovknop['url'], $hovknop['target'], $hovknop['title']); 
              }
            ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>