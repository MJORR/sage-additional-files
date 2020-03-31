<?php 

$args = array(
    'posts_per_page' => 4
);

switch(get_sub_field('type')) {
    case "post":
        $masonry_posts = get_posts(
            array_merge($args, array())
        );
        break;
    case "category":
        $masonry_posts = get_posts(
            array_merge($args, array('cat' => get_sub_field('category')))
        );
        break;
    case "custom":
        $masonry_posts = get_sub_field('custom');
        break;
}

if(get_sub_field('main_post_position') == 'left') {
    array_push($masonry_posts, $masonry_posts[0]);
    unset($masonry_posts[0]);
    $masonry_posts = array_values($masonry_posts);
}

?>

<div class="row no-gutters text-white">

    <div class="col-12 col-md-6 <?php if(get_sub_field('main_post_position') == 'left'){ ?>order-last<?php } ?>">
        <div class="row no-gutters" style="height:50%">
            <div class="col-12 zoom bg-image" style="height:100%; background: url(<?php the_field('feature_image', $masonry_posts[0]->ID); ?>)">
                <a href="<?php echo get_the_permalink($masonry_posts[0]->ID); ?>"></a>
                <div class="zoom-overlay"></div>
                <div class="masonry-content">
                    <p class="meta text-primary">
                        <?php
                            $output = '';
                            $categories = get_the_category($masonry_posts[0]->ID);
                            foreach($categories as $c) {
                                $output .= $c->name." | ";
                            }
                            echo substr($output, 0, -3);
                        ?>
                    </p>
                    <h1 class="subtitle"><?php echo $masonry_posts[0]->post_title; ?></h1>
                    <p>By <?php $author = get_user_by('id', $masonry_posts[0]->post_author); echo $author->display_name; ?></p>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-12 col-md-6 zoom bg-image" style="background: url(<?php the_field('feature_image', $masonry_posts[1]->ID); ?>)">
                <a href="<?php echo get_the_permalink($masonry_posts[1]->ID); ?>"></a>
                <div class="zoom-overlay"></div>
                <div class="square">
                    <div class="masonry-content">
                        <p class="meta text-primary">
                            <?php
                                $output = '';
                                $categories = get_the_category($masonry_posts[1]->ID);
                                foreach($categories as $c) {
                                    $output .= $c->name." | ";
                                }
                                echo substr($output, 0, -3);
                            ?>
                        </p>
                        <h1 class="subtitle"><?php echo $masonry_posts[1]->post_title; ?></h1>
                        <p>By <?php $author = get_user_by('id', $masonry_posts[1]->post_author); echo $author->display_name; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 zoom">
                <a href="<?php echo get_the_permalink($masonry_posts[2]->ID); ?>"></a>
                <div class="zoom-overlay"></div>
                <div class="square bg-primary bg-image" style="background: url(<?php the_field('feature_image', $masonry_posts[2]->ID); ?>)">
                    <div class="masonry-content">
                        <p class="meta text-primary">
                            <?php
                                $output = '';
                                $categories = get_the_category($masonry_posts[2]->ID);
                                foreach($categories as $c) {
                                    $output .= $c->name." | ";
                                }
                                echo substr($output, 0, -3);
                            ?>
                        </p>
                        <h1 class="subtitle"><?php echo $masonry_posts[2]->post_title; ?></h1>
                        <p>By <?php $author = get_user_by('id', $masonry_posts[2]->post_author); echo $author->display_name; ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-12 col-md-6 zoom">
        <a href="<?php echo get_the_permalink($masonry_posts[3]->ID); ?>"></a>
        <div class="zoom-overlay"></div>
        <div class="square bg-primary bg-image" style="background: url(<?php the_field('feature_image', $masonry_posts[3]->ID); ?>)">
            <div class="masonry-content bottom">
                    <p class="meta text-primary">
                        <?php
                            $output = '';
                            $categories = get_the_category($masonry_posts[3]->ID);
                            foreach($categories as $c) {
                                $output .= $c->name." | ";
                            }
                            echo substr($output, 0, -3);
                        ?>
                    </p>
                    <h1 class="subtitle"><?php echo $masonry_posts[3]->post_title; ?></h1>
                    <p>By <?php $author = get_user_by('id', $masonry_posts[3]->post_author); echo $author->display_name; ?></p>
            </div>
        </div>
    </div>

</div>