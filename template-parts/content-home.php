<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<div class="row">
    <div class="content-box">
    <?php 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    if ( has_custom_logo() ) {
        echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
    } else {
        the_title( '<h1 class="entry-title">', '</h1>' );
    }
    ?>
    <p>
    <?php the_content(); ?>
    </p>
    </div>
    <div class="content-box">
        <?php
        the_post_thumbnail( 'medium' );
        ?>
    </div>
</div>