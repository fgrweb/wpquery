<?php
/**
 * Shortcode for displaying a taxonomy Film
 */
function fgr_show_films( $atts ) {
	$atributos = shortcode_atts( array(
		'genre' => '',
		'posts_per_page' => -1,
		'nombre' => '',
		),
	$atts );
	$args = array(
		'post_type'     => 'fgr-films',
		'post_per_page' => $atributos['posts_per_page'],
	);
	if ( '' !== $atributos['genre'] ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'genre',
				'field'    => 'slug',
				'terms'    => $atributos['genre'],
			),
		);
	}
	$la_query = new WP_Query( $args );
	// Loop
	?>
	<div class="header-section">
		<h2><?php echo __( 'Películas de ' . $atributos['nombre'], 'wp-query' ); ?></h2>
	</div>
	<div class="content-section">
	<?php
	if ( $la_query-> have_posts() ) {
		while ( $la_query->have_posts() ) {
			$la_query->the_post();
			?>
			<div class="content-post">
				<a href="<?php the_permalink(); ?>"> <?php the_title( '<h3>', '</h3>' ); ?></a>
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'medium', array( 'alt' => get_the_title(), ) );
				}
				?>
			</div>
			<?php
		}
		wp_reset_postdata();
	}
}
add_shortcode( 'show_films', 'fgr_show_films' );
