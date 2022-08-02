<?php get_header();?>
<!-- single.php displays a single blog post  -->
<div id="hero">
    <img src="<?php echo get_template_directory_uri() ;?>/images/limgrave.jpg" alt="Gargantuan golden tree named, 'The Erdtree'. The tree is surrounded by many ruins scattered throught the lands below the tree. ">
</div>
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

    <?php get_sidebar();?>



</div>
<!-- close wrapper -->

<?php get_footer();?>
