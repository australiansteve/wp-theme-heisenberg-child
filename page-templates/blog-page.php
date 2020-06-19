<?php
/** 
 * Template Name: Blog Page
 */
get_header(); ?>
<?php
if ( have_posts() ) :

    while ( have_posts() ) :
        the_post();

        $sectionId = 'section_1';
        $sectionClasses= '';
        include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
        include( locate_template( 'page-templates/template-parts/section-video-with-tagline.php', false, false ) ); 
        include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

        $sectionId = 'section_2';
        $sectionClasses= '';
        include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
        ?>
        <div class="section-content">
            <div data-equalizer="product-title-equalizer" data-equalize-on="medium" style="height:100%">
                <div class="grid-x" data-equalizer="product-description-equalizer" data-equalize-on="medium">

                    <div class="cell medium-4 small-full-height">
                        <div class="grid-y align-center">
                            <div class="cell small-6 xlarge-7">
                                <?php
                                $sectionId="section_2_column_1_top";
                                include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
                                ?>
                            </div>
                            <div class="cell small-6 xlarge-5">
                                <?php
                                $sectionId="section_2_column_1_bottom";
                                include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="cell medium-4 small-full-height">
                        <div class="grid-y align-center">
                            <div class="cell small-6 xlarge-7">
                                <?php
                                $sectionId="section_2_column_2_top";
                                include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
                                ?>
                            </div>
                            <div class="cell small-6 xlarge-5">
                                <?php
                                $sectionId="section_2_column_2_bottom";
                                include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="cell medium-4 small-full-height">
                        <div class="grid-y align-center">
                            <div class="cell small-6 xlarge-7">
                                <?php
                                $sectionId="section_2_column_3_top";
                                include( locate_template( 'page-templates/template-parts/section-img-with-background.php', false, false ) ); 
                                ?>
                            </div>
                            <div class="cell small-6 xlarge-5">
                                <?php
                                $sectionId="section_2_column_3_bottom";
                                include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
                                ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <?php   
        include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

        $sectionId = 'section_3';
        $sectionClasses= '';
        include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
        ?>
        <div class="section-content text-left" id="<?php echo $sectionId;?>-content">
            <div class="grid-x">
                <div class="cell medium-6 small-full-height">
                    <div class="grid-y align-center" style="height:100%">
                        <div class="cell small-4 large-6">
                            <?php 
                            $sectionId = 'section_3_block_1';
                            include( locate_template( 'page-templates/template-parts/section-html-with-background.php', false, false ) ); 
                            ?>
                        </div>
                        <div class="cell small-8 large-6">
                            <?php 
                            $sectionId = 'section_3_block_2';
                            ?>
                            <div class="grid-y align-left html-block" id="<?php echo $sectionId;?>">
                                <div class="cell">
                                    <?php
                                    include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
                                    ?>
                                    <div class="latest-video">
                                        <?php
                                        $tax_query = array(
                                            array(
                                                'taxonomy'         => 'category',
                                                'terms'            => 'videos',
                                                'field'            => 'slug',
                                                'operator'         => 'IN',
                                            ),
                                        );

                                        $args = array(
                                            'post_type'              => array( 'post' ),
                                            'post_status'            => array( 'publish' ),
                                            'posts_per_page'         => '1',
                                            'order'                  => 'ASC',
                                            'orderby'                => 'menu_order',
                                            'tax_query'             => $tax_query,
                                        );

                                        $videosquery = new WP_Query( $args );

                                        if ( $videosquery->have_posts() ) {
                                            while ( $videosquery->have_posts() ) {
                                                $videosquery->the_post();
                                                include( locate_template( 'page-templates/template-parts/videos-latest.php', false, false ) ); 

                                            }
                                        }

                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell medium-6 small-half-height" style="position: relative">
                    <?php 
                    $sectionId = 'section_3_block_3';

                    if ( $videosquery->have_posts() ) {
                        while ( $videosquery->have_posts() ) {
                            $videosquery->the_post();

                            $videoDetails = get_field('video_details');
                            error_log("Video details: ".print_r($videoDetails, true));
                            $backgroundImageUrl = isset($videoDetails['placeholder_image']) ? wp_get_attachment_image_src($videoDetails['placeholder_image'], 'full')[0] : get_the_post_thumbnail_url($post, 'full');
                            $hasVideo = isset($videoDetails['video_url']) && $videoDetails['video_url'] != "";
                            ?>
                            <a class="video-link <?php echo $hasVideo ? 'has-video' : ''?>" href="<?php echo $hasVideo ? '#' : the_permalink();?>" data-video-url="<?php echo $videoDetails['video_url'];?>" data-video-caption="<?php echo $videoDetails['video_caption'];?>" data-video-more-text="<?php echo get_field('read_more_button_text');?>" data-backup-url="<?php the_permalink();?>">
                                <div class="background-div background-image-size-cover background-image-no-repeat background-image-small-size-cover background-image-small-no-repeat" style="background-image: url(<?php echo $backgroundImageUrl; ?>); background-position: 50%;">
                                    <i class="fas fa-play"></i>
                                </div>
                            </a>
                            <?php

                        }
                    }

                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php 
            include(locate_template( 'page-templates/template-parts/archive-video-overlay.php', false, false )); 
            include(locate_template( 'page-templates/template-parts/archive-video-javascript.php', false, false )); 
            ?>
        </div>
        <?php 
        
        include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

        $sectionId = 'section_4';
        $sectionClasses= '';
        include( locate_template( 'page-templates/template-parts/section-header.php', false, false ) ); 
        ?>
        <div class="section-content" id="<?php echo $sectionId;?>-content">
            <div class="grid-x">
                <div class="cell medium-6 small-half-height">
                    <?php 
                    $sectionId = 'section_4_column_1';
                    $htmlContent = get_field($sectionId.'_content');
                    $textColor =  get_field($sectionId.'_text_color');
                    $textColor = is_array($textColor) ? $textColor[0] : $textColor; /* Default value comes back in an array */
                    $textPosition =  get_field($sectionId.'_text_position');
                    $textPosition = is_array($textPosition) ? $textPosition['vertical'] : 'center';
                    ?>
                    <div class="grid-y align-<?php echo $textPosition;?> html-block <?php echo $sectionClasses;?>" id="<?php echo $sectionId;?>">
                        <?php
                        include( locate_template( 'page-templates/template-parts/section-background.php', false, false ) ); 
                        ?>
                        <div class="cell" style="<?php if ($textColor) { echo 'color: '.$textColor; } ?>">
                            <?php echo $htmlContent; ?>

                            <div class="latest-thought">
                                <?php
                                $tax_query = array(
                                    array(
                                        'taxonomy'         => 'category',
                                        'terms'            => 'thoughts',
                                        'field'            => 'slug',
                                        'operator'         => 'IN',
                                    ),
                                );

                                $args = array(
                                    'post_type'              => array( 'post' ),
                                    'post_status'            => array( 'publish' ),
                                    'posts_per_page'         => '1',
                                    'order'                  => 'ASC',
                                    'orderby'                => 'menu_order',
                                    'tax_query'             => $tax_query,
                                );

                                $thoughtsquery = new WP_Query( $args );

                                if ( $thoughtsquery->have_posts() ) {
                                    while ( $thoughtsquery->have_posts() ) {
                                        $thoughtsquery->the_post();
                                        include( locate_template( 'page-templates/template-parts/thoughts-latest.php', false, false ) ); 

                                    }
                                }

                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell medium-6 small-half-height" style="position: relative">
                    <?php 
                    $sectionId = 'section_4_column_2';

                    if ( $thoughtsquery->have_posts() ) {
                        while ( $thoughtsquery->have_posts() ) {
                            $thoughtsquery->the_post();

                            $backgroundImageUrl = get_the_post_thumbnail_url($post, 'full');
                            ?>
                                <div class="background-div background-image-size-cover background-image-no-repeat background-image-small-size-cover background-image-small-no-repeat" style="background-image: url(<?php echo $backgroundImageUrl; ?>); background-position: 50%;">
                                </div>
                            <?php
                        }
                    }

                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php   
        include( locate_template( 'page-templates/template-parts/section-footer.php', false, false ) ); 

    endwhile;

else :

    echo esc_html( 'Sorry, no posts' );

endif;
?>
<?php
get_footer();
