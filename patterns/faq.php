<?php
/**
 * Title: FAQ courte
 * Slug: sailingloc/faq
 * Categories: sailingloc, text
 * Description: Bloc d’aide réutilisable au format accordéon.
 */
?>

<!--
  Foire aux questions (FAQ) au format <details> / <summary>.
  Peut être dupliqué ou inséré dans une page de type support / produit.
-->

<!-- wp:group {
  "layout": { "type": "constrained" },
  "style": {
    "spacing": {
      "padding": {
        "top": "2rem",
        "bottom": "2rem"
      }
    }
  }
} -->
<div class="wp-block-group" style="padding-top:2rem;padding-bottom:2rem">

  <!-- wp:details -->
  <details class="wp-block-details">
    <summary>faut-il un permis ?</summary>
    <p>cela dépend du bateau. certaines locations nécessitent un permis côtier ou fluvial, d'autres non. chaque fiche précise les conditions.</p>
  </details>
  <!-- /wp:details -->

  <!-- wp:details -->
  <details class="wp-block-details">
    <summary>quelles sont les assurances incluses ?</summary>
    <p>le bateau est couvert par l’assurance du propriétaire. vous pouvez souscrire des options complémentaires au moment de la réservation.</p>
  </details>
  <!-- /wp:details -->

  <!-- wp:details -->
  <details class="wp-block-details">
    <summary>puis-je annuler ma réservation ?</summary>
    <p>oui, selon les conditions indiquées dans le contrat. les frais éventuels dépendent du délai d’annulation.</p>
  </details>
  <!-- /wp:details -->

</div>
<!-- /wp:group -->
