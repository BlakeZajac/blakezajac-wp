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

        /*
        * Case: Hero Section
        */
        if (get_row_layout() == 'hero_section') :

            // Load subfields
            $hero_prepended_text = get_sub_field('prepended_text');
            $hero_image = get_sub_field('image');
            $hero_appended_text = get_sub_field('appended_text');

            $icon_accent = get_template_directory_uri() . '/assets/icons/icon-accent.svg';
            $icon_australia = get_template_directory_uri() . '/assets/icons/icon-sydney.svg';
?>

            <div class="section hero">
                <div class="row hero__row">
                    <?php if (!empty($hero_prepended_text) && !empty($hero_appended_text)) : ?>
                        <h2 class="hero__content heading-xl">
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
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; // End media with text section 
        ?>

        <?php
        /*
        * Case: Marquee Section
        */
        if (get_row_layout() == 'marquee_section') :

            // Load subfields
            $marquee_type = get_sub_field('marquee_type');
            $marquee_text_one = get_sub_field('text_one');
            $marquee_text_two = get_sub_field('text_two'); ?>

            <div class="section marquee-wrapper">
                <div class=" marquee marquee--<?php echo $marquee_type; ?>">
                    <div class="row marquee__content scroll">
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                            <div class="marquee__item heading-lg span-text">
                                <?php echo $marquee_text_one; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="marquee marquee--<?php echo $marquee_type; ?>">
                    <div class="row marquee__content scroll">
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                            <div class="marquee__item heading-lg span-text">
                                <?php if (empty($marquee_text_two)) :
                                    echo $marquee_text_one;

                                elseif (!empty($marquee_text_two)) :
                                    echo $marquee_text_two;
                                endif; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

<?php endif;
    // End marquee section

    // End loop
    endwhile;

endif;

get_footer();
