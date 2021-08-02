<?php
/**
 * Template part for displaying combinations
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
?>

<?php
$title = get_field("yhdistelma_otsikko");

$male = get_field("yhdistelma_uros");
$male_name = get_field("koira_kutsumanimi", $male->ID);
$male_link = esc_url( get_field("koira_linkki_koiranet", $male->ID));
$male_regnumber  = get_field("koira_rekisterinumero", $male->ID);
$male_image_url = esc_url(get_field( "koira_kuva", $male->ID)['url']);
$male_titles = get_field("koira_tittelit", $male->ID);
$male_kennelname = get_field("koira_kennelnimi", $male->ID);

$female = get_field("yhdistelma_narttu");
$female_name = get_field("koira_kutsumanimi", $female->ID);
$female_regnumber  = get_field("koira_rekisterinumero", $female->ID);
$female_link = esc_url( get_field("koira_linkki_koiranet", $female->ID));
$female_image_url = esc_url(get_field( "koira_kuva", $female->ID)['url']);
$female_titles = get_field("koira_tittelit", $female->ID);
$female_kennelname = get_field("koira_kennelnimi", $female->ID);

$description = get_field("yhdistelma_kuvaus");
$image_url = esc_url(get_field("yhdistelma_yhteiskuva")['url']);
$puppies = get_field("yhdistelma_pennut");
?>




<div class="combination">
    <h2 class=combination-title><?php echo $title ?></h2>
    <div class="combination-row">
        <div class="combination-box"><img src="<?php echo $male_image_url ?>" class="picture" alt="<?php $male_name ?>"></div>
        <div class="combination-box"><img src="<?php echo $female_image_url ?>" class="picture" alt="<?php $female_name ?>"></div>
    </div>
    <div class="combination-row">
        <div class="combination-box">
            <h2><?php echo $male_name ?></h2>
            <a href="<?php echo $male_link ?>"
                target=”_blank”>
                <h3><?php echo $male_regnumber ?></h3>
            </a>
            <h3><span class="titles"><?php echo $male_titles ?> </span><?php echo $male_kennelname ?></h3>
        </div>
        <div class="combination-box">
            <h2><?php echo $female_name ?></h2>
            <a href="<?php echo $female_link ?>"
                target=”_blank”>
                <h3><?php echo $female_regnumber ?></h3>
            </a>
            <h3><span class="titles"><?php echo $female_titles ?> </span><?php echo $female_kennelname ?></h3>
        </div>
    </div>
    <div class="koiranet-link custom-background">
        <a href=""
            target=”_blank” class="koiranet">Yhdistelmä KoiraNetissä</a>
    </div>
    <div class="combination-row">
        <div class="combination-box"><img src="<?php echo $image_url ?>" class="picture"></div>
    </div>
    <div class="combination-row">
        <div class="combination-box">
            <?php echo $description ?>
        </div>
    </div>

    <?php
    if( $puppies):
        $puppy_class = "puppies-" . get_the_ID();
    ?>

    <button class="show-more <?php echo $puppy_class ?>" onclick="togglePuppies('<?php echo $puppy_class ?>')">
        <h3>
            Näytä enemmän<br>
            <i class="fas fa-angle-double-down"></i>
        </h3>
    </button>
    <button class="show-more <?php echo $puppy_class ?>" onclick="togglePuppies('<?php echo $puppy_class ?>')" style="display: none;">
        <h3>
            Näytä vähemmän<br>
            <i class="fas fa-angle-double-up"></i>
        </h3>
    </button>
    <div class="puppies <?php echo $puppy_class ?>" style="display: none;">
    <?php
        foreach ($puppies as $post):
            setup_postdata($post);
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
        <?php endforeach; ?>
    </div>
    <button class="show-more <?php echo $puppy_class ?>" onclick="togglePuppies('<?php echo $puppy_class ?>')" style="display: none;">
        <h3>
            Näytä vähemmän<br>
            <i class="fas fa-angle-double-up"></i>
        </h3>
    </button>
    <?php
    wp_reset_postdata(); ?>
    <?php endif; ?>
</div>