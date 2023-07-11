<?php
get_header();

/**
 * ACF flexible content
 */

// Check if value exists
if (have_rows('components')) :

    // Loop through rows
    while (have_rows('components')) :
        the_row();

        // Case: Hero section
        if (get_row_layout() == 'hero_section') :

            // Load subfields
            $hero_prepended_text = get_sub_field('prepended_text');
            $hero_image = get_sub_field('image');
            $hero_appended_text = get_sub_field('appended_text');

            $icon_accent = "/wp-content/themes/blake-zajac/assets/icons/icon-accent.svg";
            $icon_australia = "/wp-content/themes/blake-zajac/assets/icons/icon-sydney.svg";
?>

            <div class="section hero">
                <div class="row hero__row">
                    <?php if (!empty($hero_prepended_text) && !empty($hero_appended_text)) : ?>
                        <h2 class="hero__content heading-xl span-text">
                            <?php echo $hero_prepended_text; ?>

                            <?php if (!empty($hero_image)) : ?>
                                <div class="hero__image-wrapper">
                                    <img src="<?php echo $hero_image['url']; ?>" alt="" class="hero__image">
                                    <img src="<?php echo $icon_accent; ?>" alt="" class="hero__image__accent">
                                </div>
                            <?php endif; ?>

                            <?php echo $hero_appended_text; ?>
                        </h2>
                    <?php endif; ?>

                    <?php // Loop over the badges
                    if (have_rows('badge')) : ?>
                        <div class="badge__wrapper">
                            <?php while (have_rows('badge')) :
                                the_row();

                                // Load subfields
                                $badge_type = get_sub_field('badge_type');
                                $badge_text = get_sub_field('badge_text'); ?>

                                <div class="badge badge--<?php echo $badge_type; ?>">
                                    <?php if ($badge_type == 'dot') : ?>
                                        <div class="badge__dot"></div>
                                    <?php endif; ?>

                                    <?php if ($badge_type == 'location') : ?>
                                        <img src="<?php echo $icon_australia; ?>" alt="" class="badge__image">
                                    <?php endif; ?>

                                    <p class="badge__content text-uppercase text-uppercase--sm">
                                        <?php echo $badge_text; ?>
                                    </p>
                                </div>

                            <?php endwhile; ?>
                        </div>
                </div>
            </div>
<?php endif;


                endif;

            // End loop
            endwhile;

        endif;


        get_footer();
