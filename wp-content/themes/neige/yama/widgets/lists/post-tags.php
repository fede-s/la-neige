<?php
$terms = get_terms('post_tag'); ?>

<h4 class="list-title">Tags</h4>
<hr />
<div class="tags tag-list">
   <?php
   foreach ($terms as $term) { ?>
      <a href="<?= get_term_link($term) ?>" class="nice-link"><?= $term->name ?></a> |
      <?php
   } ?>
</div>
