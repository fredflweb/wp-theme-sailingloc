<?php
/**
 * SailingLoc – fonctions du thème (proche TT5)
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

if ( ! defined( 'ABSPATH' ) ) exit;

/* --------------------------------------------------------------------------
 * 1) Supports de thème & configuration globale
 * -------------------------------------------------------------------------- */

add_action( 'after_setup_theme', function () {

	// Titre <title> automatique géré par WordPress.
	add_theme_support( 'title-tag' );

	// Styles de blocs WordPress (classes utilitaires de base).
	add_theme_support( 'wp-block-styles' );

	// Images mises en avant (si besoin sur articles/pages).
	add_theme_support( 'post-thumbnails' );

	// Thème bloc + WooCommerce : active les intégrations Woo côté thème.
	add_theme_support( 'woocommerce' );

	/**
	* SailingLoc – charger un style "Outline" dédié pour le bloc Button
	* (wp_enqueue_block_style)
 	*/
add_action( 'init', function () {
    $rel  = 'assets/css/button-outline.css';   // chemin relatif
    $uri  = get_theme_file_uri( $rel );
    $path = get_theme_file_path( $rel );

    if ( file_exists( $path ) ) {
        wp_enqueue_block_style(
            'core/button',
            array(
                'handle' => 'sailingloc-button-style-outline',
                'src'    => $uri,
                'path'   => $path,
                'ver'    => wp_get_theme()->get( 'Version' ),
            )
        );
    }
} );

	// (Optionnel) galerie produit Woo – zoom / lightbox / slider.
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Menus (utilisés si tu ajoutes un bloc Navigation lié à un emplacement).
	register_nav_menus( array(
		'primary' => __( 'Menu principal', 'sailingloc' ),
		'footer'  => __( 'Menu pied de page', 'sailingloc' ),
	) );
} );

/* --------------------------------------------------------------------------
 * 2) Enregistrement de styles personnalisés pour certains blocs
 *    (même principe que TT4/TT5 ; styles inline simples et portables)
 * -------------------------------------------------------------------------- */

if ( ! function_exists( 'sailingloc_register_block_styles' ) ) :
	/**
	 * Déclare des variantes de styles pour quelques blocs Core.
	 * Ces variantes apparaissent dans le panneau "Styles" du bloc concerné.
	 */
	function sailingloc_register_block_styles() {

		// Détails (bloc "Détails") avec icône flèche : inspiré TT4.
		register_block_style(
			'core/details',
			array(
				'name'         => 'sloc-arrow-icon-details',
				'label'        => __( 'icône flèche', 'sailingloc' ),
				'inline_style' => '
				.is-style-sloc-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}
				.is-style-sloc-arrow-icon-details summary { list-style-type: "\2193\00a0\00a0\00a0"; }
				.is-style-sloc-arrow-icon-details[open]>summary { list-style-type: "\2192\00a0\00a0\00a0"; }',
			)
		);

		// Termes (catégories/étiquettes) en "pilule" : inspiré TT4.
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'sloc-pill',
				'label'        => __( 'pilule', 'sailingloc' ),
				'inline_style' => '
				.is-style-sloc-pill a,
				.is-style-sloc-pill span:not([class],[data-rich-text-placeholder]) {
					display:inline-block;
					background-color: var(--wp--preset--color--base-2, #f2f2f2);
					padding: .375rem .875rem;
					border-radius: var(--wp--preset--spacing--20, 999px);
				}
				.is-style-sloc-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3, #e5e5e5);
				}',
			)
		);

		// Liste avec coche : inspiré TT4.
		register_block_style(
			'core/list',
			array(
				'name'         => 'sloc-checkmark-list',
				'label'        => __( 'liste coche', 'sailingloc' ),
				'inline_style' => '
				ul.is-style-sloc-checkmark-list { list-style-type: "\2713"; }
				ul.is-style-sloc-checkmark-list li { padding-inline-start: 1ch; }',
			)
		);

		// Lien de navigation avec flèche : inspiré TT4.
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'sloc-arrow-link',
				'label'        => __( 'avec flèche', 'sailingloc' ),
				'inline_style' => '
				.is-style-sloc-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: .25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);

		// Titre avec astérisque décoratif : inspiré TT4.
		register_block_style(
			'core/heading',
			array(
				'name'         => 'sloc-asterisk',
				'label'        => __( 'avec astérisque', 'sailingloc' ),
				'inline_style' => "
				.is-style-sloc-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}
				.is-style-sloc-asterisk:empty:before,
				.is-style-sloc-asterisk:-moz-only-whitespace:before { content: none; }
				.is-style-sloc-asterisk.has-text-align-center:before { margin: 0 auto; }
				.is-style-sloc-asterisk.has-text-align-right:before { margin-left: auto; }
				.rtl .is-style-sloc-asterisk.has-text-align-left:before { margin-right: auto; }
				",
			)
		);
	}
endif;
add_action( 'init', 'sailingloc_register_block_styles' );

/* --------------------------------------------------------------------------
 * 3) Feuilles de style spécifiques à certains blocs (chargées à la demande)
 *    Principe TT5 : wp_enqueue_block_style() pour charger un CSS
 *    seulement si le bloc est utilisé (perf + propreté).
 * -------------------------------------------------------------------------- */

if ( ! function_exists( 'sailingloc_enqueue_block_stylesheets' ) ) :
	/**
	 * Enfile des CSS dédiées à certains blocs (si présents).
	 * Place tes fichiers dans /assets/css/ ; ajuste les chemins si besoin.
	 */
	function sailingloc_enqueue_block_stylesheets() {
		$ver = wp_get_theme( get_template() )->get( 'Version' );

		// Exemple : style alternatif pour les boutons (outline).
		$css_rel_path = 'assets/css/button-outline.css';
		$css_uri      = get_theme_file_uri( $css_rel_path );
		$css_path     = get_theme_file_path( $css_rel_path );

		if ( file_exists( $css_path ) ) {
			wp_enqueue_block_style(
				'core/button',
				array(
					'handle' => 'sailingloc-button-style-outline',
					'src'    => $css_uri,
					'ver'    => $ver,
					'path'   => $css_path,
				)
			);
		}

		// Ajoute ici d'autres feuilles par bloc si nécessaires :
		// wp_enqueue_block_style( 'core/quote', [ 'handle' => '...', 'src' => ..., 'path' => ... ] );
	}
endif;
add_action( 'init', 'sailingloc_enqueue_block_stylesheets' );

/* -------------------------------------------------
 * 4/ catégorie de patterns sailingloc
 * ------------------------------------------------- */
add_action( 'init', function () {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
            'sailingloc',
            array(
                'label' => __( 'SailingLoc', 'sailingloc' ),
                'description' => __( 'Blocs réutilisables du thème SailingLoc', 'sailingloc' ),
            )
        );
    }
} );

/* --------------------------------------------------------------------------
 * 5) Correctif YITH (exemple fourni) – empêcher une redirection admin gênante
 * -------------------------------------------------------------------------- */

add_action( 'plugins_loaded', function () {
	global $yith_vendors_admin;

	// Si l'objet admin YITH est présent, on retire une action qui force une redirection.
	if ( isset( $yith_vendors_admin ) && is_object( $yith_vendors_admin ) ) {
		remove_action( 'current_screen', array( $yith_vendors_admin, 'prevent_vendor_redirect_to_product_onboarding' ), 10 );
	}
} );

/* --------------------------------------------------------------------------
 * 6) (Optionnel) Enqueue d’un CSS/JS global complémentaire
 *     -> Pour des correctifs de compat (YITH Frontend Manager, etc.)
 * -------------------------------------------------------------------------- */

add_action( 'wp_enqueue_scripts', function () {
	$ver = wp_get_theme( get_template() )->get( 'Version' );

	// CSS "compat" : petites corrections hors theme.json
	$compat_css_rel = 'assets/css/theme.css';
	if ( file_exists( get_theme_file_path( $compat_css_rel ) ) ) {
		wp_enqueue_style( 'sailingloc-compat', get_theme_file_uri( $compat_css_rel ), array(), $ver );
	}

	// JS global si nécessaire
	$js_rel = 'assets/js/theme.js';
	if ( file_exists( get_theme_file_path( $js_rel ) ) ) {
		wp_enqueue_script( 'sailingloc-theme', get_theme_file_uri( $js_rel ), array(), $ver, true );
	}
} );
