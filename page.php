<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mane-music
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<!-- ADVANCED CUSTOM FIELDS  -->
			<?php
			// check if the flexible content field has rows of data
			if( have_rows('content') ):
				// loop through the rows of data
				while ( have_rows('content') ) : the_row();

					if( get_row_layout() == 'text_block' ):
						get_template_part( 'partials/acf','text_block');
					elseif( get_row_layout() == 'text_block_two_columns' ):
						get_template_part( 'partials/acf','text_block_two_columns');
					elseif( get_row_layout() == 'hero' ):
						get_template_part( 'partials/acf','hero');
					elseif( get_row_layout() == 'social' ):
						get_template_part( 'partials/acf','social');
					elseif( get_row_layout() == 'newsletter' ):
						get_template_part( 'partials/acf','newsletter');
					elseif( get_row_layout() == 'press' ):
						get_template_part( 'partials/acf','press');
					elseif( get_row_layout() == 'music' ):
						get_template_part( 'partials/acf','music');
					elseif( get_row_layout() == 'videos' ):
						get_template_part( 'partials/acf','videos');

					endif;
				endwhile;
			else :
				// no layouts found
			endif;
			?>

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();