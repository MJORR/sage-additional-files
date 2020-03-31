<section>

	<div class="container-lg">

    <?php

    $faq_groups= get_sub_field('faq_groups'); 

    foreach ($faq_groups as $group){

    ?>

        <div class="faq-group">

            <h2><?php echo $group['faq_group_title'] ?><i class="fal fa-chevron-down" aria-hidden="true"></i></h2>

            <div class="faq-group-content">

                <?php $faqs = $group['faqs']; 

                foreach ($faqs as $faq){  ?>

                    <div class="faq">
                        
                        <h3>
                            <a href="#" style="display:block;"><?php echo $faq['question']; ?><i class="fal fa-plus"></i> <i class="fal fa-minus" style="display:none"></i></a>
                        </h3>

                        <div style="display:none"><?php echo $faq['answer']; ?></div>
                    
                    </div>

                <?php } ?>

            </div>

        </div>


    <?php } ?>


    </div>

    

</section>



