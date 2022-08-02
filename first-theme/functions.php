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
        'footer' => 'Footer Menu',
        'tours' => 'Tours Menu',
        'hotel' => 'Hotel Menu'
    ));

// Enqueing scripts
function my_theme_scripts() {
    wp_enqueue_script( 'astuteo', get_template_directory_uri() . '/js/astuteo.js', '1.0.0', false );
    }
    
    add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

// This function adds the Widget functionality under the 'Appearance' tab in WP and names it 'Sidebar Blog'    
function init_widgets() {
    register_sidebar(array(
        'name' => 'Sidebar Blog',
        'id' => 'sidebar-blog',
        'before_widget' => '<div class="inner-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar About',
        'id' => 'sidebar-about',
        'before_widget' => '<div class="inner-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar Tours',
        'id' => 'sidebar-tours',
        'before_widget' => '<div class="inner-tours">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar Tours Specials',
        'id' => 'sidebar-tours-specials',
        'before_widget' => '<div class="inner-specials">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar Footer',
        'id' => 'sidebar-footer',
        'before_widget' => '<div class="row">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar 404',
        'id' => 'sidebar-404',
        'before_widget' => '<div class="inner-widgets">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => 'Sidebar Buy',
        'id' => 'sidebar-buy',
        'before_widget' => '<div class="inner-buy">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Sidebar Contact',
        'id' => 'sidebar-contact',
        'before_widget' => '<div class="inner-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
} // end function init widgets
// add action AFTER the function
add_action('widgets_init', 'init_widgets');


//  Functions to display a list of all the shortcodes
function diwp_get_list_of_shortcodes(){
 
    // Get the array of all the shortcodes
    global $shortcode_tags;
     
    $shortcodes = $shortcode_tags;
     
    // sort the shortcodes with alphabetical order
    ksort($shortcodes);
     
    $shortcode_output = "<ul>";
     
    foreach ($shortcodes as $shortcode => $value) {
        $shortcode_output = $shortcode_output.'<li>['.$shortcode.']</li>';
    }
     
    $shortcode_output = $shortcode_output. "</ul>";
     
    return $shortcode_output;
 
}
add_shortcode('get-shortcode-list', 'diwp_get_list_of_shortcodes');

function covid_disclaimer(){
    return '<p><small>Before you purchase your tickets, please make sure you have enough potions. Many regions in the Lands Between can cause poison or rot buildup which can lead to an early death. We are not responsible for your lack of preperation! </small></p>';
}

add_shortcode('disclaimer','covid_disclaimer');

function specials() {
    //add a switch
    //if today is Sunday, show me sundays specials.
    if(isset($_GET['today'])){
        $today = $_GET['today'];
    } else{
        $today = date('l');

    }
    switch($today){
        case 'Sunday' :
            $content = 'Today\'s special takes us to the rotted landscape of Caelid. You\'re gonna need a change of underwear for this one. To learn more about this adventure, click <a href="">here!</a>';
        case 'Monday' :
            $content = 'Today\'s special takes us to the base of the great Erdtree! You won\'t want to miss this one. To learn more about this adventure, click <a href="">here!</a> ';
        case 'Tuesday' :
            $content = 'Today\'s special takes us to Castle Sol. The great Commander Niall awaits our arrival. To learn more about this adventure, click <a href="">here!</a> ';
        case 'Wednesday' :
            $content = 'Today\'s special takes us to The Mohgwyn Palace, ruled by Mohg, Lord of Blood.  To learn more about this adventure, click <a href="">here!</a> ';
        case 'Thursday' :
            $content = 'Today\'s special takes us to the Grand Lift of Dectus. Sure its just an elevator, but its a BIG elevator...made of stone. To learn more about this adventure, click <a href="">here!</a> ';
        case 'Friday' :
            $content = 'Today\'s special takes us to Stormviel Castle, ruled by Morgott the Omen and twin to Mohg. To learn more about this adventure, click <a href="">here!</a> ';
        case 'Saturday' :
            $content = 'Today\'s special takes us to Cliffbottom Catacombs. Are you ready to go spelinking? Well you better be! To learn more about this adventure, click <a href="">here!</a> ';

    }//closing switch

return $content;

}//closing the function

add_shortcode('today_specials', 'specials');

function today_date() {
    return date('l\, F js Y');
}

add_shortcode('current_date', 'today_date');

add_filter( 'widget_text' , 'do_shortcode' );
	