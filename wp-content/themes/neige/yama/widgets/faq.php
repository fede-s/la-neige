<?php
$faqID = 'faq' . rand();
?>
<div class="faq" id="<?= $faqID ?>">
   <div class="questions-odd">
      <?php
      for ($i = 0; $i < count($faq); $i+= 2) {
         $singleFaq = $faq[$i];
         $qID = 'question' . rand(); ?>
         <div class="panel">
            <a class="question no-decoration" data-toggle="collapse"  data-parent="#<?= $faqID ?>" href="#<?= $qID ?>" aria-expanded="false" aria-controls="collapseExample">
               <button class="btn btn-primary collapsed" data-toggle="collapse"  data-parent="#<?= $faqID ?>" href="#<?= $qID ?>" aria-expanded="false" aria-controls="collapseExample"></button>
               <span><?= $singleFaq['question'] ?></span>
            </a>
            <div class="collapse" id="<?= $qID ?>">
               <div class="answer">
                  <?= $singleFaq['answer'] ?>
               </div>
            </div>
         </div>
         <?php
      } ?>
   </div>
   <div class="questions-even">
      <?php
      for ($i = 1; $i < count($faq); $i+= 2) {
         $singleFaq = $faq[$i];
         $qID = 'question' . rand(); ?>
         <div class="panel">
            <a class="question no-decoration" data-toggle="collapse"  data-parent="#<?= $faqID ?>" href="#<?= $qID ?>" aria-expanded="false" aria-controls="collapseExample">
               <button class="btn btn-primary collapsed" data-toggle="collapse"  data-parent="#<?= $faqID ?>" href="#<?= $qID ?>" aria-expanded="false" aria-controls="collapseExample"></button>
               <span><?= $singleFaq['question'] ?></span>
            </a>
            <div class="collapse" id="<?= $qID ?>">
               <div class="answer">
                  <?= $singleFaq['answer'] ?>
               </div>
            </div>
         </div>
         <?php
      } ?>
   </div>
   <div class="questions-all">
      <?php
      for ($i = 0; $i < count($faq); $i++) {
         $singleFaq = $faq[$i];
         $qID = 'question' . rand(); ?>
         <div class="panel">
            <a class="question no-decoration" data-toggle="collapse"  data-parent="#<?= $faqID ?>" href="#<?= $qID ?>" aria-expanded="false" aria-controls="collapseExample">
               <button class="btn btn-primary collapsed" data-toggle="collapse"  data-parent="#<?= $faqID ?>" href="#<?= $qID ?>" aria-expanded="false" aria-controls="collapseExample"></button>
               <span><?= $singleFaq['question'] ?></span>
            </a>
            <div class="collapse" id="<?= $qID ?>">
               <div class="answer">
                  <?= $singleFaq['answer'] ?>
               </div>
            </div>
         </div>
         <?php
      } ?>
   </div>
</div>
