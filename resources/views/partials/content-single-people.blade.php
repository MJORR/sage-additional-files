

<section>

<article @php post_class() @endphp>


  <div class="container-lg">
        <div class="row">
    
            <div class="col-12 mb-5">
                <a class="backlink" href="<?php echo get_home_url(); ?>/our-team">< Back to team</a>
            </div>

        </div>
        <div class="row">
    
            <div class="col-12 col-sm-4">
              
                <div class="w-100 bg rounded-circle" style="background-image: url(@php the_field('photo', get_the_ID()); @endphp)">
                <img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">   
                </div>

            </div> 

            <div class="col-12 col-sm-8 pl-5">
                <h1 class="mb-0">{!! get_the_title() !!} </h1>
                <div class="text-primary subtitle">@php  echo the_field('job-title', get_the_ID()); @endphp</div>
                <div class="mt-3 description">@php  the_content(); @endphp</div>
            </div> 

        </div>
  </div>

</article>

</section>