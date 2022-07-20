<?php get_header();?>
<!-- In wordpress the 'index.php' page is assigned to the 'blog page' for all posts -->

<div id="wrapper">

<!-- Well add a happy picture here -->
    <main>

        <!-- our question of the day is
        If we have any posts or pages, show them! -->

        <?php if(have_posts()) :?>

        <!-- We need to show the posts by using a while loop in the world of PHP -->
        <h2>Search Results for: <?php echo get_search_query();?></h2>
        <!-- Well add how many pages exist with user defined search words -->

        <p>Our findings for
            <?php /* Search Count */
            $allsearch = new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); _e(' &mdash; '); echo $count . ' '; _e('articles/pages'); wp_reset_query(); ?></p>

        <?php while(have_posts()) : the_post(); ?>
            <article class="post">
                <h2 class="title">
                    <a href="<?php the_permalink();  ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <div class="meta">
                    <span><b>Posted by:</b> <?php the_author() ;?></span>

                    <span><b>Posted on:</b> <?php the_time('F j, Y g:i a')  ;?></span>



                </div>
                <!-- close meta -->

                <div class="thumbnails">
                    <?php if(has_post_thumbnail()) :?>
                    <a href="<?php the_permalink();  ?>">
                     <?php the_post_thumbnail(); ?>
                    </a>
                    <?php endif ?>


                </div>
                <!-- end thumbnail -->
                
                <!-- Begin the excerpt and 'read more' block -->
                <?php the_excerpt();?> 
                <span class="block">
                    <a href="<?php the_permalink(); ?>">Read more about <? the_title() ;?></a>
                </span>
                <!-- End excerpt and 'read more' block -->
                

            </article>
        <?php endwhile;?>

        <?php else:?>
            
        <h2>
            No content for: <?php echo get_search_query();?>
        </h2>
        <p>
            Sorry, nothing came up. Try searching for different keywords.
        </p>
        <?php get_search_form();?>
        <?php endif; ?>
    </main>

    <aside>
        this is my search.php page
    </aside>




</div>
<!-- close wrapper -->

<?php get_footer();?>
