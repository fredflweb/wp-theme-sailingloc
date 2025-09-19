<?php
/**
 * Title: Étapes - comment ça marche
 * Slug: sailingloc/etapes-fonctionnement
 * Categories: sailingloc, text
 * Description: Trois colonnes pour décrire les étapes de réservation d’un bateau.
 */
?>

<!--
  Motif utilisé pour expliquer en 3 étapes simples le fonctionnement du service.
  S'affiche en colonnes égales avec titres centrés.
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

  <!-- wp:columns {"className":"is-style-default"} -->
  <div class="wp-block-columns is-style-default">

    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:heading {"level":3,"textAlign":"center"} -->
      <h3 class="wp-block-heading has-text-align-center">1. recherchez</h3>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:heading {"level":3,"textAlign":"center"} -->
      <h3 class="wp-block-heading has-text-align-center">2. réservez</h3>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:heading {"level":3,"textAlign":"center"} -->
      <h3 class="wp-block-heading has-text-align-center">3. embarquez</h3>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:column -->

  </div>
  <!-- /wp:columns -->

</div>
<!-- /wp:group -->
