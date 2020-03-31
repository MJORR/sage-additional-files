<?php elseif(get_row_layout() == "faqs"): // layout: FAQs ?>

		<?php while(has_sub_field("faq_groups")): ?>

			<div class="faq-group">

           
			<h2><?php the_sub_field('faq_group_title'); ?><i class="fa fa-angle-down" aria-hidden="true"></i></h2>

			<div class="faq-group-content">

				<?php while(has_sub_field("faqs")): ?>

					<div class="faq">
						<h3>
							<div>
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
								<i class="fa fa-minus-circle" aria-hidden="true" style="display:none"></i>
							</div>
							<a href="#" style="display:block;"><?php the_sub_field('question'); ?></a>
						</h3>
						<div style="display:none"><?php the_sub_field('answer'); ?></div>
					</div>

				<?php endwhile; ?>

			</div>

			</div>

		<?php endwhile; ?>

    <? endif; ?>


    

<script>

$('.faq-group h2').click(function(e){
			$(this).next('div').slideToggle('fast');
			$(this).parent().toggleClass('active');
		});

		$('.faq h3').click(function(e){
			e.preventDefault();
			$(this).find('div i').fadeToggle();
			$(this).next('div').slideToggle('fast');
		});

</script>


<styles>
/* FAQ styles */

.faq-group{ margin-bottom:10px; background-color:#efefef; transition: all 0.2s ease; }
.faq-group.active, .faq-group:hover{ transition: all 0.2s ease; background-color: #e8e8e8; }
.faq-group h2{ position:relative; cursor: pointer; padding: 15px 0 10px 20px; font-size:25px; }
.faq-group h2 i{ position: absolute; right: 20px; top:8px; font-size: 3rem; }
.faq-group-content{ display:none; }

.faq:nth-child(even) { background: #efefef }
.faq:nth-child(odd) { background: #fff }

.faq{ padding: 15px 0 30px 20px; /* padding: 30px 70px 20px 0px; */ /* border-bottom: 2px solid rgba(0,0,0,0.08); */ }
.faq h3{ position:relative; /* height:30px; */ }
.faq h3:hover *{ color: #555 !important; text-decoration: none; }
.faq > h3 + div{ padding: 30px 60px 0 30px; }
.faq > h3 > div i{ position:absolute; top:0; }
.faq > h3 > a{ position:absolute; left:40px; top:0; }
</styles>