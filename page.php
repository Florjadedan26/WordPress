<?php get_header();
  while (have_posts()) {
    the_post(); ?>  
   
   <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo get_the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>change me later ok</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">

      <?php
          $Parent = wp_get_post_parent_id(get_the_ID ());
          if ($Parent){ ?>
           <div class="metabox metabox--position-up metabox--with-home-link">
             <p>
          <a class="metabox__blog-home-link" href="<?php echo get_the_permalink($Parent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($Parent); ?></a> <span class="metabox__main"><?php the_title();?> </span>
             </p>
           </div>
         <?php }
      ?>

      <?php
      $array = get_pages(array(
        'child_of' => get_the_ID()

      ));
      
      if ($Parent or $array ){ ?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_the_permalink($Parent); ?>"><?php echo get_the_title($Parent); ?></a></h2>
        <ul class="min-list">
          <?php
            if ($Parent){
              $childof = $Parent;
            } else {
              $childof = get_the_ID();
            }
            wp_list_pages(array (
                'title_li' => NULL,
                'child_of' => $childof,
                'sort_column' => 'menu_order'
            ));
          ?>
        </ul>
      </div>

      <?php } ?>     

      <div class="generic-content">
        <?php echo the_content(); ?>
      </div>
    </div>
   
 <?php  }
 get_footer();
?>