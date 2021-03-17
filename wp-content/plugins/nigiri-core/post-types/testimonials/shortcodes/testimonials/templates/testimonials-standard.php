<div class="eltdf-testimonials-holder clearfix <?php echo esc_attr($holder_classes); ?>">
    <div class="eltdf-testimonials eltdf-owl-slider" <?php echo nigiri_elated_get_inline_attrs( $data_attr ) ?>>

    <?php if ( $query_results->have_posts() ):
        while ( $query_results->have_posts() ) : $query_results->the_post();
            $title           = get_post_meta( get_the_ID(), 'eltdf_testimonial_title', true );
            $text            = get_post_meta( get_the_ID(), 'eltdf_testimonial_text', true );
            $author          = get_post_meta( get_the_ID(), 'eltdf_testimonial_author', true );
            $position        = get_post_meta( get_the_ID(), 'eltdf_testimonial_author_position', true );
            $signature_image = get_post_meta( get_the_ID(), 'eltdf_testimonial_signature_image_meta', true );

            $current_id = get_the_ID();
    ?>

            <div class="eltdf-testimonial-content" id="eltdf-testimonials-<?php echo esc_attr( $current_id ) ?>">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="eltdf-testimonial-image">
                        <?php echo get_the_post_thumbnail( get_the_ID(), array( 66, 66 ) ); ?>
                    </div>
                <?php } ?>
                <div class="eltdf-testimonial-text-holder">
                    <?php if ( ! empty( $title ) ) { ?>
                        <span class="eltdf-testimonials-quote-sign">&quot;</span>
                        <h2 itemprop="name" class="eltdf-testimonial-title entry-title"><?php echo esc_html( $title ); ?></h2>
                    <?php } ?>
                    <?php if ( ! empty( $text ) ) { ?>
                        <p class="eltdf-testimonial-text"><?php echo esc_html( $text ); ?></p>
                    <?php } ?>
                    <?php if ( ! empty( $signature_image ) ) { ?>
                        <div class="eltdf-signature-image-holder">
                            <img class="eltdf-signature-image" src="<?php echo esc_url($signature_image); ?>" alt="<?php esc_attr_e('Testimonials Signature Image', 'nigiri-core');?>">
                        </div>
                    <?php } ?>
                    <?php if ( ! empty( $author ) ) { ?>
                        <h6 class="eltdf-testimonial-author">
                            <span class="eltdf-testimonials-author-name"><?php echo esc_html( $author ); ?></span>
                        </h6>
                    <?php } ?>
                     <?php if ( ! empty( $position ) ) { ?>
                        <span class="eltdf-testimonials-author-job"><?php echo esc_html( $position ); ?></span>
                    <?php } ?>
                </div>
            </div>

    <?php
        endwhile;
    else:
        echo esc_html__( 'Sorry, no posts matched your criteria.', 'nigiri-core' );
    endif;

    wp_reset_postdata();
    ?>

    </div>
</div>