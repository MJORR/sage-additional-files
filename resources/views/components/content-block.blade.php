<?php

    $content_block_image =
    '<div class="col-12 col-sm-6 ';

        if(get_sub_field('content_position') == 'left'){ $content_block_image .= ' order-first order-sm-last '; }

        if(get_sub_field('image')) {
            $content_block_image .= 'block-content-image ';
            $content_block_image .= '" style="background-image: url('.get_sub_field('image').');"';
        } else {
            $content_block_image .= ' mobile-only-height bg-' . get_sub_field('background_color') . '"';
        }

        $content_block_image .= '>
        <div class="block-overlay"></div>
    </div>';

    $content_block_content = 
    '<div class="col-12 col-sm-6 content-headings ';

        //if(get_sub_field('content_position') == 'left'){ $content_block_content .= ' skew-right skew-right-'.get_sub_field('background_color'); }

        $content_block_content .= '">
        <div class="block-content">
            <h2>'.get_sub_field('title').'</h2>

            '.get_sub_field('content');

            if(have_rows('buttons')):
				while(have_rows('buttons')):the_row();

                    $content_block_content .= '<a href="'.get_sub_field('link').'"';
                    
                    if(get_sub_field('modal')){ $content_block_content .= ' rel="lightbox"'; }
                    
                    $content_block_content .= ' class="btn ';
                    
                    if(!get_sub_field('ghost')){ $content_block_content .= 'btn-'.get_sub_field('colour'); }
                    
                    if(get_sub_field('ghost')){ $content_block_content .= 'btn-outline-'.get_sub_field('colour'); }
                    
                    $content_block_content .= '">'.get_sub_field('text').'</a>';
				
				endwhile;
			endif;

        $content_block_content .= '</div>
    </div>';

?>

<div class="row no-gutters block-container <?php the_sub_field('background_color'); ?> <?php if(get_sub_field('background_color') == 'bg-primary' || get_sub_field('background_color') == 'bg-secondary'){ ?> text-white<?php } ?>">
	
    <?php if(get_sub_field('content_position') == 'right'){  

        echo $content_block_image.$content_block_content;

     }else{

        echo $content_block_content.$content_block_image;

    } ?>
    
</div>