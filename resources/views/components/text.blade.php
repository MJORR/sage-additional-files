<? if(get_sub_field('stack_mobile')){ ?>
			<div class="mobile-only-height">
			<div class="d-none d-md-block">
		<?php } ?>

			<?php if(get_sub_field('content_alignment') == 'left' ||
					get_sub_field('content_alignment') == 'right'){ ?>

					<div class="row content-headings">
						<div class="col-md-6<?php if(get_sub_field('content_alignment') == 'right'){ ?> offset-md-6<?php } ?>">

			<?php } ?>

			<?php if(get_sub_field('heading')){ ?><h2><?php the_sub_field('heading'); ?></h2><?php } ?>
			<div class="<?php if(get_sub_field('columnise')){ ?>columns<?php } ?>" data-fade>
				<?php the_sub_field('text'); ?>
			</div>

			<?php if(have_rows('buttons')):
				while(have_rows('buttons')):the_row(); ?>

					<a href="<?php the_sub_field('link'); ?>" <?php if(get_sub_field('modal')){ ?>rel="lightbox"<?php } ?> class="btn btn-<?php the_sub_field('colour'); ?><?php if(get_sub_field('ghost')){ ?> btn-outline-<?php echo the_sub_field('colour'); ?><?php } ?>"><?php the_sub_field('text'); ?></a>
				
				<?php endwhile;
			endif; ?>

			<?php if(get_sub_field('content_alignment') == 'left' ||
					get_sub_field('content_alignment') == 'right'){ ?>

					</div>
					</div>

			<?php } ?>

		<? if(get_sub_field('stack_mobile')){ ?>
			</div>
			</div>

		</section>
		<section class="d-block d-md-none">

		<?php } ?>

			
	<? if(get_sub_field('stack_mobile')){ ?>
		<div class="container content-headings">
			<?php if(get_sub_field('heading')){ ?><h2><?php the_sub_field('heading'); ?></h2><?php } ?>
				<div data-fade>
					<?php the_sub_field('text'); ?>
				</div>

				<?php if(have_rows('buttons')):
					while(have_rows('buttons')):the_row(); ?>

						<a href="<?php the_sub_field('link'); ?>" <?php if(get_sub_field('modal')){ ?>rel="lightbox"<?php } ?> class="btn btn-<?php the_sub_field('colour'); ?><?php if(get_sub_field('ghost')){ ?> btn-outline-<?php the_sub_field('colour'); ?><?php } ?>"><?php the_sub_field('text'); ?></a>
						
				<?php endwhile;
			endif; ?>

		</div>
				
	<?php } ?>