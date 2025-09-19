<?php
/**
 * Title: Hero d’accueil
 * Slug: sailingloc/hero
 * Categories: sailingloc, featured
 * Description: Section d’accueil avec titre, texte et bouton d’appel à action.
 */
?>

<!--
  Section hero minimaliste, utilisable sur la page d’accueil ou une page de présentation.
  Comprend un titre, un paragraphe descriptif et un bouton cliquable.
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
  }
} -->
<div class="wp-block-group" style="padding-top:4rem;padding-bottom:4rem">

  <!-- wp:heading {"level":1,"textAlign":"center"} -->
  <h1 class="wp-block-heading has-text-align-center">louez votre bateau en toute confiance</h1>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"align":"center"} -->
  <p class="has-text-align-center">découvrez SailingLoc, la plateforme responsable pour la location de bateaux.</p>
  <!-- /wp:paragraph -->

  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
  <div class="wp-block-buttons">
    <!-- wp:button {"backgroundColor":"jaune"} -->
    <div class="wp-block-button">
      <a class="wp-block-button__link has-jaune-background-color wp-element-button" href="/#grille-bateaux">découvrir les bateaux</a>
    </div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->

</div>
<!-- /wp:group -->
