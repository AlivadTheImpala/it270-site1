<?php get_header();?>
<!-- single.php displays a single blog post  -->

<div id="wrapper">


    <main>

        <!-- our question of the day is
        If we have any posts or pages, show them! -->
        <?php if(have_posts()) :?>

        <!-- We need to show the posts by using a while loop in the world of PHP -->
        <?php while(have_posts()) : the_post(); ?>
            <article class="post">
                <h2 class="title">
                    <?php the_title(); ?>
                </h2>

                <div class="meta">
                    <span><b>Posted by:</b> <?php the_author() ;?></span>
                    <span><b>Posted on:</b> <?php the_time('F j, Y g:i a')  ;?></span>



                </div>
                <!-- cloa meta -->

                <?php the_content();?>
                
                

            </article>
        <?php endwhile;?>

        <?php else:?>
            
        <h2>
            <?php echo  wpautop('Sorry, no posts were found!'); ?>
        </h2>
        <?php endif; ?>
        <?php comments_template(); ?>

    </main>




</div>
<!-- close wrapper -->

<?php get_footer();?>
