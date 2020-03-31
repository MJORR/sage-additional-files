<?php
  $images = get_sub_field('images'); 
  if($images): ?>
    <div class="carousel" data-fade>
      <?php foreach($images as $image): ?>
		<div>
		<img src="<?php echo $image['url']; ?>" class="w-100" alt="<?php echo $image['alt']; ?>" />
		</div>
    <?php endforeach; ?>
</div>
<?php endif; ?>