<?php  

//my functions page!

function my_excerpt_length() {
    return 40;
}

// limits the excerpts length to 40 words. 'excerpt_length is the name of this function, while 'my_excerpt_legth' is from the function we created defining the word count.
add_filter('excerpt_length','my_excerpt_length');

// controls the overall size of a posts thumbnail on the blog page
set_post_thumbnail_size(200, 200);

// allows you to add a post thumbnail on the wordpress dashboard
add_theme_support('post-thumbnails');

//This registers the navigation so that you can view it under the 'Appearance' menu in the WP dashboard.
register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
));

// Enqueing scripts
function my_theme_scripts() {
    wp_enqueue_script( 'astuteo', get_template_directory_uri() . '/js/astuteo.js', '1.0.0', false );
    }
    
    add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );