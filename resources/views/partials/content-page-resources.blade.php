<?php 

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'posts_per_page' => get_option('posts_per_page'),
        'paged' => $paged,
        'post_type'	=> 'resource'
        
    );


    // filter keyword
    if($_POST['term']){
        $args['s'] = $_POST['term'];
    }

   

    // filter taxonomies
    if(!empty($_POST['type']) || !empty($_POST['topic'])){



        $filter['tax_query'] = array();

       
        if(!empty($_POST['type'])){
            array_push(
                $filter['tax_query'],
                array(
                    'taxonomy' => 'resource-type',
                    'field'    => 'term_id',
                    'terms'    => $_POST['type'],
                )
            );
        }

        
        if(!empty($_POST['topic'])){
            array_push(
                $filter['tax_query'],
                array(
                    'taxonomy' => 'resource-topic',
                    'field'    => 'term_id',
                    'terms'    => $_POST['topic'],
                )
            );
        }

        if(count($filter['tax_query']) > 1){
            $filter['tax_query']['relation'] = 'OR';
        }


        $args = array_merge($filter, $args);
        

    }

    //echo "<pre>" . print_r($args, 1) . "</pre>";
   

    $the_query = new WP_Query($args);




?>



<? if(!empty( get_the_content())){ 
  $content_width = (get_field('content_width') ? $content_width = get_field('content_width') : 'container');
?>

  <section class="bg-white">
    <div class="<?php echo $content_width; ?>">
      @php(the_content())
    </div>
  </section>
  
  <?php } ?>


  <section>
    <div class="<?php the_field('content_width'); ?> resource-filters">

        <form action="" method="post" id="resource-filter" class="form-group-lg">
            
            <div class="row mb-4">
                
                <div class="col-12 col-sm-4">
                   
                        <span class="meta text-primary">Resource type</span><br />

                        <?php 

                        $terms = get_terms([
                            'taxonomy' => 'resource-type',
                            'hide_empty' => false
                        ]); 

                        ?>

                        <select name="type[]" class="selectpicker show-tick mb-4"  multiple data-max-options="1" data-style="btn-light" data-width="100%">  

                            <?php foreach($terms as $term) { ?>
                            <option value="<?php echo $term->term_id; ?>"  <?php if($_POST['type'] && in_array($term->term_id, $_POST['type'])){ ?>selected<?php } ?>><?php echo $term->name; ?></option>
                            <?php } ?>


                        </select>

                </div>


                <div class="col-12 col-sm-4 pr-4">
                
                        <span class="meta text-primary">Resource topic</span><br />


                        <?php 

                        $terms = get_terms([
                            'taxonomy' => 'resource-topic',
                            'hide_empty' => false
                        ]); 

                        ?>

                        <select name="topic[]" class="selectpicker show-tick mb-4"  multiple data-max-options="1" data-style="btn-light" data-width="100%"> 

                            <?php foreach($terms as $term) { ?>
                            <option value="<?php echo $term->term_id; ?>" <?php if($_POST['topic'] && in_array($term->term_id, $_POST['topic'])){ ?>selected<?php } ?>><?php echo $term->name; ?></option>
                            <?php } ?>

                        </select>

                </div>

                <div class="col-12 col-sm-4">
                   
                <span class="meta text-primary">Looking for something specific?</span><br />
                    <div style="position:relative">

                        <?php 
                          $new_term = stripslashes_deep($_POST['term']);
                        ?>
                        <input type="text" name="term" id="term" value="<?php echo $new_term; ?>" placeholder="Search term..." class="form-control bg-light border-0">

                        
                        <span id="term_cancel" <?php if(!$_POST['term']){ ?>style="visibility: hidden"<?php } ?>><i class="fas fa-times-circle text-primary"></i></span>
                    </div>

                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Filter">
            <a href="<?php echo $_SERVER['REQUEST_URI']; ?>" class="btn btn-link"><span class="meta text-primary">Reset</span></a>
        </form>

    </div>
</section>

  <section class="useful-contacts">
  <div class="container-lg">
     
  <h2>Resources</h2>


<?php if( $the_query->have_posts() ): ?>


    <div class="resource-container">

        <div class="row mt-4">

            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <div class="col-md-4 col-sm-6 col-12">
                <div class="resource-box">
                    
                    <?php if(get_field('feature_image')){ ?>

                            <div class="w-100 bg mb-3" style="background-image: url(<?php the_field('feature_image'); ?>)">

                                <a href="<?php the_permalink(); ?>">
                                <img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII=">
                                </a>

                            </div>
                    
                    <?php } ?>

                   <h5 class="text-primary"><?php the_title();?></h5>
                   <p><?php the_excerpt(); ?></p>

                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary">Read more</a>
                </div>
                </div> 
                
            <?php endwhile; ?>
        
        </div>

    </div>
  

<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data  ?>

  </div>
</section>

  @include('content-components')




  