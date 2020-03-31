<div class="row">

  <?php while(has_sub_field("mixed_content")): ?>
    
    <div class="col-sm content" data-fade>

      <?php if(get_row_layout() == "text"): ?>

				<?php the_sub_field("text");?>

			<?php elseif(get_row_layout() == "quote"): ?>

				<blockquote>
					<?php the_sub_field("quote");?>
        </blockquote>
        
      <?php elseif(get_row_layout() == "film"): ?>

        <?php echo do_shortcode('[fve]'.get_sub_field("URL").'[/fve]'); ?>

			<?php elseif(get_row_layout() == "images"):

				$images = get_sub_field('images'); 
				if($images): ?>
				
        <?php if(count($images) > 1){ ?>

          <div class="row">
            <?php foreach($images as $image): ?>
              <div class="col">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" style="width:100%" />
                <p><?php echo $image['caption']; ?></p>
              </div>
            <?php endforeach; ?>
          </div>

        <?php }else{ ?>

          <?php foreach($images as $image): ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" style="width:100%" />
          <p><?php echo $image['caption']; ?></p>
          <?php endforeach; ?>

        <?php } ?>

			<?php endif; ?>

		<?php endif; ?>

	  </div>

  <?php endwhile; ?>
					
</div>