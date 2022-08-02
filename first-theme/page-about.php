<?php get_header();
/* Template Name: About Page */
?>

<!-- In wordpress the 'index.php' page is assigned to the 'blog page' -->

<div id="hero">
    <img src="<?php echo get_template_directory_uri() ;?>/images/limgrave.jpg" alt="Gargantuan golden tree named, 'The Erdtree'. The tree is surrounded by many ruins scattered throught the lands below the tree. ">
</div>
<div id="wrapper">


<main>

    <!-- our question of the day is
    If we have any posts or pages, show them! -->
    <?php if(have_posts()) :?>

    <!-- We need to show the posts by using a while loop in the world of PHP -->
    <?php while(have_posts()) : the_post() ; ?>
    <?php the_content();?>

    <?php endwhile;?>
    <?php else:?>
    <h2>
        <?php echo  wpautop('Sorry, no posts were found!'); ?>
    </h2>
    <?php endif; ?>
</main>


<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('sidebar-about') ;?>
</aside>

</div>
<!-- close wrapper -->

<?php get_footer();?>
