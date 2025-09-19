<?php
/**
 * Title: Notice Locataire
 * Slug: sailingloc/notice-locataire
 * Categories: sailingloc, legal
 * Description: Encadré juridique réutilisable sur les fiches produits.
 */
?>

<!--
  Motif affichant une notice juridique à destination des locataires.
  À placer sous les fiches produit ou dans les templates produits.
-->

<!-- wp:group {
  "style": {
    "border": {
      "width": "1px",
      "style": "solid",
      "color": "#ddd"
    },
    "spacing": {
      "padding": {
        "top": "1.5rem",
        "bottom": "1.5rem",
        "left": "2rem",
        "right": "2rem"
      },
      "margin": {
        "top": "2rem"
      }
    }
  },
  "layout": { "type": "constrained" },
  "backgroundColor": "base"
} -->
<div class="wp-block-group has-base-background-color" style="border-width:1px;border-style:solid;border-color:#ddd;padding:1.5rem 2rem;margin-top:2rem">

  <!-- wp:heading {"level":3,"textAlign":"left"} -->
  <h3 class="wp-block-heading has-text-align-left">notice au locataire</h3>
  <!-- /wp:heading -->

  <!-- wp:paragraph -->
  <p>merci de <strong>télécharger, lire attentivement et accepter le contrat de location</strong> avant tout règlement.</p>
  <!-- /wp:paragraph -->

  <!-- wp:paragraph -->
  <p>le <strong>paiement de la réservation vaut acceptation pleine et entière du contrat</strong>, de ses conditions et de ses annexes.</p>
  <!-- /wp:paragraph -->

  <!-- wp:paragraph -->
  <p>⚠ sans contrat signé retourné, la location ne sera pas validée.</p>
  <!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
