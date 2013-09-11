<?php
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
/*Image Sizes*/
    add_image_size("work_post",249,187,true);
    add_image_size("work_post_medium",528,396,true);
    add_image_size("team_member",352,352,true);
    add_image_size("blog_post_head",970,420,true);
/*Image Sizes*/

require_once "includes/post-types.php";

/*Register Menu*/
add_action('init', 'register_my_menus');

function register_my_menus()
{
    register_nav_menus(
        array(
            'main_menu' => __('Main Menu', "um-lang"),
            'mobile_menu' => __('Mobile Menu', "um-lang")
        )
    );
}
/*Register Menu*/

/*Get Likes*/
function get_likes($set = false){
    global $post;
    $views = get_post_meta($post->ID, "umbrella_post_likes", true);
    if($set){
        $views = intval($views) + 1;
        if($views){
            update_post_meta($post->ID, "umbrella_post_likes" , $views );
        }else{
            add_post_meta($post->ID, "umbrella_post_likes" , 1 );
        }
    }
    return $views ? number_format($views, 0, ' ', ' ') : 0;
}
/*Get Likes*/
?>