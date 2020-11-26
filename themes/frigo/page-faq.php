<?php 
/*
  Template Name: FAQ
*/
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/breadcrumbs');
?>
<section class="search-sec show-sm">
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

<?php $faqs = get_field('pagetitle_sec', $thisID); ?>
<section class="faq-tab-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="faq-tab-wrp">
          <?php if( $faqs ): ?>
          <div class="contact-form-dsc">
            <?php 
              if( !empty($faqs['titel']) ) printf('<h1 class="contact-form-dsc-title">%s</h1>', $faqs['titel']);
              if( !empty($faqs['beschrijving']) ) echo wpautop( $faqs['beschrijving'] );
            ?>
          </div>
          <?php endif; ?>
            <?php 
              $terms = get_terms( array(
                'taxonomy' => 'faq_cat',
                'hide_empty' => false,
                'parent' => 0
              ) );
              
            ?>
          <div class="faq-tabs hide-sm">
            <ul class="reset-list tabs-menu">
              <li class="active"><a href="#">Alle</a></li>
              <?php if( $terms ): ?>
                <?php
                foreach( $terms as $term ):
                ?>
                  <li><a href="#"><?php echo $term->name; ?></a></li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
          <?php 
            $query = new WP_Query(array( 
                'post_type'=> 'faqs',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date'
              ) 
            );
            
            if($query->have_posts()){
              
          ?>
          <div class="faq-accordion-wrp">
            <ul class="clearfix reset-list tabs">
              <?php
                
                while($query->have_posts()): $query->the_post();
                  $category = get_the_terms( get_the_ID(), 'faq_cat' );
                  $output = array();
                  $term_name = ''; 
                  if($category && ! is_wp_error( $category )):
                    foreach($category as $cat){
                          $output[] = $cat->slug;
                    }
                    $term_name = join( " ", $output );
                  endif;
                  
              ?> 
              <li class="<?php echo $term_name; ?>">
                <div class="faq-accordion-controller">
                  <h6 class="faq-accordion-title"><?php the_title(); ?></h6>
                  <span></span>
                  <div class="faq-accordion-dsc">
                    <?php the_content(); ?>
                  </div>
                </div>
              </li>
              <?php endwhile; ?>
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
          <?php } wp_reset_postdata();?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>