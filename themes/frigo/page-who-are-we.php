<?php 
/*
  Template Name: Who Are We
*/
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/breadcrumbs');
?>
<section class="who-are-you-sec">
  <div class="container">
    <?php 
      $overview = get_field('overview', $thisID);
      if( $overview ): 
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="who-are-you-desc-inr">
          <?php if( !empty($overview['titel']) ) printf('<h1 class="who-are-you-title">%s</h1>', $overview['titel']); ?>
          <div class="who-are-you-desc-cntlr">
            <div class="who-are-you-lft">
              <?php if( !empty($overview['subtitel']) ) printf('<p>%s</p>', $overview['subtitel']); ?>
            </div>
            <div class="who-are-you-rt">
              <?php if( !empty($overview['beschrijving']) ) echo wpautop( $overview['beschrijving'] ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php 
      $contents = get_field('content', $thisID);
      if( $contents ): 
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="who-are-you-grid-cntlr">
          <ul class="reset-list">
            <?php 
            foreach( $contents as $content ): 
              $contlink = $content['knop'];
              $contImg = !empty($content['afbeelding'])? cbv_get_image_src( $content['afbeelding'], 'hawgrid' ): '';
            ?>
            <li>
              <div class="wru-grid-item">
                <?php if( !empty($content['titel']) ) printf('<h3 class="wru-grid-item-title show-sm">%s</h3>', $content['titel']); ?>
                <div class="wru-grid-item-img-cntlr">
                  <?php if( !empty($contlink) ): ?>
                  <a class="overlay-link" href="<?php echo $contlink; ?>"></a>
                  <?php endif; ?>
                  <div class="wru-grid-item-img dft-transition inline-bg" style="background-image: url('<?php echo $contImg; ?>');"></div>
                </div>
                <div class="wru-grid-item-desc">
                  <h3 class="wru-grid-item-desc-title hide-sm">
                    <?php if( !empty($contlink) ): ?>
                    <a href="<?php echo $contlink; ?>"><?php if( !empty($content['titel']) ) printf('%s', $content['titel']); ?></a>
                    <?php else: ?>
                      <?php if( !empty($content['titel']) ) printf('%s', $content['titel']); ?>
                    <?php endif; ?>
                  </h3>
                  <?php if( !empty($content['beschrijving']) ) echo wpautop( $content['beschrijving'] ); ?>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<section class="wzw-work">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="work-inr wzw-work-inr">
          <?php 
            $hwhdr = get_field('hoe_werkt_hdr', $thisID);
            $hwusps= get_field('hoe_werkt_usp', $thisID);
          ?>
          <?php if( $hwhdr ): ?>
          <div class="sec-entry-hdr">
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
              <div class="workSlideItem">
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
            $hoe_werktknop = get_field('hoe_werktknop', $thisID);
            $hwknop = $hoe_werktknop['knop'];
            if( is_array( $hwknop ) &&  !empty( $hwknop['url'] ) ){
                printf('<div class="work-sec-btn wzw-work-sec-btn show-sm"><a class="fl-btn" href="%s" target="%s">%s</a></div>', $hwknop['url'], $hwknop['target'], $hwknop['title']); 
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php  
  $promo = get_field('promo', $thisID);
  if($promo):
    $promoposter = !empty($promo['afbeelding'])? cbv_get_image_src( $promo['afbeelding'], 'full' ): '';
?>
<section class="wzw-promotion inline-bg" style="background-image: url('<?php echo $promoposter; ?>');">
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-inr wzw-promotion-inr">
            <?php if( !empty($promo['titel']) ) printf( '<h2 class="bnr-title">%s</h1>', $promo['titel'] ); ?>
            <h6 class="bnr-sub-title">
              <?php if( !empty($promo['subtitel']) ) printf( '<span><i>*</i>%s</span>', $promo['subtitel'] ); ?>
            </h6>
            <?php 
              $hbknop = $promo['knop'];
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
<?php get_footer(); ?>