<?php 

//Coches -------------------------
add_action( 'init', 'carwagen_coche_create_post_type' );
function carwagen_coche_create_post_type() {
	$labels = array(
		'name'               => __( 'Coches Ocasión', 'the7mk2' ),
		'singular_name'      => __( 'Coche', 'the7mk2' ),
		'add_new'            => __( 'Añadir nuevo', 'the7mk2' ),
		'add_new_item'       => __( 'Añadir nuevo coche', 'the7mk2' ),
		'edit_item'          => __( 'Editar coche', 'the7mk2' ),
		'new_item'           => __( 'Nuevo coche', 'the7mk2' ),
		'all_items'          => __( 'Todos los coches', 'the7mk2' ),
		'view_item'          => __( 'Ver coche', 'the7mk2' ),
		'search_items'       => __( 'Buscar coche', 'the7mk2' ),
		'not_found'          => __( 'Coche no encontrado', 'the7mk2' ),
		'not_found_in_trash' => __( 'Coche no encontrado en la papelera', 'the7mk2' ),
		'menu_name'          => __( 'Coches', 'the7mk2' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => __( 'Añadir nuevo coche', 'the7mk2' ),
		'public'        => true,
		'menu_position' => 6,
		'taxonomies' 	=> array('tipo-coche-ocasion', 'marca-coche-ocasion'),
		'query_var' 	=> true,
  'supports'      => array( 'title'/*, 'editor'*/ ),
		'rewrite'	=> array('slug' => 'coche-ocasion', 'with_front' => false),
		'query_var'	=> true,
		'has_archive' 	=> false,
		'hierarchical'	=> true,
	);
	register_post_type( 'coche', $args );
}

//Campos de los coches -------------------------
$coche_fields['name'] = array("name" => __('Nombre', 'the7mk2'), "type" => "text" );
$coche_fields['model'] = array("name" => __('Modelo', 'the7mk2'), "type" => "text" );
$coche_fields['price'] = array("name" => __('Precio', 'the7mk2'), "type" => "number", "text" => "€" );
$coche_fields['price_financed'] = array("name" => __('Precio financiado', 'the7mk2'), "type" => "number", "text" => "€" );
$coche_fields['fuel'] = array("name" => __('Combustible', 'the7mk2'), "type" => "select", "values" => array("gasolina" => __('Gasolina', 'the7mk2'), "diesel" => __('Diesel', 'the7mk2') ), "all" =>  __('Todos los combustibles', 'the7mk2'));
$coche_fields['transmission'] = array("name" => __('Cambio', 'the7mk2'), "type" => "select", "values" => array("manual" => __('Manual', 'the7mk2'), "automatico" => __('Automatico', 'the7mk2') ), "all" =>  __('Todos los cambios', 'the7mk2') );
$coche_fields['traction'] = array("name" => __('Tracción', 'the7mk2'), "type" => "select", "values" => array("delantera" => __('Delantera', 'the7mk2'), "trasera" => __('Trasera', 'the7mk2'), "4x4" => __('4x4', 'the7mk2') ) );
$coche_fields['year'] = array("name" => __('Año', 'the7mk2'), "type" => "number" );
$coche_fields['km'] = array("name" => __('Kilometraje', 'the7mk2'), "type" => "number", "text" => "Kms." );
$coche_fields['cv'] = array("name" => __('Potencia', 'the7mk2'), "type" => "number", "text" => "CV" );
$coche_fields['warranty'] = array("name" => __('Garantia', 'the7mk2'), "type" => "number", "text" => " meses" );
$coche_fields['color'] = array("name" => __('Color', 'the7mk2'), "type" => "text" );
$coche_fields['seats'] = array("name" => __('Asientos', 'the7mk2'), "type" => "number" );
$coche_fields['doors'] = array("name" => __('Puertas', 'the7mk2'), "type" => "number" );

$coche_estatus_fields['featured'] = array("name" => __('Destacado', 'the7mk2'), "type" => "select", "values" => array("0" => __('No', 'the7mk2'), "1" => __('Sí', 'the7mk2') ) );
$coche_estatus_fields['incoming'] = array("name" => __('Próximo coche', 'the7mk2'), "type" => "select", "values" => array("0" => __('No', 'the7mk2'), "1" => __('Sí', 'the7mk2') ) );
$coche_estatus_fields['tagtext'] = array("name" => __('Texto de etiqueta de promoción', 'the7mk2'), "type" => "text" );
$coche_estatus_fields['tagcolor'] = array("name" => __('Color de etiqueta de promoción', 'the7mk2'), "type" => "select", "values" => array("black" => __('Negro', 'the7mk2'), "red" => __('Rojo', 'the7mk2') ) );

//Tipo -------------------------
add_action( 'init', 'carwagen_tipo_coche_create_type' );
function carwagen_tipo_coche_create_type() {
	$labels = array(
		'name'              => __( 'Tipos', 'the7mk2' ),
		'singular_name'     => __( 'Tipo', 'the7mk2' ),
		'search_items'      => __( 'Buscar tipo', 'the7mk2' ),
		'all_items'         => __( 'Todos los tipos', 'the7mk2' ),
		'parent_item'       => __( 'Pariente tipo', 'the7mk2' ),
		'parent_item_colon' => __( 'Pariente tipo', 'the7mk2' ).":",
		'edit_item'         => __( 'Editar tipo', 'the7mk2' ),
		'update_item'       => __( 'Actualizar tipo', 'the7mk2' ),
		'add_new_item'      => __( 'Añadir tipo', 'the7mk2' ),
		'new_item_name'     => __( 'Nuevo tipo', 'the7mk2' ),
		'menu_name'         => __( 'Tipos', 'the7mk2' ),
	);
	$args = array(
		'labels' 		=> $labels,
		'hierarchical' 		=> true,
		'public'		=> true,
		'query_var'		=> true,
		'show_in_nav_menus'	=> true,
		'rewrite'		=>  array('slug' => 'tipo-coche-ocasion', 'with_front' => false ),
		//'_builtin'		=> false,
	);
	register_taxonomy( 'tipo-coche-ocasion', 'coche', $args );
}

function carwagen_tipo_coche_ocasion_taxonomy_custom_fields($tag) {   
  $term_meta = get_option( "taxonomy_term_".$tag->term_id ); ?>
  <tr class="form-field">  
    <th scope="row" valign="top">  
        <label for="order"><?php _e( 'Orden', 'the7mk2' ); ?></label>
    </th>  
    <td>  
        <input type="number" name="term_meta[order]" id="term_meta[order]" size="25" style="width:60%;" value="<?php echo $term_meta['order'] ? $term_meta['order'] : '0'; ?>"><br />  
    </td>  
  </tr>
  <tr class="form-field">  
    <th scope="row" valign="top">  
        <label for="order"><?php _e( 'Image', 'the7mk2' ); ?></label>
    </th>  
    <td>  
        <input type="text" name="term_meta[image]" id="term_meta[image]" size="25" style="width:100%;" value="<?php echo $term_meta['image'] ? $term_meta['image'] : ''; ?>"><br />  
    </td>  
  </tr> 
<?php }
 
add_action( 'tipo-coche-ocasion_edit_form_fields', 'carwagen_tipo_coche_ocasion_taxonomy_custom_fields', 10, 2 );   

function carwagen_tipo_coche_ocasion_save_taxonomy_custom_fields( $term_id ) {  
  if ( isset( $_POST['term_meta'] ) ) {  
    $term_meta = get_option( "taxonomy_term_".$term_id );  
    $cat_keys = array_keys( $_POST['term_meta'] );  
      foreach ( $cat_keys as $key ){  
      if ( isset( $_POST['term_meta'][$key] ) ){  
        $term_meta[$key] = $_POST['term_meta'][$key];  
      }  
    }  
    //save the option array  
    update_option( "taxonomy_term_".$term_id, $term_meta );  
  }  
} 

add_action( 'edited_tipo-coche-ocasion', 'carwagen_tipo_coche_ocasion_save_taxonomy_custom_fields', 10, 2 );  

//Marca -------------------------
add_action( 'init', 'carwagen_marca_coche_create_type' );
function carwagen_marca_coche_create_type() {
	$labels = array(
		'name'              => __( 'Marcas', 'the7mk2' ),
		'singular_name'     => __( 'Marca', 'the7mk2' ),
		'search_items'      => __( 'Buscar marca', 'the7mk2' ),
		'all_items'         => __( 'Todas las marcas', 'the7mk2' ),
		'parent_item'       => __( 'Pariente marca', 'the7mk2' ),
		'parent_item_colon' => __( 'Pariente marca', 'the7mk2' ).":",
		'edit_item'         => __( 'Editar marca', 'the7mk2' ),
		'update_item'       => __( 'Actualizar marca', 'the7mk2' ),
		'add_new_item'      => __( 'Añadir marca', 'the7mk2' ),
		'new_item_name'     => __( 'Nueva marca', 'the7mk2' ),
		'menu_name'         => __( 'Marcas', 'the7mk2' ),
	);
	$args = array(
		'labels' 		=> $labels,
		'hierarchical' 		=> true,
		'public'		=> true,
		'query_var'		=> true,
		'show_in_nav_menus'	=> true,
		'rewrite'		=>  array('slug' => 'marca-coche-ocasion', 'with_front' => false ),
		//'_builtin'		=> false,
	);
	register_taxonomy( 'marca-coche-ocasion', 'coche', $args );
}

function carwagen_marca_coche_ocasion_taxonomy_custom_fields($tag) {   
  $term_meta = get_option( "taxonomy_term_".$tag->term_id ); ?>
  <tr class="form-field">  
    <th scope="row" valign="top">  
        <label for="order"><?php _e( 'Orden', 'the7mk2' ); ?></label>
    </th>  
    <td>  
        <input type="number" name="term_meta[order]" id="term_meta[order]" size="25" style="width:60%;" value="<?php echo $term_meta['order'] ? $term_meta['order'] : '0'; ?>"><br />  
    </td>  
  </tr>
  <tr class="form-field">  
    <th scope="row" valign="top">  
        <label for="order"><?php _e( 'Image', 'the7mk2' ); ?></label>
    </th>  
    <td>  
        <input type="text" name="term_meta[image]" id="term_meta[image]" size="25" style="width:100%;" value="<?php echo $term_meta['image'] ? $term_meta['image'] : ''; ?>"><br />  
    </td>  
  </tr>   
<?php }
  
add_action( 'marca-coche-ocasion_edit_form_fields', 'carwagen_marca_coche_ocasion_taxonomy_custom_fields', 10, 2 );   

function carwagen_marca_coche_ocasion_save_taxonomy_custom_fields( $term_id ) {  
  if ( isset( $_POST['term_meta'] ) ) {  
    $term_meta = get_option( "taxonomy_term_".$term_id );  
    $cat_keys = array_keys( $_POST['term_meta'] );  
      foreach ( $cat_keys as $key ){  
      if ( isset( $_POST['term_meta'][$key] ) ){  
        $term_meta[$key] = $_POST['term_meta'][$key];  
      }  
    }  
    //save the option array  
    update_option( "taxonomy_term_".$term_id, $term_meta );  
  }  
} 

add_action( 'edited_marca-coche-ocasion', 'carwagen_marca_coche_ocasion_save_taxonomy_custom_fields', 10, 2 );

//Columnas ------------------------------------------------
function carwagen_coche_set_custom_edit_columns($columns) {
  $columns['image'] = __( 'Imagen', 'the7mk2');
  $columns['tipo-coche-ocasion'] = __( 'Tipo', 'the7mk2');
  $columns['marca-coche-ocasion'] = __( 'Marca', 'the7mk2');
  $columns['price'] = __( 'Precio', 'the7mk2');
  $columns['year'] = __( 'Año', 'the7mk2');
  $columns['km'] = __( 'Kilometraje', 'the7mk2');
  $columns['cv'] = __( 'Potencia', 'the7mk2');
  $columns['fuel'] = __( 'Combustible', 'the7mk2');
  $columns['status'] = __( 'Estatus', 'the7mk2');
  unset($columns['date']);
	return $columns;
}

function carwagen_coche_custom_column( $column ) {
  global $post;
  if ($column == 'tipo-coche-ocasion') {
    $terms = get_the_terms( $post->ID, 'tipo-coche-ocasion' ); 
    foreach($terms as $term) {
      echo $term->name;
    }
  } else if ($column == 'marca-coche-ocasion') {
    $terms = get_the_terms( $post->ID, 'marca-coche-ocasion' ); 
    foreach($terms as $term) {
      echo $term->name;
    }
  } else if ($column == 'image') {
    $gallery = get_post_meta( $post->ID, 'coche_galeria', true );
    if(count($gallery) > 0) {
      $main_image = wp_get_attachment_image_src( $gallery[0], 'medium');
    } echo "<img src='".$main_image[0]."' alt='' style='width: 100%;' /><br/>".sprintf(__('%d fotos', 'the7mk2'), count($gallery));
  }
  else if ($column == 'price') echo carwagen_coche_format_data (get_post_meta( $post->ID, 'coche_price', true ), 'coche_price');
  else if ($column == 'year') echo carwagen_coche_format_data (get_post_meta( $post->ID, 'coche_year', true ), 'coche_year');
  else if ($column == 'km') echo carwagen_coche_format_data (get_post_meta( $post->ID, 'coche_km', true ), 'coche_km');
  else if ($column == 'cv') echo carwagen_coche_format_data (get_post_meta( $post->ID, 'coche_cv', true ), 'coche_cv');
  else if ($column == 'fuel') echo get_post_meta( $post->ID, 'coche_fuel', true );
  else if ($column == 'status') {
    if(get_post_meta( $post->ID, 'coche_featured', true ) == '1') echo "<p style='color: white; background-color: black; display: inline-block; padding: 10px;'>".__('DESTACADO', 'the7mk2')."</p>";
    if(get_post_meta( $post->ID, 'coche_incoming', true ) == '1') echo "<p style='color: white; background-color: red; display: inline-block; padding: 10px;'>".__('PRÓXIMO', 'the7mk2')."</p>";
  }
}

//Ordenación de columnas ------------------------------------------------
$coche_ordenations = array ('price', 'year', 'km', 'cv');
function carwagen_coche_order_column_register_sortable($columns) {
  global $coche_ordenations;
  foreach ($coche_ordenations as $order) {
    $columns[$order] = $order;
  }
  return $columns;
}

function carwagen_coche_custom_column_query( $query ) {
  global $coche_ordenations;
  if(in_array($_GET['orderby'], $coche_ordenations)) {
    $query->query_vars['orderby'] = 'meta_value_num';
    $query->query_vars['meta_key'] = 'coche_'.$_GET['orderby'];
  }
}

//Filtros por taxonomias ------------------------------------------------
function carwagen_tipo_coche_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'coche'; // change to your post type
	$taxonomy  = 'tipo-coche-ocasion'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf( __( 'Mostrar todos los %s', 'the7mk2' ), $info_taxonomy->label ),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

function carwagen_tipo_coche_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'coche'; // change to your post type
	$taxonomy  = 'tipo-coche-ocasion'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

function carwagen_marca_coche_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'coche'; // change to your post type
	$taxonomy  = 'marca-coche-ocasion'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf( __( 'Mostrar todas las %s', 'the7mk2' ), $info_taxonomy->label ),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

function carwagen_marca_coche_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'coche'; // change to your post type
	$taxonomy  = 'marca-coche-ocasion'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

//Los hooks si estamos en el admin 
if ( is_admin() && 'edit.php' == $pagenow && 'coche' == $_GET['post_type'] ) {
  add_filter( 'manage_edit-coche_columns', 'carwagen_coche_set_custom_edit_columns' ); //Metemos columnas
  add_action( 'manage_coche_posts_custom_column' , 'carwagen_coche_custom_column', 'category' ); //Metemos columnas
  add_filter( 'manage_edit-coche_sortable_columns','carwagen_coche_order_column_register_sortable' ); //Hacemos que las columnas sean ordenables
  add_action( 'parse_query', 'carwagen_coche_custom_column_query' ); //Hacemos que las columnas sean ordenables
  add_action( 'restrict_manage_posts', 'carwagen_tipo_coche_post_type_by_taxonomy' ); //Añadimos filtro tipo
  add_filter( 'parse_query', 'carwagen_tipo_coche_id_to_term_in_query' ); //Añadimos filtro tipo
  add_action( 'restrict_manage_posts', 'carwagen_marca_coche_post_type_by_taxonomy' ); //Añadimos filtro marca
  add_filter( 'parse_query', 'carwagen_marca_coche_id_to_term_in_query' ); //Añadimos filtro marca
  add_filter( 'months_dropdown_results', '__return_empty_array' ); //Quitamos el filtro de fechas en el admin
}

//Campos --------------------------------------------------
function  carwagen_coche_add_data() {
  add_meta_box(
      'coche_data', // $id
      __('Datos del coche', 'the7mk2'), // $title 
      'carwagen_coche_show_data', // $callback
      'coche', // $page
      'normal', // $context
      'high'); // $priority
}
add_action('add_meta_boxes', 'carwagen_coche_add_data');

function carwagen_coche_show_data() { //Show box
  global $post, $coche_fields; ?>
  <div class="coche-boxes">
    <?php foreach ($coche_fields as $label => $field) {
      $current_data = get_post_meta( $post->ID, 'coche_'.$label, true ); ?>
      <div class="coche-box coche-box-<?php echo $label; ?>">
        <b><?php echo $field['name']; ?></b><br/>
        <?php if ($field['type'] == 'text') { ?>
          <input type="text" style="width: 100%;" name="coche[<?php echo $label; ?>]" value="<?php echo $current_data; ?>" />
        <?php } else if ($field['type'] == 'number') { ?>
          <input type="number" name="coche[<?php echo $label; ?>]" value="<?php echo $current_data; ?>" />
        <?php } else if ($field['type'] == 'select') { ?>
          <select name="coche[<?php echo $label; ?>]">
          <?php foreach($field['values'] as $key => $value) { ?>
            <option value="<?php echo $key; ?>"<?php if ($key == $current_data) echo " selected='selected'"; ?>><?php echo $value; ?></option>
          <?php } ?>
          </select>
        <?php }  ?>
        <?php if (isset($field['text'])) echo $field['text']; ?>
      </div><?php
    } ?>
  </div>
  <style>
    .coche-boxes {
      display: flex;
      flex-wrap: wrap;
    }
    .coche-box {
      width: calc(100% - 10px);
      padding: 0px 10px 10px 0px;
    }

    @media screen and (min-width: 600px) {
      .coche-box {
        width: calc(50% - 10px);
      }
    }
  </style>
  <?php
}

function carwagen_coche_save_data( $post_id ) { //Save changes
  if (isset($_POST['coche'])) {
    foreach($_POST['coche'] as $label => $value) update_post_meta( $post_id, 'coche_'.$label, chop($value));
  }
}
add_action( 'save_post', 'carwagen_coche_save_data' );

//Galería  -------------------------------------
function  carwagen_coche_galeria_add_data() {
  add_meta_box(
      'coche_gallery', // $id
      __('Galeria', 'the7mk2'), // $title 
      'carwagen_coche_galeria_show_data', // $callback
      'coche', // $page
      'normal', // $context
      'high'); // $priority
}
add_action('add_meta_boxes', 'carwagen_coche_galeria_add_data');

function carwagen_coche_galeria_show_data() { //Show box
  global $post;?>
  <div class="coche-img-boxes">
    <?php $galeria = get_post_meta($post->ID, "coche_galeria", true);
    for($i = 0; $i <= 50; $i++) {
      echo carwagen_coche_galeria_image_uploader_field( 'coche_img_'.$i, $galeria[$i], (isset($galeria[$i]) || $i <= 2 ? false : true) );
    } ?>
    <div class="coche-img-box coche-img-box-show-more"><span>+</span></div>
  </div>
  <div>
    <b><?php _e('Vídeo', 'the7mk2'); ?></b><br>
    <input type="text" style="width: 100%;" name="coche[video]" value="<?php echo get_post_meta( $post->ID, 'coche_video', true ); ?>" />
  </div>
  <style>
    .coche-img-boxes {
      display: flex;
      flex-wrap: wrap;
    }
    .coche-img-box {
      width: calc(100% - 22px);
      margin: 10px;
      padding: 10px 0px;
      min-height: 180px;
      text-align: center;
      border: 1px solid #cecece;
      border-radius: 5px;
    }

    .coche-img-box-show-more {
      font-size: 64px;
      color: #cecece;
      display: flex;
      flex-direction: column;
      justify-content: center;
      cursor: pointer;
    }

    .coche-img-box-show-more:hover {
      color: #000;
      border-color: #000;
    }

    @media screen and (min-width: 600px) {
      .coche-img-box {
        width: calc(33% - 22px);
      }
    }

    @media screen and (min-width: 600px) {
      .coche-img-box {
        width: calc(25% - 22px);
      }
    }
  </style>
  <script>
    jQuery(function($){
      /*
      * Select/Upload image(s) event
      */
      $('body').on('click', '.coche_upload_image_button', function(e){
        e.preventDefault();
    
        var button = $(this),custom_uploader = wp.media({
          title: '<?php _e( 'Insertar imagen', 'the7mk2' ); ?>',
          library : {
            // uncomment the next line if you want to attach image to the current post
            // uploadedTo : wp.media.view.settings.post.id, 
            type : 'image'
          },
          button: {
            text: '<?php _e( 'Usar imagen', 'the7mk2' ); ?>' // button label text
          },
          multiple: false // for multiple image selection set to true
        }).on('select', function() { // it also has "open" and "close" events 
          var attachment = custom_uploader.state().get('selection').first().toJSON();
          $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.sizes.thumbnail.url + '" style="max-width:95%;display:inline-block;" /><br/>').next().val(attachment.id).next().show();
        })
        .open();
      });
    
      /*
      * Remove image event
      */
      $('body').on('click', '.coche_remove_image_button', function(){
        $(this).hide().prev().val('').prev().addClass('button').html('<?php _e( 'Subir imagen', 'the7mk2' ); ?>');
        return false;
      });

      $('body').on('click', '.coche-img-box-show-more', function(){
        $('.coche-img-box.hidden').first().removeClass("hidden");
        return false;
      });
    });
  </script>
  <?php
}

function carwagen_coche_galeria_save_data ( $post_id ) { //Save changes
  if (isset($_POST)) {
    $gallery = array();
    foreach($_POST as $label => $value) {
      if(strpos($label, "coche_img_") === 0 && $value != "") {
        if(wp_get_attachment_image_src( $value, 'large')) $gallery[] = $value;
      }
    }
    $gallery = array_values(array_filter($gallery));
    //print_pre($gallery); die;
    if (count($gallery) > 0)update_post_meta( $post_id, "coche_galeria", $gallery);
  }
  //die;
}

add_action( 'save_post', 'carwagen_coche_galeria_save_data' );

//Extras  -------------------------------------
function  carwagen_coche_extras_add_data() {
  add_meta_box(
      'coche_extras', // $id
      __('Extras', 'the7mk2'), // $title 
      'carwagen_coche_extras_show_data', // $callback
      'coche', // $page
      'normal', // $context
      'high'); // $priority
}
add_action('add_meta_boxes', 'carwagen_coche_extras_add_data');

function carwagen_coche_extras_show_data() { //Show box 
  global $post;
  $extras = array_values(array_filter(get_post_meta( $post->ID, 'coche_extras', true )));
  for($i = 0; $i < 10; $i++) { ?>
    <input type="text" maxlength="35" name="coche_extras[]" value="<?php echo $extras[$i]; ?>" style="width: 100%; margin-top: 5px;" />
  <?php } 
}

function carwagen_coche_extras_save_data ( $post_id ) { //Save changes
  if (isset($_POST['coche_extras'])) update_post_meta( $post_id, 'coche_extras', array_values(array_filter($_POST['coche_extras'])));
}

add_action( 'save_post', 'carwagen_coche_extras_save_data' );

//Estatus  -------------------------------------
function  carwagen_coche_estatus_add_data() {
  add_meta_box(
      'coche_estatus', // $id
      __('Estatus', 'the7mk2'), // $title 
      'carwagen_coche_estatus_show_data', // $callback
      'coche', // $page
      'normal', // $context
      'high'); // $priority
}
add_action('add_meta_boxes', 'carwagen_coche_estatus_add_data');

function carwagen_coche_estatus_show_data() { //Show box
  global  $post, $coche_estatus_fields; ?>
  <div class="coche-boxes">
    <?php foreach ($coche_estatus_fields as $label => $field) {
      $current_data = get_post_meta( $post->ID, 'coche_'.$label, true ); ?>
      <div class="coche-box coche-box-<?php echo $label; ?>">
        <b><?php echo $field['name']; ?></b><br/>
        <?php if ($field['type'] == 'text') { ?>
          <input type="text" style="width: 100%;" name="coche_estatus[<?php echo $label; ?>]" value="<?php echo $current_data; ?>" />
        <?php } else if ($field['type'] == 'number') { ?>
          <input type="number" name="coche_estatus[<?php echo $label; ?>]" value="<?php echo $current_data; ?>" />
        <?php } else if ($field['type'] == 'select') { ?>
          <select name="coche_estatus[<?php echo $label; ?>]">
          <?php foreach($field['values'] as $key => $value) { ?>
            <option value="<?php echo $key; ?>"<?php if ($key == $current_data) echo " selected='selected'"; ?>><?php echo $value; ?></option>
          <?php } ?>
          </select>
        <?php }  ?>
        <?php if (isset($field['text'])) echo $field['text']; ?>
      </div><?php
    } ?>
  </div><?php
}

function carwagen_coche_estatus_save_data ( $post_id ) { //Save changes
  if (isset($_POST['coche_estatus'])) {
    foreach($_POST['coche_estatus'] as $label => $value) update_post_meta( $post_id, 'coche_'.$label, chop($value));
  }
}

add_action( 'save_post', 'carwagen_coche_estatus_save_data' );

//Códigos cortos --------------------------------------------------
//[cars_search_form]
function carwagen_coche_search_form ($params = array(), $content = null) {
  global $post, $coche_fields;
  $html = "<div class='coche-main-form'>";

  //Generamos el select de tipos
  $values = array();
  $terms = get_terms([
    'taxonomy' => 'tipo-coche-ocasion',
    'hide_empty' => true,
  ]);
  foreach ($terms as $term) {
    $values[$term->slug] =$term->name;
  }
  $selects['type'] = array("name" => __('Tamaño', 'the7mk2'), "values" => $values, "all" =>  __('Todos los tamaños', 'the7mk2')  );

  //Generamos el select de marca
  $values = array();
  $terms = get_terms([
    'taxonomy' => 'marca-coche-ocasion',
    'hide_empty' => true,
  ]);
  foreach ($terms as $term) {
    $values[$term->slug] =$term->name;
  }
  $selects['brand'] = array("name" => __('Marca', 'the7mk2'), "values" => $values, "all" =>  __('Todas las marcas', 'the7mk2') );

  //Generamos el select de Precio
  $values = array(
    "5000" => __('Hasta 5.000€', 'the7mk2'),
    "10000" => __('Hasta 10.000€', 'the7mk2'),
    "15000" => __('Hasta 15.000€', 'the7mk2'),
    "20000" => __('Hasta 20.000€', 'the7mk2'),
    "+20000" => __('Más de 20.000€', 'the7mk2')
  );
  $selects['price'] = array("name" => __('Precio', 'the7mk2'), "values" => $values, "all" =>  __('Todos los precios', 'the7mk2') );

  //Generamos el select de Año
  global $wpdb;
  $values = array();
  $min = $wpdb->get_var('SELECT MIN(meta_value) AS min FROM '.$wpdb->prefix.'postmeta AS pm, ' .$wpdb->prefix.'posts AS po WHERE pm.post_id = po.ID AND po.post_status = "publish" AND po.post_type = "coche" AND pm.meta_key = "coche_year"');
  $max = $wpdb->get_var('SELECT MAX(meta_value) AS min FROM '.$wpdb->prefix.'postmeta AS pm, ' .$wpdb->prefix.'posts AS po WHERE pm.post_id = po.ID AND po.post_status = "publish" AND po.post_type = "coche" AND pm.meta_key = "coche_year"');
  for($i = $max; $i >= $min; $i--) {
    $values[$i] = sprintf(__('Desde %s', 'the7mk2'), carwagen_coche_format_data($i, 'coche_year'));
  }
  $selects['year'] = array("name" => __('Año', 'the7mk2'), "values" => $values, "all" =>  __('Todos los años', 'the7mk2') );

  //Generamos el select de Kilometraje
  $values = array(
    "50000" => __('Menos de 50.000 Kms.', 'the7mk2'),
    "+50000" => __('Más de 50.000 Kms.', 'the7mk2')
  );
  $selects['km'] = array("name" => __('Kilometraje', 'the7mk2'), "values" => $values, "all" =>  __('Todos los kilometrajes', 'the7mk2') );


  $selects['fuel'] =  $coche_fields['fuel'];
  $selects['transmission'] =  $coche_fields['transmission'];
  //$selects['traction'] =  $coche_fields['traction'];

  foreach ($selects as $label => $select) {
    $html .= "<div><select id='coche_".$label."_filter' class='coche_filter' data-filter='".$label."'>";
    $html .= "<option value='' disabled selected hidden>".$select['name']."</option>";
    $html .= "<option value=''>".$select['all']."</option>";
    foreach ($select['values'] as $key => $value ) $html .= "<option value='".$key."'>".$value."</option>";
    $html .= "</select></div>";
  }

  //
  $html .= "<div>";
  $html .= "<select class='coche_order'>";
  $html .= "<option value='date,desc'>".__( 'Más recientes', 'the7mk2' )."</option>";
  $html .= "<option value='price,asc'>".__( 'Precio más bajo', 'the7mk2' )."</option>";
  $html .= "<option value='price,desc'>".__( 'Precio más alto', 'the7mk2' )."</option>";
  $html .= "<option value='year,asc'>".__( 'Año ascendente', 'the7mk2' )."</option>";
  $html .= "<option value='year,desc'>".__( 'Año descendente', 'the7mk2' )."</option>";
  $html .= "<option value='km,asc'>".__( 'Menos kilometraje', 'the7mk2' )."</option>";
  $html .= "<option value='km,desc'>".__( 'Más Kilometraje', 'the7mk2' )."</option>";
  $html .= "</select>";
  $html .= "</div>";
  $html .= "</div>";
  return $html; 
}
add_shortcode('cars_search_form', 'carwagen_coche_search_form');

//[cars_search_mini_form]
function carwagen_coche_search_mini_form ($params = array(), $content = null) {
  global $post, $coche_fields;
  $html = "<div class='coche-main-form coche-main-mini-form'>";

  //Generamos el select de tipos
  $values = array();
  $terms = get_terms([
    'taxonomy' => 'tipo-coche-ocasion',
    'hide_empty' => true,
  ]);
  foreach ($terms as $term) {
    $values[$term->slug] =$term->name;
  }
  $selects['type'] = array("name" => __('Tamaño', 'the7mk2'), "values" => $values, "all" =>  __('Todos los tamaños', 'the7mk2')  );

  //Generamos el select de marca
  $values = array();
  $terms = get_terms([
    'taxonomy' => 'marca-coche-ocasion',
    'hide_empty' => true,
  ]);
  foreach ($terms as $term) {
    $values[$term->slug] =$term->name;
  }
  $selects['brand'] = array("name" => __('Marca', 'the7mk2'), "values" => $values, "all" =>  __('Todas las marcas', 'the7mk2') );

  //Generamos el select de Año
  global $wpdb;
  $values = array();
  $min = $wpdb->get_var('SELECT MIN(meta_value) AS min FROM '.$wpdb->prefix.'postmeta AS pm, ' .$wpdb->prefix.'posts AS po WHERE pm.post_id = po.ID AND po.post_status = "publish" AND po.post_type = "coche" AND pm.meta_key = "coche_year"');
  $max = $wpdb->get_var('SELECT MAX(meta_value) AS min FROM '.$wpdb->prefix.'postmeta AS pm, ' .$wpdb->prefix.'posts AS po WHERE pm.post_id = po.ID AND po.post_status = "publish" AND po.post_type = "coche" AND pm.meta_key = "coche_year"');
  for($i = $max; $i >= $min; $i--) {
    $values[$i] = sprintf(__('Desde %s', 'the7mk2'), carwagen_coche_format_data($i, 'coche_year'));
  }
  $selects['year'] = array("name" => __('Año', 'the7mk2'), "values" => $values, "all" =>  __('Todos los años', 'the7mk2') );

  $selects['fuel'] =  $coche_fields['fuel'];

  foreach ($selects as $label => $select) {
    $html .= "<div><select id='coche_".$label."_filter' class='coche_filter' data-filter='".$label."'>";
    $html .= "<option value='' disabled selected hidden>".$select['name']."</option>";
    $html .= "<option value=''>".$select['all']."</option>";
    foreach ($select['values'] as $key => $value ) $html .= "<option value='".$key."'>".$value."</option>";
    $html .= "</select></div>";
  }

  $html .= "<div><button data-url='".get_the_permalink($params['page-result-id'])."'><i class='Defaults-search'></i> ".__('Buscar', 'the7mk2')."</button></div>";

  $html .= "</div>";
  return $html; 
}
add_shortcode('cars_search_mini_form', 'carwagen_coche_search_mini_form');

//[cars_search_results]
function carwagen_coche_search_results ($params = array(), $content = null) {
  global $post;

  wp_enqueue_script( 'coche-js' );
  /* wp_enqueue_style( 'coche-swiper-style' );
  wp_enqueue_script( 'coche-swiper-js' ); */
  wp_enqueue_script( 'coche-masonry-js' );
  $html = "<div class='coche-main-container grid'>";


  if ($params['filter'] == 'featured') $args = array(
    'post_type' => 'coche',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
    'meta_query'	=> array(
      array(
        'key'	 	=> 'coche_featured',
        'value'	  	=> 1,
      ),
      array(
        'key'	 	=> 'coche_incoming',
        'value'	  	=> 1,
        'compare'   => '!=',
      )
    )
  );
  else if ($params['filter'] == 'incoming') $args = array(
    'post_type' => 'coche',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
    'meta_query'	=> array(
      array(
        'key'	 	=> 'coche_incoming',
        'value'	  	=> 1,
      )
    )
  );
  else $args = array(
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

  $the_query = new WP_Query( $args);
  if ($the_query->have_posts() ) { $counter = 1;
    while ( $the_query->have_posts() ) { $the_query->the_post();
      $brands = get_the_terms( $post->ID, 'marca-coche-ocasion' );
      $brand_name = $brands[0]->name;
      $brand_slug = $brands[0]->slug;
      $types = get_the_terms( $post->ID, 'tipo-coche-ocasion' );
      $type_name = $types[0]->name;
      $type_slug = $types[0]->slug;
      if ($params['filter'] != 'incoming') {
        $gallery = get_post_meta( $post->ID, 'coche_galeria', true );
        if ($params['filter'] == 'featured') $size = 'large';
        else $size = "medium";
        if(count($gallery) > 0) $main_image = wp_get_attachment_image_src( $gallery[0], $size);
        parse_str( parse_url( get_post_meta( $post->ID, 'coche_video', true ), PHP_URL_QUERY ), $video );
      }
      $year = get_post_meta( $post->ID, 'coche_year', true );
      $fyear = carwagen_coche_format_data ($year, 'coche_year');
      $name = get_post_meta( $post->ID, 'coche_name', true );
      $model = get_post_meta( $post->ID, 'coche_model', true );
      $fuel = get_post_meta( $post->ID, 'coche_fuel', true );
      $traction = get_post_meta( $post->ID, 'coche_traction', true );
      $transmission = get_post_meta( $post->ID, 'coche_transmission', true );
      $price = get_post_meta( $post->ID, 'coche_price', true ); 
      $fprice = carwagen_coche_format_data ($price, 'coche_price');
      $fprice_financed = carwagen_coche_format_data (get_post_meta( $post->ID, 'coche_price_financed', true ), 'coche_price_financed');
      $km = get_post_meta( $post->ID, 'coche_km', true );
      $fkm = carwagen_coche_format_data ($km, 'coche_km');
      $cv = carwagen_coche_format_data (get_post_meta( $post->ID, 'coche_cv', true ), 'coche_cv');
      if ($params['filter'] == 'incoming') {
        $tagtext = __("¡Nuevo!", "");
        $tagcolor = "red"; 
      } else {
        $tagtext = get_post_meta( $post->ID, 'coche_tagtext', true );
        if ($tagtext != '') $tagcolor = get_post_meta( $post->ID, 'coche_tagcolor', true ); 
      }
      $html .= "<div class='mini-coche-box grid-item' 
        data-id='".$post->ID."'
        data-type='".$type_slug."'
        data-brand='".$brand_slug."'
        data-fuel='".$fuel."'
        data-year='".$year."'
        data-km='".$km."'
        data-price='".$price."'
        data-transmission='".$transmission."'
        data-traction='".$traction."'
        data-date='".get_the_date("YmdHis")."'>";
      if ($params['filter'] != 'incoming') $html .= "<a href='".get_the_permalink()."'>";
      if ($params['filter'] == 'incoming') {
        $html .= "<img src='".get_stylesheet_directory_uri()."/assets/img/incoming.jpg' alt='".$year." ".$brand." ".$name." ".$model."'/>";
      } else {
        if (count($gallery) > 1 || (isset($video['v']) && count($gallery) == 1)) {
          $html .= '<div id="swiper-container-'.$post->ID.'" class="swiper-container">
              <div class="swiper-wrapper">';
          if(isset($video['v'])) $html .= "<div class='swiper-slide video'><iframe src='https://www.youtube.com/embed/".$video['v']."?showinfo=0' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>";
          foreach ($gallery as $image) {
            $image = wp_get_attachment_image_src( $image, 'medium');
            $html .= "<div class='swiper-slide'><img src='".$image[0]."' alt='".$year." ".$brand." ".$name." ".$model."'/></div>";
          } 
          $html .= '</div>
            <div class="swiper-button-prev" id="swiper-button-prev-'.$post->ID.'"></div>
            <div class="swiper-button-next" id="swiper-button-next-'.$post->ID.'"></div>
          </div>';
        } else if (count($gallery) == 1) {
          $html .= "<img src='".$main_image[0]."' alt='".$year." ".$brand." ".$name." ".$model."'/>";
        }
      }
      $html .= "<p class='coche-box-price'><span>".__("Al contado", 'the7mk2')."</span>".$fprice."</p>";
      $html .= "<p class='coche-box-price-financed'><span>".__("Financiado", 'the7mk2')."</span>".$fprice_financed."</p>";
      if ($tagtext != '') $html .= "<p class='coche-box-tag ".$tagcolor."'>".$tagtext."</p>";
      $html .= "<h2> ".strtoupper($brand_name)." ".$name." <span>".$model."</span> <span>(".$fyear.")</span></h2>";
      $html .= '<div class="coche-box-data">';
      $html .= "<p class='coche-box-km'><i class='demo-icon icon-kms' style='font-size: 11px; margin-right: 7px;'></i> ".$fkm."</p>";
      $html .= "<p class='coche-box-fuel'><i class='demo-icon icon-fuel'></i> ".carwagen_coche_transform_label_to_text($fuel)."</p>";
      $html .= "<p class='coche-box-cv'><i class='demo-icon icon-motor-cv'></i> ".$cv."</p>";
      $html .= "<p class='coche-box-transmission'><i class='demo-icon icon-cambio'></i> ".carwagen_coche_transform_label_to_text($transmission)."</p>";
      //$html .= "<p class='coche-box-traction'>".$traction."</p>";
      $html .= "</div>";
      if ($params['filter'] != 'incoming') $html .= "</a>";
      $html .= "</div>";
      $counter++;
      carwagen_coche_microformat ($post->ID);
    }
  } wp_reset_query();

  $html .= "</div>";

  add_action('wp_footer', function () use ( $params ) { carwagen_coche_footer($params); }, 100000);

  

  return $html; 
}
add_shortcode('cars_search_results', 'carwagen_coche_search_results');

function carwagen_coche_footer($params) {
  if ($params['filter'] == 'incoming') return;
  else if ($params['filter'] == 'featured') $args = array(
    'post_type' => 'coche',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
    'meta_query'	=> array(
      array(
        'key'	 	=> 'coche_featured',
        'value'	  	=> 1,
      ),
      array(
        'key'	 	=> 'coche_incoming',
        'value'	  	=> 1,
        'compare'   => '!=',
      )
    )
  );
  else $args = array(
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

  $the_query = new WP_Query( $args);
  if ($the_query->have_posts() ) { $counter = 1;  ?>
    <script>
    <?php while ( $the_query->have_posts() ) { $the_query->the_post();
      $gallery = get_post_meta( get_the_id(), 'coche_galeria', true );
      parse_str( parse_url( get_post_meta( get_the_id(), 'coche_video', true ), PHP_URL_QUERY ), $video );
      if(count($gallery) > 1 || (isset($video['v']) && count($gallery) == 1)) { ?>
            jQuery(window).load(function(){
              var mySwiper<?php echo get_the_id(); ?> = new Swiper("#swiper-container-<?php echo get_the_id(); ?>", {
              speed: 400,
              spaceBetween: 0,
              slidesPerView: 1,
              navigation: {
                nextEl: '#swiper-button-next-<?php echo get_the_id(); ?>',
                prevEl: '#swiper-button-prev-<?php echo get_the_id(); ?>',
              }
            });
          });<?php
        }
      } ?>
    </script>
    <?php
  } wp_reset_query();
}



function carwagen_coche_shortcodes_enqueue_scripts() {
  wp_register_style( 'coche-style', get_stylesheet_directory_uri()."/assets/css/coche.css?hash=".date("Ymdhis"), array(), '1.0.0', 'all' );
  wp_enqueue_style( 'coche-style' );
  wp_register_style( 'coche-swiper-style', get_stylesheet_directory_uri()."/assets/css/swiper.min.css", array(), '1.0.0', 'all' );
  wp_enqueue_style( 'coche-swiper-style' );
  wp_register_script( 'coche-swiper-js', get_stylesheet_directory_uri()."/assets/js/swiper.min.js", '', '0', true );
  wp_enqueue_script( 'coche-swiper-js' );
  wp_register_script( 'coche-masonry-js', get_stylesheet_directory_uri()."/assets/js/isotope.pkgd.min.js", '', '0', true );
  wp_register_script( 'coche-js', get_stylesheet_directory_uri()."/assets/js/coche.js?hash=".date("Ymdhis"), array('jquery'), '1.0.0', false );
}

add_action( 'wp_enqueue_scripts', 'carwagen_coche_shortcodes_enqueue_scripts' );

//[cars_brand_selector title=""]
function carwagen_coche_brand_selector ($params = array(), $content = null) {
  /*wp_enqueue_style( 'coche-swiper-style' );
  wp_enqueue_script( 'coche-swiper-js' );*/

  //Generamos el select de marca
  $slides = array();
  $terms = get_terms([
    'taxonomy' => 'marca-coche-ocasion',
    'hide_empty' => true,
  ]);
  foreach ($terms as $term) {
    $term_meta = get_option( "taxonomy_term_".$term->term_id );
    $slides[] = array ("name" => $term->name, "slug" => $term->slug, "image" => $term_meta['image'], "order" => $term_meta['order']);
  }
  usort($slides, 'usort_cmp');
  $results_page_url = get_the_permalink($params['page-result-id']);

  $html = '<h4>'.$params['title'].'</h4><div id="swiper-brand-selector" class="swiper-container">
            <div class="swiper-wrapper">';
  foreach ($slides as $slide) {
    $html .= "<div class='swiper-slide'><a href='".$results_page_url."#filters|brand.".$slide['slug']."'><img src='".$slide['image']."' alt='".$slide['name']."'/><br/>".$slide['name']."</a></div>";
  } 
  $html .= '</div>
    <div class="swiper-button-prev" id="swiper-brand-selector-button-prev"></div>
    <div class="swiper-button-next" id="swiper-brand-selector-button-next"></div>
  </div>';

  add_action('wp_footer', 'carwagen_coche_brand_selector_footer', 100000);
  return $html; 
}
add_shortcode('cars_brand_selector', 'carwagen_coche_brand_selector');

function carwagen_coche_brand_selector_footer() { ?>
  <script>
    jQuery(window).load(function(){
      var mySwiper = new Swiper("#swiper-brand-selector", {
        speed: 400,
        slidesPerView: 2,
        spaceBetween: 10,
        breakpoints: {
          560: {
            slidesPerView: 3,
            spaceBetween: 10
          },
          720: {
            slidesPerView: 6,
            spaceBetween: 10
          },
          1024: {
            slidesPerView: 8,
            spaceBetween: 20
          }
        },
        navigation: {
          nextEl: '#swiper-brand-selector-button-next',
          prevEl: '#swiper-brand-selector-button-prev',
        },
    });
  });</script><?php
}


function carwagen_coche_web_design_presscore_pages_with_basic_meta_boxes( $post_type_array ) {
  $post_type_array = array( 'page', 'post', 'coche' );
  return $post_type_array;
}
add_filter( 'presscore_pages_with_basic_meta_boxes', 'carwagen_coche_web_design_presscore_pages_with_basic_meta_boxes' );


//Libreias varias ------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------
function usort_cmp($a, $b) {
    if ($a['order'] == $b['order']) {
        return 0;
    }
    return ($a['order'] < $b['order']) ? -1 : 1;
}

function carwagen_coche_format_data ($value, $label) {
  if ($label == 'coche_price' || $label == 'coche_price_financed') $value = sprintf(__( '%s €', 'the7mk2' ), number_format ($value, 0, ',', '.'));
  else if ($label == 'coche_km') $value = sprintf(__( '%s Kms.', 'the7mk2' ), number_format ($value, 0, ',', '.'));
  else if ($label == 'coche_cv') $value = sprintf(__( '%s CV', 'the7mk2' ), number_format ($value, 0, ',', '.'));
  else if ($label == 'coche_warranty') $value = sprintf(__( '%s meses', 'the7mk2' ), number_format ($value, 0, ',', '.'));
  else if ($label == 'coche_seats') $value = sprintf(__( '%s asientos', 'the7mk2' ), number_format ($value, 0, ',', '.'));
  else if ($label == 'coche_doors') $value = sprintf(__( '%s puertas', 'the7mk2' ), number_format ($value, 0, ',', '.'));
  else if ($label == 'coche_year') $value = number_format ($value, 0, ',', '.');
  else if ($label == 'coche_fuel') $value = carwagen_coche_transform_label_to_text ($value);
  else if ($label == 'coche_transmission') $value = carwagen_coche_transform_label_to_text ($value);
  return $value;
}


function carwagen_coche_transform_label_to_text ($value) {
  $array = array (
    "automatico" => __( 'Automático', 'the7mk2' ),
    "manual" => __( 'Manual', 'the7mk2' ),
    "gasolina" => __( 'Gasolina', 'the7mk2' ),
    "diesel" => __( 'Diésel', 'the7mk2' ),
    "delantera" => __( 'Delantera', 'the7mk2' ),
    "trasera" => __( 'Trasera', 'the7mk2' ),
    "4x4" => __( '4x4', 'the7mk2' ),
  );
  return $array[$value];
}

function print_pre($array) {
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

function carwagen_coche_galeria_image_uploader_field( $name, $value = '', $hidden = false ) {
	$image = ' button">'.__( 'Subir imagen', 'the7mk2' );
	$image_size = 'thumbnail'; // it would be better to use thumbnail size here (150x150 or so)
	$display = 'none'; // display state ot the "Remove image" button
 
	if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {
		$image = '"><img src="' . $image_attributes[0] . '" style="max-width:100%;display:inline-block;" /><br/>';
		$display = 'inline-block';
 	} 
 
	return '<div class="coche-img-box'.($hidden  ? " hidden" : "").'">
		<a href="#" class="coche_upload_image_button' . $image . '</a>
		<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . esc_attr( $value ) . '" />
		<a href="#" class="coche_remove_image_button button-secondary" style="display:inline-block;display:' . $display . '">'.__( 'Borrar imagen', 'the7mk2' ).'</a>
	</div>';
}


function carwagen_coche_microformat ($id) {
  if(get_post_meta( $id, 'coche_incoming', true ) == 1) return; //No sacamos microformato de los prçoximos coches
  $brands = get_the_terms( $id, 'marca-coche-ocasion' );
  $brand_name = $brands[0]->name;
  $types = get_the_terms( $id, 'tipo-coche-ocasion' );
  $type = $types[0]->name;
  $gallery = get_post_meta( $id, 'coche_galeria', true );
  if(count($gallery) > 0) $main_image = wp_get_attachment_image_src( $gallery[0], $size);
  $year = get_post_meta( $id, 'coche_year', true );
  $fyear = carwagen_coche_format_data ($year, 'coche_year');
  $name = get_post_meta( $id, 'coche_name', true );
  $model = get_post_meta( $id, 'coche_model', true );
  $fuel = get_post_meta( $id, 'coche_fuel', true );
  $ffuel = carwagen_coche_transform_label_to_text ($fuel);
  $traction = get_post_meta( $id, 'coche_traction', true );
  $ftraction = carwagen_coche_transform_label_to_text ($traction);
  $transmission = get_post_meta( $id, 'coche_transmission', true );
  $ftransmission = carwagen_coche_transform_label_to_text ($transmission);
  $seats = get_post_meta( $id, 'coche_seats', true );
  $doors = get_post_meta( $id, 'coche_doors', true );
  $price = get_post_meta( $id, 'coche_price', true );
  $fprice = carwagen_coche_format_data ($price, 'coche_price');
  $price_financed = get_post_meta( $id, 'coche_price_financed', true );
  $fprice_financed = carwagen_coche_format_data ($price_financed, 'coche_price_financed');
  $km = get_post_meta( $id, 'coche_km', true );
  $fkm = carwagen_coche_format_data ($km, 'coche_km');
  $cv = get_post_meta( $id, 'coche_cv', true );
  $fcv = carwagen_coche_format_data ($cv, 'coche_cv');
  $description =  sprintf( __("%s %s %s %s (%s) del año %s por %s (%s financiado).", 'the7mk2'), $brand_name, $name, $model, $color, $type, $fyear, $fprice, $fprice_financed);
  $description .= sprintf( __(" %s, %s, tracción %s, cambio %s y %s.", 'the7mk2'), $fkm, $fcv, strtolower($ftraction), strtolower($ftransmission), strtolower($ffuel) );
  $description .= sprintf( __(" Tiene %s puertas y capacidad para %s personas.", 'the7mk2'), $doors, $seats); ?>
  <script type='application/ld+json'>
    {
      "@context":"https://schema.org",
      "@type": "Vehicle",
      "name": "<?php the_title(); ?>",
      "description": "<?php echo $description; ?>",
      "brand": "<?php echo $brand; ?>",
      "model": "<?php echo $name." ".$model; ?>",
      "bodyType": "<?php echo $type; ?>",
      "mileageFromOdometer": {
        "@type": "QuantitativeValue",
        "value": "<?php echo $km; ?>",
        "unitCode": "KMT"
      },
      "url": "<?php echo get_the_permalink($id); ?>",
      "image": "<?php echo $main_image[0]; ?>",
      "productionDate": "<?php echo $year; ?>",
      "fuelType": "<?php echo $ffuel; ?>",
      "numberOfDoors": "<?php echo $doors; ?>",
      "vehicleSeatingCapacity": "<?php echo $seats; ?>",
      "color": "<?php echo $color; ?>",
      "vehicleTransmission": "<?php echo $ftransmission; ?>",
      "offers": {
        "@type": "Offer",
        "availability": "http://schema.org/InStock",
        "price": "<?php echo $price; ?>",
        "priceCurrency": "EUR"
      }
    }  
  </script><?php
}

//Metemos una descripción automatica a cada coche en YOAST SEO
add_action( 'wpseo_register_extra_replacements', function() {
  wpseo_register_var_replacement( '%%cocheMetaDescription%%', 'carwagen_coche_seo_callback_function', 'advanced', 'Descripción básica del coche' ); 
});

function carwagen_coche_seo_callback_function() { 
  global $post;    
  $brands = get_the_terms( $post->ID, 'marca-coche-ocasion' );
  $brand_name = $brands[0]->name;
  $types = get_the_terms( $post->ID, 'tipo-coche-ocasion' );
  $type = $types[0]->name;
  $year = get_post_meta( $post->ID, 'coche_year', true );
  $fyear = carwagen_coche_format_data ($year, 'coche_year');
  $name = get_post_meta( $post->ID, 'coche_name', true );
  $model = get_post_meta( $post->ID, 'coche_model', true );
  $fuel = get_post_meta( $post->ID, 'coche_fuel', true );
  $ffuel = carwagen_coche_transform_label_to_text ($fuel);
  $traction = get_post_meta( $post->ID, 'coche_traction', true );
  $ftraction = carwagen_coche_transform_label_to_text ($traction);
  $transmission = get_post_meta( $post->ID, 'coche_transmission', true );
  $ftransmission = carwagen_coche_transform_label_to_text ($transmission);
  $seats = get_post_meta( $post->ID, 'coche_seats', true );
  $doors = get_post_meta( $post->ID, 'coche_doors', true );
  $price = get_post_meta( $post->ID, 'coche_price', true );
  $fprice = carwagen_coche_format_data ($price, 'coche_price');
  $price_financed = get_post_meta( $post->ID, 'coche_price_financed', true );
  $fprice_financed = carwagen_coche_format_data ($price_financed, 'coche_price_financed');
  $km = get_post_meta( $post->ID, 'coche_km', true );
  $fkm = carwagen_coche_format_data ($km, 'coche_km');
  $cv = get_post_meta( $post->ID, 'coche_cv', true );
  $fcv = carwagen_coche_format_data ($cv, 'coche_cv');
  $description =  sprintf( __("%s %s %s %s (%s) del año %s por %s (%s financiado).", 'the7mk2'), $brand_name, $name, $model, $color, $type, $fyear, $fprice, $fprice_financed);
  $description .= sprintf( __(" %s, %s, tracción %s, cambio %s y %s.", 'the7mk2'), $fkm, $fcv, strtolower($ftraction), strtolower($ftransmission), strtolower($ffuel) );
  $description .= sprintf( __(" Tiene %s puertas y capacidad para %s personas.", 'the7mk2'), $doors, $seats);
  return $description;
}

?>
