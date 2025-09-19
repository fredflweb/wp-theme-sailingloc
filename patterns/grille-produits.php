<?php
/**
 * Title: Grille de bateaux – derniers produits
 * Slug: sailingloc/grille-produits
 * Categories: sailingloc, woocommerce
 * Description: Affiche une grille de 6 bateaux (produits WooCommerce) en 3 colonnes.
 */
?>

<!--
  Grille WooCommerce affichant les 6 derniers produits.
  Utilise le bloc product-collection, compatible avec les blocs WooCommerce.
-->

<!-- wp:group {
  "layout": { "type": "constrained" },
  "style": {
    "spacing": {
      "padding": {
        "top": "3rem",
        "bottom": "3rem"
      }
    }
  }
} -->
<div class="wp-block-group" style="padding-top:3rem;padding-bottom:3rem">

  <!-- wp:heading {"level":2,"textAlign":"center"} -->
  <h2 class="wp-block-heading has-text-align-center">nos derniers bateaux disponibles</h2>
  <!-- /wp:heading -->

  <!-- wp:woocommerce/product-collection {
    "query": { "perPage": 6 },
    "layout": { "type": "grid", "columns": 3 }
  } /-->

</div>
<!-- /wp:group -->
