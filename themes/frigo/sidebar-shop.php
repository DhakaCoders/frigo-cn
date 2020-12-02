<div class="pro-overview-filter">
  <span>FIlter 
    <i>
      <svg class="filter-icon" width="18" height="12" viewBox="0 0 18 12" fill="#fff">
        <use xlink:href="#filter-icon"></use>
      </svg>
    </i>
  </span>
</div>
<div class="pro-overview-accordion">
  <div class="pro-ovrvw-accrdon-row">
    <div class="pro-ovrvw-accrdon-row-hdr">
    </div>
    <div class="pro-ovrvw-accrdon-row-btm">
    </div>
<div class="sidebar-widget" style="display: none;">
  <h4>Sorteren</h4>
  <div class="widget-cn clearfix">
    <?php do_action('cbv_catalog'); ?>
  </div>
</div>
<?php if ( is_active_sidebar( 'shop-widget' ) ) : ?>
    <?php dynamic_sidebar( 'shop-widget' ); ?>
<?php endif; ?>
  </div>
</div>