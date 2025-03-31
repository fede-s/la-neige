<div class="breadcrumb">
   <div class="container">
      <?php
      for ($i = 0; $i < count($items); $i++) {
         echo $i > 0 ? ' <span>></span>' : '';
         if ($i < count($items) - 1) { ?>
            <a class="nice-link" href="<?= $items[$i]['link'] ?>"> <?= $items[$i]['text'] ?></a>
            <?php
         } else { ?>
            <span class="nice-link"> <?= $items[$i]['text'] ?></a>
            <?php
         }
      } ?>
   </div>
</div>
