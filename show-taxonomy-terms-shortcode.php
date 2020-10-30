<?php
//Create shortcode show category
function category_shortcode(){
  $siteurl = home_url('/');
  $tax = 'custom-slug';  // slug of taxonomy
  $terms = get_terms($tax);
  foreach ($terms as $term) {
    $id = $term->term_id;
    $slug = $term->slug;
    $description = $term->description;
    $image_url = z_taxonomy_image_url( $id, NULL, TRUE );
    $link = "$tax/$term->name";
    ?>
    <a  href="<?php echo $tax. "/" .  sanitize_title_with_dashes($term->slug); ?>" class="url-box" title=" <?php echo $slug ?>">
      <figure class='newsCard news-Slide-up'>
        <img data-src="<?php echo $image_url ?>" />
        <div class='newsCaption px-4'>
          <div class="d-flex align-items-center justify-content-between cnt-title">
            <h5 class='newsCaption-title text-white m-0'> <?php echo $term->name ?></h5> <i class="fas fa-arrow-alt-circle-right "></i>
          </div>
          <div class='newsCaption-content d-flex '>
            <p class="col-10 py-3 px-0"> <?php echo $description ?> </p>
            <div class="col-2">
            </div>
          </div>
        </div>
        <span class="overlay"></span>
      </figure>
    </a>
  <?php }
}
add_shortcode ('category_shortcode', 'category_shortcode');
?>
