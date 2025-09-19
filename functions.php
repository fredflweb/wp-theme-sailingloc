<?php
/**
 * SailingLoc – fonctions du thème
 *
 * Inspirations : Twenty Twenty-Five
 * - Enregistre des styles personnalisés pour certains blocs.
 * - Enfile des CSS ciblées par bloc (chargées uniquement si le bloc est présent).
 * - Déclare des catégories de patterns.
 * - Active les supports utiles (WooCommerce, block styles, title-tag...).
 * - Ajoute un petit correctif YITH (empêcher une redirection admin gênante).
 *
 * @package SailingLoc
 * @since 1.0.0
 */

 /* -----------SOMMAIRE---------------------------------------------------
 # certaines fonctionnalités avancées sont gérées dans des mu-plugins    #
 #              placés dans /wp-content/mu-plugins/                      #

 * 1) Supports de thème & configuration globale ........................page 33
 * 2) Enregistrement de styles personnalisés pour certains blocs........page 67
 * 3) Feuilles CSS par bloc – chargées à la demande si bloc utilisé.....page 111
 * 4) Enregistrement de la catégorie de patterns "sailingloc"...........page 134
 * 5) Correctif YITH – bloque une redirection admin intrusive...........page 160
 * 6) CSS/JS global optionnel (correctifs divers, JS global)............page 170
 * 7) correctif affichage dates YITH Booking............................page 187
 * 8) formulaire de recherche yith......................................page 213
-------------------------------------------------------------------------*/


if ( ! defined( 'ABSPATH' ) ) exit;

/* --------------------------------------------------------------------------
 * 1) Supports de thème & configuration globale
 * -------------------------------------------------------------------------- */

add_action( 'after_setup_theme', function () {

	// Active la gestion automatique de la balise <title> par WordPress.
	add_theme_support( 'title-tag' );

	// Active les styles par défaut des blocs WP (reset, alignments, etc.).
	add_theme_support( 'wp-block-styles' );

	// Active les motifs personnalisés (indispensable pour les voir dans Gutenberg).
	add_theme_support( 'block-patterns' );


	// Active la prise en charge des images mises en avant.
	add_theme_support( 'post-thumbnails' );

	// Active le support WooCommerce natif pour un thème bloc.
	add_theme_support( 'woocommerce' );

	// Active les fonctionnalités enrichies pour les galeries Woo.
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Enregistre les emplacements de menu (utiles si bloc Navigation).
	register_nav_menus( array(
		'primary' => __( 'Menu principal', 'sailingloc' ),
		'footer'  => __( 'Menu pied de page', 'sailingloc' ),
	) );
});

/* --------------------------------------------------------------------------
 * 2) Enregistrement de styles personnalisés pour certains blocs
 * -------------------------------------------------------------------------- */

if ( ! function_exists( 'sailingloc_register_block_styles' ) ) :
	function sailingloc_register_block_styles() {
		// Bloc détails avec flèche dynamique
		register_block_style( 'core/details', array(
			'name' => 'sloc-arrow-icon-details',
			'label' => __( 'icône flèche', 'sailingloc' ),
			'inline_style' => '.is-style-sloc-arrow-icon-details summary { list-style-type: "\2193"; } .is-style-sloc-arrow-icon-details[open]>summary { list-style-type: "\2192"; }'
		));

		// Terme sous forme de pastille
		register_block_style( 'core/post-terms', array(
			'name' => 'sloc-pill',
			'label' => __( 'pilule', 'sailingloc' ),
			'inline_style' => '.is-style-sloc-pill a { background: #f2f2f2; border-radius: 999px; padding: 0.375rem 0.875rem; display: inline-block; }'
		));

		// Liste à coche
		register_block_style( 'core/list', array(
			'name' => 'sloc-checkmark-list',
			'label' => __( 'liste coche', 'sailingloc' ),
			'inline_style' => 'ul.is-style-sloc-checkmark-list { list-style-type: "\2713"; padding-inline-start: 1ch; }'
		));

		// Lien navigation avec icône
		register_block_style( 'core/navigation-link', array(
			'name' => 'sloc-arrow-link',
			'label' => __( 'avec flèche', 'sailingloc' ),
			'inline_style' => '.is-style-sloc-arrow-link .wp-block-navigation-item__label:after { content: "\2197"; padding-inline-start: .25rem; }'
		));

		// Titre décoré
		register_block_style( 'core/heading', array(
			'name' => 'sloc-asterisk',
			'label' => __( 'avec astérisque', 'sailingloc' ),
			'inline_style' => '.is-style-sloc-asterisk:before { display: block; width: 1.5rem; height: 3rem; background: currentColor; }'
		));
	}
endif;
add_action( 'init', 'sailingloc_register_block_styles' );

/* --------------------------------------------------------------------------
 * 3) Feuilles CSS par bloc – chargées à la demande si bloc utilisé
 * -------------------------------------------------------------------------- */

if ( ! function_exists( 'sailingloc_enqueue_block_stylesheets' ) ) :
	function sailingloc_enqueue_block_stylesheets() {
		$ver = wp_get_theme()->get( 'Version' );
		$css_rel = 'assets/css/button-outline.css';
		$uri  = get_theme_file_uri( $css_rel );
		$path = get_theme_file_path( $css_rel );
		if ( file_exists( $path ) ) {
			wp_enqueue_block_style( 'core/button', array(
				'handle' => 'sailingloc-button-style-outline',
				'src'    => $uri,
				'path'   => $path,
				'ver'    => $ver,
			));
		}
		// Ajouter ici d'autres styles si besoin (ex. quote, image)
	}
endif;
add_action( 'init', 'sailingloc_enqueue_block_stylesheets' );

/* --------------------------------------------------------------------------
 * 4) Enregistrement de la catégorie de patterns "sailingloc"
 * -------------------------------------------------------------------------- */
add_action( 'init', function () {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category( 'sailingloc', array(
			'label' => __( 'SailingLoc', 'sailingloc' ),
			'description' => __( 'Blocs réutilisables du thème SailingLoc', 'sailingloc' )
		));
	}
});

/* --------------------------------------------------------------------------
 * 4bis) Enregistrement automatique des fichiers de motifs (.php)
 * -------------------------------------------------------------------------- */
add_action( 'init', function () {
	if ( function_exists( 'register_block_pattern_from_file' ) ) {
		$patterns_dir = get_template_directory() . '/patterns/';
		foreach ( glob( $patterns_dir . '*.php' ) as $pattern_file ) {
			register_block_pattern_from_file( $pattern_file );
		}
	}
});



/* --------------------------------------------------------------------------
 * 5) Correctif YITH – bloque une redirection admin intrusive
 * -------------------------------------------------------------------------- */
add_action( 'plugins_loaded', function () {
	global $yith_vendors_admin;
	if ( isset( $yith_vendors_admin ) && is_object( $yith_vendors_admin ) ) {
		remove_action( 'current_screen', array( $yith_vendors_admin, 'prevent_vendor_redirect_to_product_onboarding' ), 10 );
	}
});

/* --------------------------------------------------------------------------
 * 6) CSS/JS global optionnel (correctifs divers, JS global)
 * -------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', function () {
	$ver = wp_get_theme()->get( 'Version' );

	$compat_css_rel = 'assets/css/theme.css';
	if ( file_exists( get_theme_file_path( $compat_css_rel ) ) ) {
		wp_enqueue_style( 'sailingloc-compat', get_theme_file_uri( $compat_css_rel ), array(), $ver );
	}

	$js_rel = 'assets/js/theme.js';
	if ( file_exists( get_theme_file_path( $js_rel ) ) ) {
		wp_enqueue_script( 'sailingloc-theme', get_theme_file_uri( $js_rel ), array(), $ver, true );
	}
});

  ///////////////////////JS/////////////////////////////////////////////////////////////////////////
 //7 - sailingloc - correctif affichage dates YITH Booking (accueil + boutique + archives produits) //
//////////////////////////////////////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts', function () {
    if ( is_admin() ) return;

    $ver = wp_get_theme()->get( 'Version' );

    // charge sur les pages où le search form peut apparaître
    if ( is_front_page()
      || is_shop()
      || is_post_type_archive( 'product' )
      || is_tax( array( 'product_cat', 'product_tag' ) ) ) {

        wp_enqueue_script(
            'sailingloc-booking-search-fix',
            get_template_directory_uri() . '/assets/js/booking-search-fix.js',
            array( 'jquery' ),
            $ver,
            true
        );
    }
});

/* --------------------------------------------------------------------------
 * 8) YITH Booking / Boutique — limiter à "Bateaux" (cat 85) + enfants (safe)
 * -------------------------------------------------------------------------- */

/** Catégorie racine à autoriser */
if ( ! defined( 'SAILINGLOC_BOOKING_ROOT_CAT' ) ) {
    define( 'SAILINGLOC_BOOKING_ROOT_CAT', 85 );
}

/** IDs autorisés = 85 + tous ses descendants */
if ( ! function_exists( 'sailingloc_allowed_product_cat_ids' ) ) {
    function sailingloc_allowed_product_cat_ids(): array {
        $ids = array_merge(
            [ SAILINGLOC_BOOKING_ROOT_CAT ],
            get_term_children( SAILINGLOC_BOOKING_ROOT_CAT, 'product_cat' )
        );
        return array_map( 'intval', array_unique( $ids ) );
    }
}

/** Contexte catalogue (où l’on veut filtrer) */
if ( ! function_exists( 'sailingloc_is_catalog_context' ) ) {
    function sailingloc_is_catalog_context(): bool {
        return is_shop()
            || is_post_type_archive( 'product' )
            || is_tax( array( 'product_cat', 'product_tag' ) )
            || is_front_page();
    }
}

/**
 * A) Boutique par défaut : afficher uniquement Bateaux + enfants
 */
add_action( 'pre_get_posts', function( WP_Query $q ) {
    if ( is_admin() || ! $q->is_main_query() ) return;
    if ( is_shop() ) {
        $tax_query   = (array) $q->get( 'tax_query' );
        $tax_query[] = array(
            'taxonomy'         => 'product_cat',
            'field'            => 'term_id',
            'terms'            => array( SAILINGLOC_BOOKING_ROOT_CAT ),
            'include_children' => true,
            'operator'         => 'IN',
        );
        $q->set( 'tax_query', $tax_query );
    }
});

/**
 * B) Recherche YITH (GET yith-wcbk-search) : verrouille aussi les résultats
 */
add_action( 'pre_get_posts', function( WP_Query $q ) {
    if ( is_admin() || ! $q->is_main_query() ) return;
    if ( empty( $_GET['yith-wcbk-search'] ) ) return;

    if ( sailingloc_is_catalog_context() ) {
        $tax_query   = (array) $q->get( 'tax_query' );
        $tax_query[] = array(
            'taxonomy'         => 'product_cat',
            'field'            => 'term_id',
            'terms'            => array( SAILINGLOC_BOOKING_ROOT_CAT ),
            'include_children' => true,
            'operator'         => 'IN',
        );
        $q->set( 'tax_query', $tax_query );
    }
});

/**
 * C) get_terms_args — limiter la liste déroulante des catégories
 *    ATTENTION : ne pas agir en admin, AJAX ou REST
 */
add_filter( 'get_terms_args', function( $args, $taxonomies ) {
    if ( empty( $taxonomies ) || ! in_array( 'product_cat', (array) $taxonomies, true ) ) return $args;
    if ( is_admin() ) return $args;
    if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) return $args;   // évite les appels AJAX YITH/Woo
    if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) return $args;              // évite REST

    if ( sailingloc_is_catalog_context() ) {
        $allowed = sailingloc_allowed_product_cat_ids();
        if ( ! empty( $args['include'] ) ) {
            $args['include'] = array_values( array_intersect( array_map( 'intval', (array) $args['include'] ), $allowed ) );
        } else {
            $args['include'] = $allowed;
        }
        // $args['hide_empty'] = true; // optionnel
    }
    return $args;
}, 10, 2 );

/**
 * D) REST WooCommerce (Select2, etc.) — on garde le filtrage ici
 *    car c’est utilisé pour les listes côté boutique/chercheur.
 */
add_filter( 'woocommerce_rest_product_cat_query', function( $prepared_args, $request ) {
    $allowed = sailingloc_allowed_product_cat_ids();

    if ( ! empty( $prepared_args['include'] ) ) {
        $prepared_args['include'] = array_values(
            array_intersect( array_map( 'intval', (array) $prepared_args['include'] ), $allowed )
        );
    } else {
        $prepared_args['include'] = $allowed;
    }
    // $prepared_args['hide_empty'] = true; // optionnel
    return $prepared_args;
}, 10, 2 );

/**
 * E) pre_get_terms — même logique que C), mais sans toucher AJAX/REST
 */
add_action( 'pre_get_terms', function( $term_query ) {
    if ( ! class_exists( 'WP_Term_Query' ) || ! ( $term_query instanceof WP_Term_Query ) ) return;

    $taxonomies = (array) ( $term_query->query_vars['taxonomy'] ?? array() );
    if ( ! in_array( 'product_cat', $taxonomies, true ) ) return;

    if ( is_admin() ) return;
    if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) return;   // important pour YITH (add to cart)
    if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) return;

    if ( sailingloc_is_catalog_context() ) {
        $allowed = sailingloc_allowed_product_cat_ids();
        $include = $term_query->query_vars['include'] ?? array();

        if ( ! empty( $include ) ) {
            $term_query->query_vars['include'] = array_values(
                array_intersect( array_map( 'intval', (array) $include ), $allowed )
            );
        } else {
            $term_query->query_vars['include'] = $allowed;
        }
        // $term_query->query_vars['hide_empty'] = true; // optionnel
    }
}, 10, 1 );

/* 9 SailingLoc Rediriger la boutique vers la recherche YITH Booking  */


add_action( 'template_redirect', function() {
    if ( is_shop() && ! isset($_GET['yith-wcbk-booking-search']) ) {
        $url = add_query_arg(
            'yith-wcbk-booking-search',
            'search-bookings',
            get_permalink( wc_get_page_id( 'shop' ) )
        );
        wp_safe_redirect( $url );
        exit;
    }
});