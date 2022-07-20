<?php get_header();?>
<!-- In wordpress the 'index.php' page is assigned to the 'blog page' for all posts -->

<div id="wrapper">
<!-- add wrong page image -->

    <main>
        <h2>Huh...there's nothing here?</h2>
        <p>Well, you've done it, you went somewhere that doesnt exist. Good job! How about you try a different search?</p>
        <?php get_search_form();?>
        <h3>You can also browse some real pages.</h3>
        <?php wp_list_pages();?>
    </main>

    <aside>
        this is my 404 page
    </aside>




</div>
<!-- close wrapper -->

<?php get_footer();?>
