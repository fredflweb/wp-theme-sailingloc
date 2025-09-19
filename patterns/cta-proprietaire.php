<?php
/**
 * Title: Appel propriétaire – louez votre bateau
 * Slug: sailingloc/cta-proprietaire
 * Categories: sailingloc, call-to-action
 * Description: Bloc d’appel à action destiné aux propriétaires pour les inviter à rejoindre la plateforme.
 */
?>

<!--
  Appel à destination des propriétaires de bateaux.
  Comprend un titre accrocheur et un bouton cliquable.
  À placer en page d’accueil, dans le footer ou après les résultats de recherche.
-->

<!-- wp:group {
  "layout": { "type": "constrained", "justifyContent": "center" },
  "style": {
    "spacing": {
      "padding": {
        "top": "3rem",
        "bottom": "3rem"
      }
    }
  },
  "backgroundColor": "vert-ocean"
} -->
<div class="wp-block-group has-vert-ocean-background-color" style="padding-top:3rem;padding-bottom:3rem">

  <!-- wp:heading {"level":2,"textAlign":"center","textColor":"base"} -->
  <h2 class="wp-block-heading has-text-align-center has-base-color">propriétaire ? louez en toute confiance</h2>
  <!-- /wp:heading -->

  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
  <div class="wp-block-buttons">
    <!-- wp:button {"backgroundColor":"base","textColor":"vert-ocean"} -->
    <div class="wp-block-button">
      <a class="wp-block-button__link has-base-background-color has-vert-ocean-color wp-element-button" href="/devenir-proprietaire/">ouvrir ma boutique</a>
    </div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->

</div>
<!-- /wp:group -->
