<?php
/*Template Name:Blog*/
get_header();
?>

<div class="container blog-page left-space">
	<div class="row blog-posts">
		<div class="col-sm-12">
			<h5 class="section-title"><?php the_title(); ?></h5>
		</div>
        <?php while ( $wp_query->have_posts() ) :  $wp_query->the_post(); ?>
		<div class="column post_block col-sm-6">
			<div>
				<?php the_post_thumbnail("work_post_medium"); ?>
			</div>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php
            $terms = wp_get_post_terms( $post->ID,"category" );
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
		<a href="#" class="load-more">Load More</a>
	</div>
</div>

<?php get_footer(); ?>


<div class="column post_block">
			
		</div>