<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'nigiri_elated_child_theme_enqueue_scripts' ) ) {
	function nigiri_elated_child_theme_enqueue_scripts() {
		$parent_style = 'nigiri-elated-default-style';
		
		wp_enqueue_style( 'nigiri-elated-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), '1.4.6' );
		//wp_enqueue_script( 'nigiri-elated-child-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), '1.0.0', true );
	}
	
	add_action( 'wp_enqueue_scripts', 'nigiri_elated_child_theme_enqueue_scripts' );
}


// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Aggiungi >', 'woocommerce' );
}


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Pagina menu',
		'menu_title'	=> 'Pagina menu',
		'menu_slug' 	=> 'theme-menu-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// function that runs when shortcode is called
function menu_category_izumilano() { 
 
	//Difinizione della contenitore
	$menu = "";


	//Avvio loop contenitore categorie
	if( have_rows('contenitore_categoria_menu', 'option') ):

		$menu .= "
		<div class='content-card-menu-izumilano-preload open'>
				";
		while( have_rows('contenitore_categoria_menu', 'option') ) : the_row();

			//titolo_categoria
			$titolo_categoria = get_sub_field('titolo_categoria');

			//immagine_categoria
			$immagine_categoria = get_sub_field('immagine_categoria');

			if($immagine_categoria){
				$immagine_categoria = $immagine_categoria['sizes']['medium'];
			}
			//$slugmenu = str_replace(" ", "", $titolo_categoria);
			$slugmenu = get_row_index();
			
			//Aggiuta delle card slide
			$menu .= "
				<div class='card-category-menu'  style='background-image: url($immagine_categoria);' data-menu='menu-$slugmenu'  data-number='$slugmenu'>
					<h4>$titolo_categoria</h4>
				</div>
			";

		endwhile;
		$menu .= "
		</div>
	
		";
	endif;
	
	
	//Avvio loop contenitore categorie
	if( have_rows('contenitore_categoria_menu', 'option') ):

		$menu .= "
		<div class='content-header-menu-izumilano'>
			<div class='content-slide-category-izumilano'>
		";
		while( have_rows('contenitore_categoria_menu', 'option') ) : the_row();

			//titolo_categoria
			$titolo_categoria = get_sub_field('titolo_categoria');

			//immagine_categoria
			$immagine_categoria = get_sub_field('immagine_categoria');

			if($immagine_categoria){
				$immagine_categoria = $immagine_categoria['sizes']['medium'];
			}
			//$slugmenu = str_replace(" ", "", $titolo_categoria);
			$slugmenu = get_row_index();
			
			//Aggiuta delle card slide
			$menu .= "
				<div class='item-category-menu'>
					<div style='background-image: url($immagine_categoria);' data-number='$slugmenu' data-menu='menu-$slugmenu'>
					<h4>$titolo_categoria</h4>
					</div>
				</div>
			";

		endwhile;
		$menu .= "
			</div>
			<button class='button-slide-category-menu prev'><i class='fas fa-caret-left'></i></button>
			<button class='button-slide-category-menu next'><i class='fas fa-caret-right'></i></button>
			
			<button class='button-slide-category-menu prev mobile-action-btn-izu' data-number=''><i class='fas fa-caret-left'></i></button>
			<button class='button-slide-category-menu next mobile-action-btn-izu' data-number=''><i class='fas fa-caret-right'></i></button>
		</div>
		";
	endif;


	//Avvio loop menu
	$total_lista_menu = count(get_field('contenitore_categoria_menu', 'option'));
	if( have_rows('contenitore_categoria_menu', 'option') ):
		$count_menu = 0;
		$menu .= "
			<div class='content-menu-izumilano'>
			<input type='hidden' name='curret_menuizu_card' value=''/>
			<input type='hidden' name='total_curret_menuizu_card' value='$total_lista_menu'/>
			<span class='close-menu-izu'><i class='fas fa-caret-left'></i> Ritorna alle categorie</span>
		";
	
		while( have_rows('contenitore_categoria_menu', 'option') ) : the_row();
			$count_menu++;
			//titolo_categoria
			$titolo_categoria = get_sub_field('titolo_categoria');
	
			//descrizione_categoria
			$descrizione_categoria = get_sub_field('descrizione_categoria');
	
			//sottotitolo_categoria
			$sottotitolo_categoria = get_sub_field('sottotitolo_categoria');

			//immagine_categoria
			$immagine_categoria = get_sub_field('immagine_categoria');
	
			//tipologia_di_menu -> Lista menu - - PDF menu
			$tipologia_di_menu = get_sub_field('tipologia_di_menu');
	
	
			//pdf_menu
			$pdf_menu = get_sub_field('pdf_menu');
	
			////nome_pdf
			$nome_pdf = $pdf_menu['nome_pdf'];
			////file
			$url_pdf = $pdf_menu['file']['url'];
			
			

			if($immagine_categoria){
				$immagine_categoria = $immagine_categoria['sizes']['large'];
			}

			//$slugmenu = str_replace(" ", "", $titolo_categoria);
			$slugmenu = get_row_index();

			if($count_menu == 1):
				$menu .= "<div class='menu-category-izumilano' id='menu-$slugmenu'>";
			else: 
				$menu .= "<div class='menu-category-izumilano' id='menu-$slugmenu'>";
			endif;
	
			if($sottotitolo_categoria):
				$subtitlecategoryizu = "<span class='subtitlte-category-izumilano'>$sottotitolo_categoria</span>";
			endif;

			$menu .= "
			
				
				<div class='img-category-izumilano' style='background-image: url($immagine_categoria);'>
					<h3 class='titlte-category-izumilano'>$titolo_categoria</h3>
					$subtitlecategoryizu
				</div>
				
				";

			//lista_menu
			if($tipologia_di_menu == 'Lista menu'):
	
				if( have_rows('lista_menu') ):

					while( have_rows('lista_menu') ) : the_row();


						//titolo_piatto
						$titolo_piatto = get_sub_field('titolo_piatto');

						//descrizione_piatto
						$descrizione_piatto = get_sub_field('descrizione_piatto');

						//prezzo_piatto
						$prezzo_piatto = get_sub_field('prezzo_piatto');


						$menu .= "
						<div class='element-menu-izumilano'>
								<ul>
									<li>
										<h4>* $titolo_piatto</h4>
									</li>
									<li>
										$descrizione_piatto
									</li>
								</ul>
								<span class='price'>$prezzo_piatto</span>
							</div>
							";


					endwhile;

				endif;
			elseif($tipologia_di_menu == 'PDF menu'):
	
				$menu .= "<div class='content-menu-pdf-izumilano'>
					<a clas='menu-pdf-izumilano' href='$url_pdf'>
						<i class='fas fa-cloud-download-alt'></i>
						<span>$nome_pdf</span>
					</a>
				</div>";
	
				
			endif;
			

			$menu .= "
			</div>
				";

		endwhile;

			$menu .= "
			</div>";
		
	endif;
	 
	// Output needs to be return
	return $menu;
	} 
	// register shortcode
	add_shortcode('menu_izumilano', 'menu_category_izumilano'); 
	


