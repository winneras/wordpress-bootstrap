<?php
/*
  Template Name: taifo
 */
?>

<?php get_header(); ?>

<div id="content" class="clearfix row block-page">
    <div class="meta"><span><img src="/wp-content/themes/kun/images/llogo.jpg"/></span>
                    <span><?php _e("Posts Categorized:", "wpbootstrap"); ?></span> 
        <?php
        if (function_exists('bcn_display')) {
            bcn_display();
        } else {
            single_cat_title();
        }
        ?>
    </div>

    <div id="main" class="col-sm-12 clearfix" role="main">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                    <section class="row post_content">

                        <div class="col-sm-12">
                            <div class="row">
                                <div class= "col-md-4 col-sm-12 posRlt sm-no-display" >
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <?php echo do_shortcode('[metaslider id=151]') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class= "col-md-8 posRlt sm-top-bottom-padding" >
                                    <div class="row">
                                        <?php
                                        $args = array(
                                            'posts_per_page' => 8,
                                            'category__in' => array(8),
                                            'ignore_sticky_posts' => 0
                                        );
                                        $query = new WP_Query($args);
                                        $count = 0;
                                        ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <?php if (($count % 4) == 0): ?>
                                        <div class="col-md-6"><div class="home-4col-block clearfix">
                                                <?php endif; ?>
                                                <h2 class="sticky ellipsisTxt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                <p class="ellipsisTxt"><?php echo strip_tags(get_the_content()); ?></p>
                                                <?php if (($count % 4) == 3): ?>
                                            </div></div>
                                            <?php endif; ?>
                                            <?php $count++; ?>
                                        <?php endwhile; ?>
                                        <?php if (($count % 4) != 0) : ?></div></div> <?php endif; ?>
                                    <?php wp_reset_postdata(); ?>
                            </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div id="" class="clearfix top-bottom-padding">
                                <div class= "col-md-4 posRlt sm-top-bottom-padding" >

                                    <div id="taifo-block" class="home-4col-block">  
                                        <div class="row"><h2 class="block-title"><?php echo get_cat_name(21); ?></h2></div>
                                        <?php
                                        $args = array(
                                            'posts_per_page' => 6,
                                            'category__in' => array(21),
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
                                </div>



                                <div class= "col-md-4 posRlt sm-top-bottom-padding" >

                                    <div id="taifo-block" class="home-4col-block">  
                                        <div class="row"><h2 class="block-title"><?php echo get_cat_name(20); ?></h2></div>
                                        <?php
                                        $args = array(
                                            'posts_per_page' => 6,
                                            'category__in' => array(20),
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
                                </div>



                                <div class= "col-md-4 posRlt sm-top-bottom-padding" >

                                    <div id="taifo-block" class="home-4col-block">  
                                        <div class="row"><h2 class="block-title"><?php echo get_cat_name(22); ?></h2></div>
                                        <?php
                                        $args = array(
                                            'posts_per_page' => 6,
                                            'category__in' => array(22),
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
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="clearfix three-in-one"  id="tupian-block">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="top-border"></div>
                                    </div>
                                </div>
                                <div class="row">

                                    <?php
                                    $args = array(
                                        'posts_per_page' => 6,
                                        'meta_key' => '_thumbnail_id',
                                        'category__in' => array(8, 20, 21, 22)
                                    );
                                    $query = new WP_Query($args);
                                    ?>                                    
                                    <?php while ($query->have_posts()): $query->the_post(); ?>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="col-md-2">
                                                <div class="top-bottom-padding">
                                                    <div class="">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php echo get_the_post_thumbnail($query->ID, 'medium', array('class' => 'img-responsive')); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>

                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="top-border"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section> <!-- end article header -->

                </article> <!-- end article -->

                <?php
                // No comments on homepage
                //comments_template();
                ?>

            <?php endwhile; ?>	

        <?php else : ?>

            <article id="post-not-found">
                <header>
                    <h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
                </header>
                <section class="post_content">
                    <p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
                </section>
                <footer>
                </footer>
            </article>

        <?php endif; ?>

    </div> <!-- end #main -->

    <?php //get_sidebar(); // sidebar 1   ?>

</div> <!-- end #content -->

<?php get_footer(); ?>