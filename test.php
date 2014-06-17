<div class= "col-md-4 posRlt" >
    <div id="gongyi-block" class="home-4col-block">                                     
        <?php
        $args = array(
            'posts_per_page' => 4,
            'category__in' => array(15),
            'ignore_sticky_posts' => 0
        );
        $query = new WP_Query($args);
        ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="ellipsisTxt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>


    <div id="gaoseng-block" class="home-4col-block multi-row">    
        <div class="row"><h2 class="block-title">高僧法师</h2></div>
        <?php
        $args = array(
            'posts_per_page' => 15,
            'category__in' => array(12),
            'ignore_sticky_posts' => 0
        );
        $query = new WP_Query($args);
        $post_counter = 0;
        ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php if (($post_counter % 3) == 0): ?>
                <div class="row">
                <?php endif; ?>
                <div class="col-xs-4">
                    <h3 class="ellipsisTxt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
                <?php if (($post_counter % 3) == 2): ?>
                </div>
            <?php endif; ?>
            <?php $post_counter++; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>