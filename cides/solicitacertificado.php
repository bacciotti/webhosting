<?php
/*
Template name: Certificates v2
Author: Lucas Bacciotti | Twitter: @baciotti | GitHub: @bacciotti
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			<?php if ( function_exists( 'themezee_breadcrumbs' ) ) themezee_breadcrumbs(); ?>
			
			<?php while (have_posts()) : the_post();

				get_template_part( 'template-parts/content', 'page' );
				
				comments_template();

			endwhile; ?>

			
			<?php
			    $user_id = $_POST['user_id'];
			
				if (empty($user_id) or !is_numeric($user_id)){ 
						echo "<div id='divInvalidUserId'>";
						echo "<p>Invalid User ID.</p>";
						echo "</div>";
				} else {
					// Encrypt
					$hash_id = md5(trim($user_id));
														
					// Searches on database with hash md5
					$results = $wpdb->get_results( "
							SELECT 
								post_name,
								guid,
								post_date 
							FROM 
								wp_posts
							WHERE
								post_type = 'attachment'
							AND
								md5(post_name) = '" .$hash_id. "'
							ORDER BY
								post_date DESC
							LIMIT 
								1
						");

					// Gets URL
					$doc_url = $results[0]->guid; 

					// Creates HTML codes
					if (!empty($doc_url)){	
						echo "<div id='divAnchor'>";
						echo "<p>Click on the link below to download your certificate.</p>";
						echo "<a href='" . $doc_url . "' target='_blank'>Certificate (PDF)</a>";
						echo "</div>";

					} else {
						echo "<div id='divNoData'>";
						echo "<p>No data found.</p>";
						echo "</div>";
					}
				}
			?>

		</main><!-- #main -->
	</section><!-- #primary -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>
