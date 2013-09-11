<?php
    add_action("init","my_post_types");
    function my_post_types(){
        $rewrite = array();
        //$rewrite["slug"] = get_field("projects_slug","options") ? toAscii(get_field("projects_slug","options")) : "projects";
        $rewrite["slug"] = "portfolio";
        $rewrite["with_front"] = true;

        register_post_type( 'portfolio',
            array(
                'labels' => array(
                    'name' => __( "Portfolio" ,"um_lang"),
                    'singular_name' => __( "Portfolios" , "um_lang" )
                ),
                'public' => true,
                'supports' => array('title','editor','thumbnail','comments','author'),
                'exclude_from_search' => true,
                'rewrite' => $rewrite
            )
        );

        register_taxonomy('portfolio_category',array (
            0 => 'portfolio',
        ),array( 'hierarchical' => true, 'label' => 'Portfolio Category','show_ui' => true,'query_var' => true,'singular_label' => 'Portfolio Category') );

    }
?>