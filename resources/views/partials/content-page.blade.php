<? if(!empty( get_the_content())){ 
  $content_width = (get_field('content_width') ? $content_width = get_field('content_width') : 'container');
?>

  <section class="bg-white">
    <div class="<?php echo $content_width; ?>">
      @php(the_content())
    </div>
  </section>
  
  <?php } ?>

  @include('content-components')