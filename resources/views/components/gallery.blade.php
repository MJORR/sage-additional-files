<?php
$images = get_sub_field('images');
if($images):?>
    <div class="row gallery">
        <?php foreach($images as $image): ?>
			<div class="col-6 col-sm-<?php echo get_sub_field('columns'); ?>">
				<a href="<?php echo $image['url']; ?>" data-lightbox="gallery" data-title="<?php echo $image['caption']; ?>" rel="lightbox">
					<img src="<?php echo $image['url']; ?>" class="w-100" alt="<?php echo $image['alt']; ?>" />
				</a>
				<?php if($image['caption']){ ?><p><?php echo $image['caption']; ?></p><?php } ?>
			</div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>