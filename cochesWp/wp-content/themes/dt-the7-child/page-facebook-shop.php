<?php 

/* Template Name: Facebook Shop Feed */ 

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=file.csv");
header("Pragma: no-cache");
header("Expires: 0");
$csv = "id,title,description,google_product_category,link,image_link,condition,availability,price,brand,color\n";
$args = array(
  'post_type' => 'coche',
  'posts_per_page' => -1,
  'post_status' => 'publish',
  'order' => 'DESC',
  'orderby' => 'date',
  'meta_query'	=> array(
    array(
      'key'	 	=> 'coche_incoming',
      'compare'   => '==',
      'value'	  	=> 0,
    )
  )
);
$counter = 1;
$the_query = new WP_Query( $args);
if ($the_query->have_posts() ) { 
  while ( $the_query->have_posts() ) { $the_query->the_post(); $counter ++;
    $brands = get_the_terms( $post->ID, 'marca-coche-ocasion' );
    $brand_name = $brands[0]->name;
    $types = get_the_terms( $id, 'tipo-coche-ocasion' );
    $type = $types[0]->name;
    $gallery = get_post_meta( $post->ID, 'coche_galeria', true );
    if(count($gallery) > 0) $main_image = wp_get_attachment_image_src( $gallery[0], $size);
    $year = get_post_meta( $post->ID, 'coche_year', true );
    $fyear = carwagen_coche_format_data ($year, 'coche_year');
    $name = get_post_meta( $post->ID, 'coche_name', true );
    $model = get_post_meta( $post->ID, 'coche_model', true );
    $color = get_post_meta( $post->ID, 'coche_color', true ); 
    $price = get_post_meta( $post->ID, 'coche_price', true );
    $fprice = carwagen_coche_format_data ($price, 'coche_price');
    $price_financed = get_post_meta( $post->ID, 'coche_price_financed', true );
    $fprice_financed = carwagen_coche_format_data ($price_financed, 'coche_price_financed');
    $km = get_post_meta( $post->ID, 'coche_km', true );
    $fkm = carwagen_coche_format_data ($km, 'coche_km');
    $cv = get_post_meta( $post->ID, 'coche_cv', true );
    $fcv = carwagen_coche_format_data ($cv, 'coche_cv');
    $fuel = get_post_meta( $post->ID, 'coche_fuel', true );
    $ffuel = carwagen_coche_transform_label_to_text ($fuel);
    $traction = get_post_meta( $post->ID, 'coche_traction', true );
    $ftraction = carwagen_coche_transform_label_to_text ($traction);
    $transmission = get_post_meta( $post->ID, 'coche_transmission', true );
    $ftransmission = carwagen_coche_transform_label_to_text ($transmission);
    $seats = get_post_meta( $post->ID, 'coche_seats', true );
    $doors = get_post_meta( $post->ID, 'coche_doors', true );

    $description =  sprintf( __("%s %s %s %s (%s) del año %s por %s (%s financiado).", 'the7mk2'), $brand_name, $name, $model, $color, $type, $fyear, $fprice, $fprice_financed);
    $description .= sprintf( __(" %s, %s, tracción %s, cambio %s y %s.", 'the7mk2'), $fkm, $fcv, strtolower($ftraction), strtolower($ftransmission), strtolower($ffuel) );
    $description .= sprintf( __(" Tiene %s puertas y capacidad para %s personas.", 'the7mk2'), $doors, $seats);
    
    //id,title,description,google_product_category,link,image_link,condition,availability,price,brand,color
    $csv .= $counter.",";
    $csv .= "\"".$brand_name." ".$name." ".$model." del ".$fyear."\",";
    $csv .= "\"".$description."\",";
    $csv .= "\"Vehicles & Parts > Vehicles > Motor Vehicles > Cars, Trucks & Vans\",";
    $csv .= get_the_permalink().",";
    $csv .= $main_image[0].",";
    $csv .= "used,";
    $csv .= "in stock,";
    $csv .= $price." EUR,";
    $csv .= "\"".$brand_name."\",";
    $csv .= "\"".$color."\"";
    $csv .= "\n";
  }
} wp_reset_query();
echo $csv; ?>