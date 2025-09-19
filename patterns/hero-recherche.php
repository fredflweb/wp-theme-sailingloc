<?php
/**
 * Title: Hero accueil avec recherche
 * Slug: sailingloc/hero-recherche
 * Categories: sailingloc, featured
 * Description: En-tête de page d’accueil avec un titre accrocheur et un champ de recherche produit.
 */
?>

<!--
  Section hero utilisée en haut de la page d’accueil.
  Comprend un titre principal et un champ de recherche WooCommerce.
-->

<!-- wp:group {
  "layout": { "type": "constrained", "justifyContent": "center" },
  "style": {
    "spacing": {
      "padding": {
        "top": "4rem",
        "bottom": "4rem"
      }
    }
  },
  "backgroundColor": "bleu-profond"
} -->
<div class="wp-block-group has-bleu-profond-background-color" style="padding-top:4rem;padding-bottom:4rem">

  <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"1.2"}},"textColor":"base"} -->
  <h1 class="wp-block-heading has-text-align-center has-base-color" style="line-height:1.2">prenez la mer simplement</h1>
  <!-- /wp:heading -->

  <!-- wp:woocommerce/product-search {"label":"rechercher un bateau","showLabel":false} /-->

</div>
<!-- /wp:group -->
