<?php get_header(); ?>

<div id="content" class="clearfix row">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-sm-12 clearfix">
                <div class="meta">
                    <span><img src="/wp-content/themes/kun/images/llogo.jpg"/></span>
                    <span><?php _e("Posts Categorized:", "wpbootstrap"); ?></span> 
                    <?php
                    if (function_exists('bcn_display')) {
                        bcn_display();
                    } else {
                        single_cat_title();
                    }
                    ?><?php //the_category(', '); ?></div>
            </div>

            <div id="main" class="col-sm-8 clearfix" role="main">



                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                    <header>

                        <?php //the_post_thumbnail( 'wpbs-featured' ); ?>

                        <div class="page-header">
                            <h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
                        
                        </div>
                        <div class="clearfix bottom-padding">
                                    <!-- JiaThis Button BEGIN -->
                                    <div class="jiathis_style_24x24">
                                        <a class="jiathis_button_tsina"></a>
                                        <a class="jiathis_button_weixin"></a>
                                        <a class="jiathis_button_renren"></a>
                                        <a class="jiathis_button_qzone"></a>
                                        <a class="jiathis_button_douban"></a>
                                        <a class="jiathis_button_tqq"></a>
                                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank">更多</a>
                                    </div>
                                    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=undefined" charset="utf-8"></script>
                                    <!-- JiaThis Button END -->
                                </div>

                    </header> <!-- end article header -->

                    <section class="post_content clearfix" itemprop="articleBody">
                        <?php the_content(); ?>

                        <?php wp_link_pages(); ?>

                    </section> <!-- end article section -->

                    <footer>

                        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags", "wpbootstrap") . ':</span> ', ' ', '</p>'); ?>

                        <?php
                        // only show edit button if user has permission to edit posts
                        if ($user_level > 0) {
                            ?>
                            <a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post", "wpbootstrap"); ?></a>
                        <?php } ?>

                    </footer> <!-- end article footer -->

                </article> <!-- end article -->

                <?php // comments_template('',true); ?>

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

    <?php get_sidebar(); // sidebar 1 ?>

</div> <!-- end #content -->

<?php get_footer(); ?>