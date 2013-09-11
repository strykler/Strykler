<?php
/*Template Name:Home (Columns)*/
get_header();
?>

    <div class="home_four container left-space">
        <div class="col-switcher">
            <a href="#" class="col-four active"><i class="icon-th"></i></a>
            <a href="#" class="col-two"><i class="icon-th-large"></i></a>
        </div>

        <div class="column-4 row">
            <?php
                $arguments = array();
                $arguments["post_type"] = "portfolio";
                if(get_field("include_only_those_categories") || get_field("exclude_categories")){

                    $arguments["tax_query"] = array();
                    if(get_field("include_only_those_categories") && get_field("exclude_categories")){
                        $arguments["tax_query"]['relation'] = 'OR';
                    }

                    if(get_field("exclude_categories")){
                        $exclude_categories = explode(",",get_field("exclude_categories"));
                        array_push($arguments["tax_query"],array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $exclude_categories,
                            'operator' => 'NOT IN'
                        ));
                    }
                    if(get_field("include_only_those_categories")){
                        $include_categories = explode(",",get_field("include_only_those_categories"));
                        array_push($arguments["tax_query"],array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $include_categories,
                            'operator' => 'IN'
                        ));
                    }
                }
                if(get_field("exclude_categories")){
                    $exlude_posts = array();
                    foreach(get_field("exclude_categories") as $tmpPost){
                        array_push($exlude_posts,$tmpPost->ID);
                    }
                    $arguments["post__not_in"] = $exlude_posts;
                }

                if(get_field("exclude_posts")){
                    $exlude_posts = array();
                    foreach(get_field("exclude_posts") as $tmpPost){
                        array_push($exlude_posts,$tmpPost->ID);
                    }
                    $arguments["post__not_in"] = $exlude_posts;
                }
                $arguments["posts_per_page"] = get_field("number_of_posts_small_grid");
                $the_query = new WP_Query( $arguments );
                while ( $the_query->have_posts() ) :  $the_query->the_post();
            ?>
                <div class="column post_block col-sm-3">
                    <div>
                        <?php the_post_thumbnail("work_post"); ?>
                    </div>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php
                        $terms = wp_get_post_terms( $post->ID,"portfolio_category" );
                        $terms_html_array = array();
                        foreach($terms as $t){
                            $term_name = $t->name;
                            $term_link = get_term_link($t->slug,$t->taxonomy);
                            array_push($terms_html_array,"<a href='{$term_link}'>{$term_name}</a>");
                        }
                        $terms_html_array = implode(", ",$terms_html_array);
                    ?>
                    <?php if($terms_html_array): ?>
                        <ul>
                            <li><i class='icon-angle-right'></i><?php echo $terms_html_array; ?></li>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <div class="column-2 row">
            <?php
                $arguments = array();
                $arguments["post_type"] = "portfolio";
                if(get_field("include_only_those_categories") || get_field("exclude_categories")){

                    $arguments["tax_query"] = array();
                    if(get_field("include_only_those_categories") && get_field("exclude_categories")){
                        $arguments["tax_query"]['relation'] = 'OR';
                    }

                    if(get_field("exclude_categories")){
                        $exclude_categories = explode(",",get_field("exclude_categories"));
                        array_push($arguments["tax_query"],array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $exclude_categories,
                            'operator' => 'NOT IN'
                        ));
                    }
                    if(get_field("include_only_those_categories")){
                        $include_categories = explode(",",get_field("include_only_those_categories"));
                        array_push($arguments["tax_query"],array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $include_categories,
                            'operator' => 'IN'
                        ));
                    }
                }
                if(get_field("exclude_categories")){
                    $exlude_posts = array();
                    foreach(get_field("exclude_categories") as $tmpPost){
                        array_push($exlude_posts,$tmpPost->ID);
                    }
                    $arguments["post__not_in"] = $exlude_posts;
                }

                if(get_field("exclude_posts")){
                    $exlude_posts = array();
                    foreach(get_field("exclude_posts") as $tmpPost){
                        array_push($exlude_posts,$tmpPost->ID);
                    }
                    $arguments["post__not_in"] = $exlude_posts;
                }
                $arguments["posts_per_page"] = get_field("number_of_posts_large");
                $the_query = new WP_Query( $arguments );
                while ( $the_query->have_posts() ) :  $the_query->the_post();
            ?>
                <div class="column post_block col-sm-6">
                    <div>
                        <?php the_post_thumbnail("work_post_medium"); ?>
                    </div>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php
                    $terms = wp_get_post_terms( $post->ID,"portfolio_category" );
                    $terms_html_array = array();
                    foreach($terms as $t){
                        $term_name = $t->name;
                        $term_link = get_term_link($t->slug,$t->taxonomy);
                        array_push($terms_html_array,"<a href='{$term_link}'>{$term_name}</a>");
                    }
                    $terms_html_array = implode(", ",$terms_html_array);
                    ?>
                    <?php if($terms_html_array): ?>
                        <ul>
                            <li><i class='icon-angle-right'></i><?php echo $terms_html_array; ?></li>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endwhile;wp_reset_postdata(); ?>
        </div>

    </div>

<?php get_footer(); ?>