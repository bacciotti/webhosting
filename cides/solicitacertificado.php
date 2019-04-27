<?php
/*
Template name: Certificados
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
			    $cpf_usuario = trim($_GET['cpf_usuario']);
				if (is_numeric($cpf_usuario)){
					$url_certifica = "https://localhost/website/wp-content/uploads/2019/04/" . $cpf_usuario .".pdf";
					echo "<div>";
					echo "<p>Clique no link abaixo para fazer o download do seu certificado</p>";
					echo "<a href='" . $url_certifica . "' target='_blank'>Certificado de participação (PDF)</a>";
					echo "</div>";
	
				} else {
					echo "CPF inválido.";
				}
			?>

		
		</main><!-- #main -->
	</section><!-- #primary -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>
