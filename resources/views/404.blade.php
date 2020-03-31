@extends('layouts.app')

<?php

global $post;
$page = get_page_by_path('404-page');
$post = get_post($page->ID);

?>

@section('content')

  <?php $content_width = (get_field('content_width') ? $content_width = get_field('content_width') : 'container'); ?>
  
  <section class="bg-white">
    <div class="<?php echo $content_width; ?>">
      <?php echo apply_filters('the_content', $post->post_content); ?>
    </div>
  </section>

@endsection