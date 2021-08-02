<?php
/**
 * Template Name: Etusivu
 *
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

    <div class="cover" style="background-image: url(<?php echo wp_get_upload_dir()['url'] . '/bg.jpg'?>)">
            <div class="ellipse">
                <?php 
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
					echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
				} else {
					echo '<h1>' . get_bloginfo('name') . '</h1>';
				} ?>
            </div>
    </div>
	<div id="esittely" class="content">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'home' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>

<?php
get_sidebar();
get_footer();
