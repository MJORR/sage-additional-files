<? if(!empty( get_the_content())){ 
  $content_width = (get_field('content_width') ? $content_width = get_field('content_width') : 'container');
?>

  <section class="bg-white">
    <div class="<?php echo $content_width; ?>">
      @php(the_content())
    </div>
  </section>
  
  <?php } ?>

  <section class="useful-contacts">
  <div class="container-lg">
     
  <h2>Useful Contacts</h2>


<?php

// args
$args = array(
	'numberposts'	=> -1,
  'post_type'		=> 'people',
  'tax_query' => array(
    array (
        'taxonomy' => 'person-type',
        'field' => 'slug',
        'terms' => 'useful-contact',
    )
),
);

// search

//$args['s'] = $_POST['term'];

// query
$the_query = new WP_Query( $args );
?>

<?php if( $the_query->have_posts() ): ?>


  <div class="row mt-4">

      <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <div class="col-md-3 col-sm-6 col-12 mb-4">
        
          <div class="title"><?php the_title(); ?><div>
          <div class="job-title"><?php the_field('job-title'); ?></div>
          <div class="town"><?php the_field('town'); ?></div>

          <p class="mt-3">
          <div class="phone p-0"><?php the_field('phone'); ?></div>
          <div class="email p-0"><?php the_field('email'); ?></div>
          <p>
         
      </div>
        
      <?php endwhile; ?>
  
  </div>
  

<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data  ?>

  </div>
</section>

  @include('content-components')




  