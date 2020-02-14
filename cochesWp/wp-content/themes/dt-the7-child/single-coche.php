<?php get_header(); ?>
<link rel='stylesheet' id='ultimate-style-min-css'  href='https://carwagenocasion.enuttisworking.com/wp-content/plugins/Ultimate_VC_Addons/assets/min-css/ultimate.min.css' type='text/css' media='all' />
<?php /* <link rel='stylesheet' id='ult-icons-css'  href='https://carwagenocasion.enuttisworking.com/wp-content/plugins/Ultimate_VC_Addons/modules/../assets/css/icons.css' type='text/css' media='all' /> */ ?>
<?php while ( have_posts() ) : the_post(); ?>
  <div id="content" class="content" role="main">
    <?php 
      $gallery = get_post_meta( $post->ID, 'coche_galeria', true );
      parse_str( parse_url( get_post_meta( $post->ID, 'coche_video', true ), PHP_URL_QUERY ), $video );
    ?>
      <div class="coche-box">
        <div id="swiper-container-profile-coche" class="swiper-container">
          <div class="swiper-wrapper">
            <?php if(isset($video['v'])) { ?>
              <div class='swiper-slide video'><iframe src="https://www.youtube.com/embed/<?php  echo $video['v']; ?>?showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
              <?php } ?>
            <?php foreach ($gallery as $image) { $image = wp_get_attachment_image_src( $image, 'large'); ?>
              <div class='swiper-slide'><img src='<?php echo $image[0]; ?>' alt='<?php the_title(); ?>'/></div>
            <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev" id="swiper-button-prev-profile-coche"></div>
          <div class="swiper-button-next" id="swiper-button-next-profile-coche"></div>
        </div>
        <?php
          $price = get_post_meta( $post->ID, 'coche_price', true ); 
          $fprice = carwagen_coche_format_data ($price, 'coche_price');
          $fprice_financed = carwagen_coche_format_data (get_post_meta( $post->ID, 'coche_price_financed', true ), 'coche_price_financed');
          $tagtext = get_post_meta( $post->ID, 'coche_tagtext', true );
          if ($tagtext != '') $tagcolor = get_post_meta( $post->ID, 'coche_tagcolor', true );
        ?>
        <p class='coche-box-price'><span><?php _e("Al contado", 'the7mk2'); ?></span><?php echo $fprice; ?></p>
        <p class='coche-box-price-financed'><span><?php _e("Financiado", 'the7mk2'); ?></span><?php echo $fprice_financed; ?></p>
        <?php if ($tagtext != '') { ?><p class='coche-box-tag <?php echo $tagcolor; ?>'><?php echo $tagtext; ?></p><?php } ?>
      </div>
      <?php $theme = get_post(352); 
      $content = $theme->post_content;
      $htmlextras1 = "";
      $htmlextras2 = "";
      $extras = array_values(array_filter(get_post_meta( $post->ID, 'coche_extras', true )));
      list($extras1, $extras2) = array_chunk($extras, ceil(count($extras) / 2));
      foreach ($extras1 as $extra) {
        $htmlextras1 .= "<p><strong><span style='color: red;'>►</span></strong> ".$extra."</p>";
      }
      foreach ($extras2 as $extra) {
        $htmlextras2 .= "<p><strong><span style='color: red;'>►</span></strong> ".$extra."</p>";
      }

      preg_match_all ("/{\|[\s\S]*?\|}/", $content, $labels);
      foreach ($labels[0] as $label) {
        $field = preg_replace("/[^a-zA-Z0-9_]+/", "", $label);
        if ($field == 'extras1') {
          $content = str_replace($label, $htmlextras1, $content);
        } else if ($field == 'extras2') {
          $content = str_replace($label, $htmlextras2, $content);
        } else $content = str_replace($label, carwagen_coche_format_data (get_post_meta( $post->ID, 'coche_'.$field, true ), 'coche_'.$field), $content);
      }
      echo apply_filters('the_content', $content);
    ?>
  </div>
  <?php carwagen_coche_microformat ($post->ID); ?>
<?php endwhile; ?>
<?php get_sidebar(); ?>


<?php add_action('wp_footer', 'carwagen_coche_profile_swiper_footer', 100000);

function carwagen_coche_profile_swiper_footer() { ?>
  <script>
    jQuery(window).load(function(){
        var mySwiperProfileCoche = new Swiper("#swiper-container-profile-coche", {
        speed: 400,
        spaceBetween: 0,
        slidesPerView: 1,
        pagination: {
          el: '.swiper-pagination',
          type: 'fraction',
        },
        navigation: {
          nextEl: '#swiper-button-next-profile-coche',
          prevEl: '#swiper-button-prev-profile-coche',
        }
      });
    });
  </script><?php
} ?>
<?php get_footer(); ?>