<?php get_header(); ?>

<div class="container single-blogpost left-space">
	<div class="row">
		<div class="post-img col-sm-10">
			<?php the_post_thumbnail("blog_post_head"); ?>
		</div>
		<div class="post-buttons col-sm-1">
			<ul>
				<li>
					<i class="icon-time"></i><br>
					<p><?php echo get_the_date("d M"); ?></p>
				</li>
				<li>
					<i class="icon-user"></i><br>
					<p><?php the_author_meta( "display_name" , $post->post_author ); ?></p>
				</li>
				<li>
					<a href="#">
						<i class="icon-heart"></i><br>
						<p><?php echo get_likes(); ?></p>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="row post-content">
		<div class="col-sm-10">
			<h1 class="title-of-post"><?php the_title(); ?></h1>
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
                <ul class="categories">
                    <li><i class='icon-angle-right'></i><?php echo $terms_html_array; ?></li>
                </ul>
            <?php endif; ?>
			<div class="content">
				<?php
                    global $post;
                    setup_postdata($post);
                    the_content();
                ?>
			</div>
		</div>
	</div>

    <?php
    $terms = wp_get_post_terms( $post->ID,"post_tag" );
    $terms_html_array = array();
    foreach($terms as $t){
        $term_name = $t->name;
        $term_link = get_term_link($t->slug,$t->taxonomy);
        array_push($terms_html_array,"<li><a href='{$term_link}'>{$term_name}</a></li>");
    }
    $terms_html_array = implode("",$terms_html_array);
    if($terms_html_array):
    ?>
	<div class="row tags">
		<div class="col-sm-10">
			<h5 class="section-title">Tags</h5>
			<ul>
				<?php echo $terms_html_array; ?>
			</ul>
		</div>
	</div>
    <?php endif; ?>

    <?php comments_template(); ?>

</div>

<?php get_footer(); ?>