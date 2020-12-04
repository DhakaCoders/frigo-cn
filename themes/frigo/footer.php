<?php 
  $logoObj = get_field('ftlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }

  $contact_title = get_field('titel', 'options');
  $address = get_field('address', 'options');
  $gmurl = get_field('url', 'options');
  $telefoon = get_field('telefoon', 'options');
  $email = get_field('emailadres', 'options');
  $bwt = get_field('btw', 'options');
  $gmaplink = !empty($gmurl)?$gmurl: 'javascript:void()';
  $vennootschap = get_field('vennootschap', 'options');
  $polisnr = get_field('polisnr', 'options');
  $smedias = get_field('social_media', 'options');
  $copyright_text = get_field('copyright_text', 'options');
?>
<footer class="footer-wrp">
  <div class="ftr-top">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="ftr-col-main clearfix">
            <div class="ftr-col ftr-col-1">
              <div class="ftr-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
              </div>
              <div class="ftr-socail-icon hide-md">
                <?php if(!empty($smedias)):  ?>
                <ul class="reset-list clearfix">
                  <?php foreach($smedias as $smedia): ?>
                  <li>
                    <a target="_blank" href="<?php echo $smedia['url']; ?>">
                        <?php echo $smedia['icon']; ?>
                    </a>
                 </li>
                 <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>
            </div>
            <div class="ftr-col ftr-col-5">
              <h6><span>Schrijf in op onze nieuwsbrief</span></h6>
              <p>Mauris vehicula non arcu eu facilisis. Morbi vitae <br> lectus eget libero ullamcorper suscipit.</p>
              <div class="ftr-top-newsletter"> 
                <form class="needs-validation" novalidate>
                  <div class="from-group-wrp clearfix">
                    <div class="from-group">
                      <input placeholder="Voornaam" type="text" class="form-control" required>
                    </div> 
                    <div class="from-group">
                      <input placeholder="Naam" type="text" class="form-control" required> 
                    </div>
                    <div class="from-group">
                      <input placeholder="E-mail address" type="email" class="form-control" required>
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
            <div class="ftr-col ftr-col-4">
              <h6><span><?php _e( 'Contact info', THEME_NAME ); ?></span></h6>
              <ul class="reset-list clearfix">
                <?php 
                  if( !empty($contact_title) ) printf('<li><strong>%s</strong></li>', $contact_title);
                  if( !empty($address) ) printf('<li><a href="%s">%s</a></li>', $gmaplink, $address);
                  if( !empty($telefoon) ) printf('<li><span>Telefoon: <a href="tel:%s">%s</a></span></li>', phone_preg($telefoon),  $telefoon); 
                  if( !empty($email) ) printf('<li><span>E-Mail: <a href="mailto:%s">%s</a></span></li>', $email, $email); 
                  if( !empty($bwt) ) printf('<li><span>BTW: %s</span>', $bwt); 
                ?>
              </ul>              
            </div>
            <div class="ftr-col ftr-col-3">
              <h6><span><?php _e( 'Praktische info', THEME_NAME ); ?></span></h6>
              <?php 
                $fmenuOptions2 = array( 
                    'theme_location' => 'cbv_ftb_menu', 
                    'menu_class' => 'reset-list clearfix',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $fmenuOptions2 );
              ?> 
              <div class="ftr-socail-icon show-md">
                <?php if(!empty($smedias)):  ?>
                <ul class="reset-list clearfix">
                  <?php foreach($smedias as $smedia): ?>
                  <li>
                    <a target="_blank" href="<?php echo $smedia['url']; ?>">
                        <?php echo $smedia['icon']; ?>
                    </a>
                 </li>
                 <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>           
            </div>
            <div class="ftr-col ftr-col-2 hide-md"> 
              <h6 class="active"><span><?php _e( 'Navigatie', THEME_NAME ); ?></span></h6>
              <?php 
                $fmenuOptions1 = array( 
                    'theme_location' => 'cbv_fta_menu', 
                    'menu_class' => 'reset-list clearfix',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $fmenuOptions1 );
              ?>
            </div>    
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ftr-btm">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ftr-btm-innr clearfix">
            <div class="ftr-btm-col-1 hide-md">
              <?php if( !empty( $copyright_text ) ) printf( '<span>%s</span>', $copyright_text); ?> 
            </div>
            <div class="ftr-btm-col-2">
              <ul class="reset-list clearfix">
                <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ftr-btm-logo-1.png"></a></li>
                <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ftr-btm-logo-2.png"></a></li>
                <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ftr-btm-logo-3.png"></a></li>
                <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ftr-btm-logo-4.png"></a></li>
                <li><a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/ftr-btm-logo-5.png"></a></li>
              </ul>
            </div>
            <div class="ftr-btm-col-1 show-md">
              <?php if( !empty( $copyright_text ) ) printf( '<span>%s</span>', $copyright_text); ?> 
            </div>
            <div class="ftr-btm-col-3 text-right">
              <a href="#">webdesign by conversal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php 
$hdlogoObj = get_field('hdlogo', 'options');
if( is_array($hdlogoObj) ){
  $hdlogo_tag = '<img src="'.$hdlogoObj['url'].'" alt="'.$hdlogoObj['alt'].'" title="'.$hdlogoObj['title'].'">';
}else{
  $hdlogo_tag = '';
}
?>
<div class="show-md">
  <div class="xs-pop-up-menu">
    <div class="xs-pop-up-menu-inr">
      <div class="xs-pop-up-menu-top">
        <div class="logo-close-btn-cntlr">
          <div class="xs-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <?php echo $hdlogo_tag; ?>
            </a>
          </div>
          <div class="xs-menu-bar">
            <div class="xs-menu-bar-inr">
              <div class="xs-menu-bar-close">
                <span><img src="<?php echo THEME_URI; ?>/assets/images/xs-close-icon.png"></span>
                <strong>SLUITEN</strong>
              </div>
            </div>
          </div>
        </div>
        <div class="xs-search">
          <div class="search-cntlr">
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
          </div>
        </div>
      </div>
      <div class="xs-pop-menu-con">
        <nav class="xs-main-nav clearfix">
        <?php 
        $cmenuOptions = array( 
            'theme_location' => 'cbv_main_menu', 
            'menu_class' => 'clearfix reset-list',
            'container' => '',
            'container_class' => ''
          );
        wp_nav_menu( $cmenuOptions ); 
        ?>
        </nav>
        <div class="xs-social">
          <div class="hdr-social">
            <?php if(!empty($smedias)):  ?>
            <ul class="reset-list clearfix">
              <?php foreach($smedias as $smedia): ?>
              <li>
                <a target="_blank" href="<?php echo $smedia['url']; ?>">
                    <?php echo $smedia['icon']; ?>
                </a>
             </li>
             <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>
        <div class="xs-sign-up">
          <div class="xs-hdr-sign-up">
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
              <i>
                <svg class="xs-login-icon-svg" width="16" height="18" viewBox="0 0 16 18" fill="#FFFFFF">
                  <use xlink:href="#xs-login-icon-svg"></use>
                </svg> 
              </i>
              <strong>Account/login</strong>
            </a>
            <a href="<?php echo wc_get_cart_url(); ?>">
              <i>
                <svg class="xs-cart-icon-svg" width="18" height="17" viewBox="0 0 18 17" fill="#FFFFFF">
                  <use xlink:href="#xs-cart-icon-svg"></use>
                </svg> 
              </i>
              <strong>winkelwagen</strong>
            </a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>