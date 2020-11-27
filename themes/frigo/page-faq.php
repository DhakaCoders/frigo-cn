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
                  <li><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>

          <div class="faq-accordion-wrp">
            <?php 
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              $query = new WP_Query(array( 
                  'post_type'=> 'faqs',
                  'post_status' => 'publish',
                  'posts_per_page' => 2,
                  'orderby' => 'date',
                  'paged' => $paged
                ) 
              );
              if($query->have_posts()){
            ?>
            <ul class="clearfix reset-list">
              <?php
                while($query->have_posts()): $query->the_post();
              ?> 
              <li>
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
            <?php }else{?>
            <div class="no-result"><p>Geen resultaten</p></div>
            <?php } wp_reset_postdata();?>
          </div>
          <?php if( $query->max_num_pages > 1 ): ?>
          <div class="faq-pagi-ctlr">
            <?php 
              $big = 999999999; // need an unlikely integer
              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $query->max_num_pages,
                'type'  => 'list',
                'show_all' => false,
                'prev_text' => '<i>
                      <svg class="faq-lft-arrows-icon-svg" width="10" height="10" viewBox="0 0 10 10" fill="717171">
                        <use xlink:href="#faq-lft-arrows-icon-svg"></use>
                      </svg>  
                    </i>Vorige',
                'next_text' => 'Volgende<i>
                      <svg class="faq-rgt-arrows-icon-svg" width="10" height="10" viewBox="0 0 10 10" fill="717171">
                        <use xlink:href="#faq-rgt-arrows-icon-svg"></use>
                      </svg>  
                    </i>',
                'type'      => 'list',
                'end_size'  => 3,
                'mid_size'  => 3,
              ) ); 
            ?>
          </div>
         <?php endif; ?>
          
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>