<section>

	<div class="container-lg">
			<div class="content-headings">
				<?php if(get_sub_field('heading')){ ?><h2><?php the_sub_field('heading'); ?></h2><?php } ?>
				<div class="<?php if(get_sub_field('columnise')){ ?>columns<?php } ?>" <?php if(!get_field('disable_content_fade_in')){ ?>data-fade<?php } ?>>
					<?php the_sub_field('text'); ?>
				</div>
			</div>
			<?php
			
			$args = array(
				'posts_per_page' => get_sub_field('count'),
				'orderby' => 'date',
				'order' => 'DESC'
			);

			if(get_sub_field('type') == "custom"){

				// print_r(get_sub_field('custom'));
				$posts = get_sub_field('custom');
				// print_r($posts);

			}elseif(get_sub_field('type') == "resource"){

				$query = new WP_Query(
					array_merge($args,
						array(
							'post_type' => 'resource',
                        )
                    )
				);
				$posts = $query->posts;

			}elseif(get_sub_field('type') == "category"){

				$query = new WP_Query(
					array_merge($args,
						array(
							'post_type' => 'post',
							'cat' => implode(', ', get_sub_field('category'))
						)
					)
				);
				$posts = $query->posts;
				
			}else{
				
				$query = new WP_Query(
					array_merge($args,
						array(
							'post_type' => get_sub_field('type'),
						)
					)
				);
				$posts = $query->posts;
			
            }

            ?>

			<?php
				global $post;
                if($posts){ ?>
                    <div class="row posts text-left">
					<?php foreach($posts as $post){
                        
						setup_postdata($post);

						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail');
						$feature_image = $image[0];

						if(!$feature_image){
							$feature_image = get_field('feature_image', $post->ID);
						}

						if(!$feature_image){
							$feature_image = get_bloginfo('template_directory')."/assets/ims/default-thumbnail.jpg";
						}
						
						if(get_field('date')){
							$date = date(get_option('date_format'), strtotime(get_field('date')));
						}else{
							$date =  get_the_date(get_option('date_format'));
						}

						?>
                        <div class="post col-12 col-md-<?php echo 12/get_sub_field('count'); ?>" <?php if(!get_field('disable_content_fade_in')){ ?>data-fade<?php } ?>>
                            <div>
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $feature_image; ?>" class="w-100" /></a>
								<p class="meta">Script</p>
								<h2 class="subtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php if($date){ ?>
									<p><?php echo $date; ?></p>
								<?php } ?>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="meta">Read more</a>
                            </div>
                        </div>
                    <?php }
                wp_reset_postdata(); ?>
				</div>
			<?php } ?>

			<?php if(get_sub_field('button_text')){ ?>
				<p><a href="<?php the_sub_field('button_link'); ?>" class="button button-primary"><?php the_sub_field('button_text'); ?></a></p>
			<?php } ?>	

            </div>
            </section>