<?php
/**
 * Title: Bandeau newsletter
 * Slug: sailingloc/newsletter-bandeau
 * Categories: sailingloc, call-to-action
 * Description: Invitation à s’inscrire aux ouvertures de saisons via un CTA simple.
 */
?>

<!--
  Bandeau d’appel à inscription à la newsletter.
  Peut être utilisé en bas de page, ou dans la home.
-->

<!-- wp:group {
  "layout": { "type": "constrained", "justifyContent": "center" },
  "style": {
    "spacing": {
      "padding": {
        "top": "2rem",
        "bottom": "2rem"
      }
    }
  },
  "backgroundColor": "bleu-clair"
} -->
<div class="wp-block-group has-bleu-clair-background-color" style="padding-top:2rem;padding-bottom:2rem">

  <!-- wp:paragraph {"align":"center"} -->
  <p class="has-text-align-center">recevez les ouvertures de saisons</p>
  <!-- /wp:paragraph -->

  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
  <div class="wp-block-buttons">
    <!-- wp:button -->
    <div class="wp-block-button">
      <a class="wp-block-button__link wp-element-button" href="/newsletter/">s’inscrire</a>
    </div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->

</div>
<!-- /wp:group -->
