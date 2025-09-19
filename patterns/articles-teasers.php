<?php
/**
 * Title: Actualites 3 derniers articles
 * Slug: sailingloc/articles-teasers
 * Categories: sailingloc, query
 */
?>

<!-- bloc principal centré -->
<!-- wp:group {"layout":{"type":"constrained"}, "tagName":"section"} -->
<div class="wp-block-group">

  <!-- titre de section -->
  <!-- wp:heading {"level":2,"textAlign":"center"} -->
  <h2 class="wp-block-heading has-text-align-center">nos actualités</h2>
  <!-- /wp:heading -->

  <!-- requête des 3 derniers articles -->
  <!-- wp:query {"query":{"perPage":3,"postType":"post","order":"desc","orderBy":"date"},"layout":{"type":"grid","columnCount":3}} -->
  <div class="wp-block-query">

    <!-- boucle d’articles -->
    <!-- wp:post-template -->
      <!-- titre cliquable -->
      <!-- wp:post-title {"level":3,"isLink":true} /-->

      <!-- extrait de l’article -->
      <!-- wp:post-excerpt {"moreText":"lire"} /-->
    <!-- /wp:post-template -->

    <!-- pagination (facultative si besoin de plus) -->
    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
      <!-- wp:query-pagination-previous /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

  </div>
  <!-- /wp:query -->

</div>
<!-- /wp:group -->
