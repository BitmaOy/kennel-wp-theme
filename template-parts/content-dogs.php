<?php
/**
 * Template part for displaying dogs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
?>

<div class="card">
	<div class="content-box">
		<h2><?php the_field("koira_kutsumanimi") ?></h2>
		<a href="<?php echo esc_url( get_field("koira_linkki_koiranet") ); ?>" target=”_blank”><h3><?php the_field("koira_rekisterinumero") ?></h3></a>
		<h3><span class="titles"><?php the_field("koira_tittelit") ?></span><?php the_field("koira_kennelnimi") ?></h3>
		<div class="health-info">
		<?php the_field("koira_terveystulokset") ?>
		</div>
		<div class="description">
		<?php the_field("koira_kuvaus") ?>
		</div>
	</div>
	<div class="content-box">
	<?php
	$image = get_field( "koira_kuva");
	$image_url = esc_url($image['url']);
	$kutsumanimi = get_field("koira_kutsumanimi");
	echo '<img src="' . $image_url . '" class="picture" alt="the_field("' . $kutsumanimi . '")" />'
	?>	
	</div>
</div>