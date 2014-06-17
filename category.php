<?php get_header(); ?>

<div id="content" class="clearfix row">

    <div id="main" class="col-sm-8 clearfix" role="main">

        <div class="page-header">
            <div>
                <span><img src="/wp-content/themes/kun/images/llogo.jpg"/></span>
                <span><?php _e("Posts Categorized:", "wpbootstrap"); ?></span> 
                <?php
                if (function_exists('bcn_display')) {
                    bcn_display();
                } else {
                    single_cat_title();
                }
                ?>
            </div>
        </div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

                    <section class="post_content">
                        <div class="row">
                            <div class="col-sm-3">
        <?php echo get_the_post_thumbnail($query->ID, 'medium', array('class' => 'img-responsive')); ?>
                            </div>
                            <div class="col-sm-9">
                                <h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </section> <!-- end article section -->

                </article> <!-- end article -->

            <?php endwhile; ?>	

            <?php if (function_exists('page_navi')) { // if expirimental feature is active  ?>

                <?php page_navi(); // use the page navi function  ?>

    <?php } else { // if it is disabled, display regular wp prev & next links  ?>
                <nav class="wp-prev-next">
                    <ul class="pager">
                        <li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
                        <li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
                    </ul>
                </nav>
    <?php } ?>


<?php else : ?>

            <article id="post-not-found">
                <header>
                    <h1><?php _e("No Posts Yet", "wpbootstrap"); ?></h1>
                </header>
                <section class="post_content">
                    <p><?php _e("Sorry, What you were looking for is not here.", "wpbootstrap"); ?></p>
                </section>
                <footer>
                </footer>
            </article>

<?php endif; ?>

    </div> <!-- end #main -->

<?php // dynamic_sidebar('news'); ?>

</div> <!-- end #content -->

<?php get_footer(); ?>