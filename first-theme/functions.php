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
