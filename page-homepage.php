<?php
/*
  Template Name: Homepage
 */
?>

<?php get_header(); ?>
<div id="top-banner">
    <img src="/wp-content/themes/kun/images/top-banner.jpg" class="img-responsive">
</div>

<div id="content" class="clearfix row">

    <div id="main" class="col-sm-12 clearfix" role="main">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                    <!--
                                        <header>
                    
                    <?php
                    $post_thumbnail_id = get_post_thumbnail_id();
                    $featured_src = wp_get_attachment_image_src($post_thumbnail_id, 'wpbs-featured-home');
                    ?>
                    
                                            <div class="jumbotron" style="background-image: url('<?php echo $featured_src[0]; ?>'); background-repeat: no-repeat; background-position: 0 0;">
                    
                                                <div class="page-header">
                                                    <h1><?php bloginfo('title'); ?><small><?php echo get_post_meta($post->ID, 'custom_tagline', true); ?></small></h1>
                                                </div>				
                    
                                            </div>
                    
                                        </header>
                    -->
                    <section class="row post_content">

                        <div class="col-sm-12">
                            <div class="row">
                                <div class= "col-md-4 col-sm-12 posRlt" >
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <?php echo do_shortcode('[metaslider id=53]') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class= "col-md-4 posRlt sticky-news" >
                                    <div id="news-block" class="home-4col-block">
                                        <div class="row"><h2 class="block-title">今日要闻</h2></div>

                                        <?php
                                        $args = array(
                                            'posts_per_page' => 5,
                                            'post__in' => get_option('sticky_posts'),
                                            'category__in' => array(7, 9, 13),
                                            'ignore_sticky_posts' => 1
                                        );
                                        $sticky_query = new WP_Query($args);
                                        //print_r($sticky_query);
                                        $sticky_count = 0;
                                        ?>
                                        <?php while ($sticky_query->have_posts()) : $sticky_query->the_post(); ?>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <h2 class="sticky ellipsisTxt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    <p class="ellipsisTxt"><?php echo strip_tags(get_the_content()); ?></p>
                                                    <?php $sticky_count++; ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                        <?php
                                        if ($sticky_count < 5) {
                                            $args = array(
                                                'posts_per_page' => (5 - $sticky_count) * 2,
                                                'category__in' => array(7, 9, 13),
                                                'post__not_in' => get_option('sticky_posts')
                                            );
                                        }
                                        //echo  $sticky_count;
                                        $none_sticky_query = new WP_Query($args);
                                        $none_sticky_count = 0;
                                        ?>
                                        <?php while ($none_sticky_query->have_posts()) : $none_sticky_query->the_post(); ?>
                                            <?php if (($none_sticky_count % 2) == 0): ?>
                                                <div class="row">
                                                <?php endif; ?>
                                                <div class="col-xs-6">
                                                    <h3 class="none-sticky ellipsisTxt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                </div>
                                                <?php if (($none_sticky_count % 2) != 0): ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $none_sticky_count++ ?>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                </div>
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
                                        <?php if (($post_counter % 3) != 2): ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>



                        <?php // the_content(); ?>
                        <div class="row">
                            <div id="" class="clearfix top-bottom-padding">
                                <div class= "col-md-4 posRlt" >

                                    <div id="taifo-block" class="home-4col-block">  
                                        <div class="row"><h2 class="block-title">泰佛</h2></div>
                                        <?php
                                        $args = array(
                                            'posts_per_page' => 6,
                                            'category__in' => array(8),
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

                                <div class= "col-md-4 posRlt" >

                                    <div id="fopai-block" class="home-4col-block">  
                                        <div class="row"><h2 class="block-title">佛牌</h2></div>
                                        <?php
                                        $args = array(
                                            'posts_per_page' => 6,
                                            'category__in' => array(10),
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

                                <div class= "col-md-4 posRlt" >

                                    <div id="gumantong-block" class="home-4col-block">  
                                        <div class="row"><h2 class="block-title">古曼童</h2></div>
                                        <?php
                                        $args = array(
                                            'posts_per_page' => 6,
                                            'category__in' => array(11),
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

                        <?php // get_sidebar('sidebar2'); // sidebar 2   ?>

                    </section> <!-- end article header -->

                    <footer>

                        <p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags", "wpbootstrap") . ': ', ', ', '</span>'); ?></p>

                    </footer> <!-- end article footer -->

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