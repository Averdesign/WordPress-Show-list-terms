<?php
//Create shortcode show category
function category_shortcode(){?>

<?php
$terms = apply_filters( 'taxonomy-images-get-terms', '', array(
            'taxonomy' => 'tipologia-servizi',
        ) );

        $siteurl = home_url('/');
          $tax = 'tipologia-servizi';  // slug of taxonomy
        if ( ! empty( $terms ) ) {
            print "\n" . '<div class="row">';
            foreach( (array) $terms as $term ) {
              $terms = get_terms($tax);
              $id = $term->term_id;
              $slug = $term->slug;
              $description = $term->description;
              ?>

              <div class="col-lg-4 reveal">
                <a  href="<?php echo $tax. "/" .sanitize_title_with_dashes($term->slug); ?>" class="url-box" title=" <?php echo $slug ?>">
                  <figure class='newsCard news-Slide-up'>
                    <img data-src=" <?php echo wp_get_attachment_image_url( $term->image_id, 'unique-woo-feature' ) ?>" />
                    <div class='newsCaption px-4'>
                      <div class="d-flex align-items-center justify-content-between cnt-title">
                        <h5 class='newsCaption-title text-white m-0'> <?php echo $term->name ?></h5> <i class="fas fa-arrow-alt-circle-right ">
                        </i>
                      </div>
                      <div class='newsCaption-content d-flex '>
                        <p class="col-10 py-3 px-0 elipsis"><?php echo $description ?></p>
                      </div>
                    </div>
                    <span class="box-overlay"></span>
                  </figure>
                </a>
              </div>

          <?php  }
            print "\n" . '</div>';
        }

?>



  <?php
}
add_shortcode ('category_shortcode', 'category_shortcode');
?>
