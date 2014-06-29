<?php
/*
  Template Name: gongqing
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

                            <?php
                            $args = array(
                                'posts_per_page' => 16,
                                'category__in' => array(16),
                                'ignore_sticky_posts' => 0
                            );
                            $query = new WP_Query($args);
                            $count = 0;
                            ?>

                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <?php if (($count % 4) == 0): ?>
                                    <div class="row">
                                    <?php endif; ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="top-bottom-padding">
                                            <div class="gaoseng-block top-bottom-padding">
                                            <a href="<?php the_permalink(); ?>" >
                                                <div>
                                                    <?php echo get_the_post_thumbnail($query->ID, 'large', array('class' => 'img-responsive')); ?>
                                                </div>
                                                </a>

                                                <h2 class="ellipsisTxt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (($count % 4) == 3): ?>
                                    </div>
                                <?php endif; ?>
                                <?php $count++; ?>
                            <?php endwhile; ?>
                            <?php if (($count % 4) != 0): ?> </div> <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

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