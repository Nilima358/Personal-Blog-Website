<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package Algori_Blogger
 */

get_header(); ?>
	
	
	
	<?php 
		if ( !get_header_image() || !is_front_page() ){ echo '<div class="offset"></div>'; } // Display offset if header image doesn't exist
	?>
  
	<div id="primary" class="content-area">
	
		<?php if(!is_front_page()): // Only show this if not on settings > front page?>
			 <div class="dark-wrapper page-title">
				<div class="container inner">
				 
				<h1> <?php single_post_title(); ?> </h1>
				
				</div>
			  </div>
		<?php endif; ?>
		
		<div class="light-wrapper">
			<div class="container inner">
				 <div class="row">
				 
					<?php get_sidebar( 'left' ); ?>
				 
					<main id="main" class="site-main col-sm-8 content">
						<div class="classic-blog">
						
							<?php
							if ( have_posts() ) :

								if ( is_home() && ! is_front_page() ) : ?>
									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>

								<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;

								echo algori_blogger_get_the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>
							
						</div><!-- .classic-blog -->
					</main><!-- #main -->
			
					<?php get_sidebar(); ?>
					
					
				  </div><!-- .row --> 
				</div><!-- .container --> 
		  </div><!-- .light-wrapper -->
	</div><!-- #primary -->

<?php
get_footer();
