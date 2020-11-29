<?php 
/*
  Template Name: Contact
*/
get_header();
$thisID = get_the_ID();
while ( have_posts() ) :
  the_post();
  get_template_part('templates/breadcrumbs');
?>
<?php
  $form = get_field('formsec', $thisID);
  $gvragen = get_field('gestelde_vragen', $thisID);
?>
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

<section class="contact-form-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="contact-form-block">
          <?php if( $form ): ?>
          <div class="contact-form-wrp clearfix">
            <div class="contact-form-dsc">
              <?php 
                if( !empty( $form['titel'] ) ) printf( '<h1 class="contact-form-dsc-title">%s</h1>', $form['titel']); 
                if( !empty( $form['beschrijving'] ) ) echo wpautop( $form['beschrijving'] ); 
              ?>
            </div>
            <div class="wpforms-container">
              <?php if( !empty( $form['shortcode'] ) ) echo do_shortcode( $form['shortcode'] ); ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if( $gvragen ): ?>
          <div class="contact-msg-wrp clearfix">
            <div class="contact-msg-dsc">
              <i>
                <img src="<?php echo THEME_URI; ?>/assets/images/contact-msg-icon.png">
              </i>
              <?php 
                if( !empty( $gvragen['titel'] ) ) printf( '<h5 class="contact-msg-dsc-title">%s</h5>', $gvragen['titel']); 
                if( !empty( $gvragen['tekst'] ) ) echo wpautop( $gvragen['tekst'] ); 
              ?>
            </div>
            <?php 
              $knop = $gvragen['knop'];
              if( !empty( $knop) ){
                  printf('<div class="contact-msg-btn"><a href="%s">%s</a></div>', $knop, 'FAQ'); 
              }
            ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
endwhile; 
get_footer(); 
?>