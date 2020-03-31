<?php if(have_rows('hover-boxes')): ?>
<div class="row">
		<?php while(have_rows('hover-boxes')):the_row(); ?>
            <div class="col-12 col-sm-<?php echo get_sub_field('columns'); ?>">
				<div class="hover-box hover-box-primary zoom">
					<div class="parent right" onclick="">
						<div class="child" style="background-image:url(<?php the_sub_field('image'); ?>)">
							<div class="child-overlay"></div>
							<div>
								<h3><?php the_sub_field('title'); ?></h3>
							</div>
						</div>
						<a href="<?php the_sub_field('link'); ?>" style="color:white; text-align:center">
							<h3><?php the_sub_field('title'); ?></h3>
							<p><?php the_sub_field('description'); ?></p>
						</a>
					</div>
				</div>
			</div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>