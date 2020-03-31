<?php if(have_rows('people')): ?>
<div class="container-lg">
    <div class="row">

        <?php while(have_rows('people')):the_row(); ?>

            <?php  $person = get_sub_field('person'); ?>

            
            <div class="col-md-3 col-6">
                <div class="person mb-5 text-center">
                    <a href="<?php echo get_permalink($person->ID);?>">
                    <img src="<?php echo the_field('photo', $person->ID)?>">
                    </a>
                    
                    <div class="person-detail">
                        <h5 class="h5 mb-1"><?php echo get_the_title($person->ID)?></h5>
                        <p><?php echo the_field('job-title', $person->ID)?></p>
                    </div>
                </div>
            </div>


        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>