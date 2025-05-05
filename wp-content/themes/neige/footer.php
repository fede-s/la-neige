<?php
$options = get_fields('options'); ?>

<footer class="footer">
   <section class="newsletter-section">
      <div class="container newsletter-container">
         <div class="newsletter-text">
            <h1>Subscribe to our Newsletter!</h1>
         </div>
         <div class="newsletter-form forest-blue">
            <form action="#" method="post">
               <label for="email">Your E-mail Address</label>
               <input type="email" id="email" name="email" placeholder="Your E-mail Address">
               <button class="linkBtn" type="submit">Register</button>
            </form>
         </div>
      </div>
   </section>
   <section class="info">
      <div class="container contact">
         <h5>GET IN TOUCH</h5>
         <div class="tel">
            <?php
            $tel = get_field('telephone', 'options');
            if (!empty($tel)) { ?>
               <h5>T</h5>
               <p><a href="tel:<?= $tel ?>"><?= $tel; ?></a></p>
            <?php } ?>
         </div>
         <div class="email">
            <?php
            $mail = get_field('email', 'options');
            if (!empty($mail)) { ?>
               <h5>E</h5>
               <p><a href="mailto:<?= $mail; ?>"><?= $mail; ?></a></p>
            <?php } ?>
         </div>
         <a href="<?= get_field('url', 'options'); ?>"><?= get_field('url', 'options'); ?></a>
         <h5 class="top-50">KK LA NEIGE</h5>
         <p class="adress"><?= get_field('adress', 'options'); ?></p>
      </div>
      <div class="container social-media top-100">
         <a href="<?= get_field('instagram', 'options'); ?>"><?= Utils::imgLazy($options['instagram_icon'], 'large', '100px') ?></a>
         <a href="<?= get_field('facebook', 'options'); ?>"><?= Utils::imgLazy($options['facebook_icon'], 'large', '100px') ?></a>
         <a href="<?= get_field('youtube', 'options'); ?>"><?= Utils::imgLazy($options['youtube_icon'], 'large', '100px') ?></a>
         <a href="<?= get_field('tiktok', 'options'); ?>"><?= Utils::imgLazy($options['tiktok_icon'], 'large', '100px') ?></a>
      </div>
      <div class="container top-50 copyright">
         <p>
            <?= date("Y"); ?> © LA NEIGE
         </p>
      </div>
      <div class="signature-footer">
         <?= file_get_contents(get_field('footer_signature', 'options')); ?>
      </div>
      <div class="logo-footer">
         <?= Utils::imgLazy($options['logo'], 'large', '200px'); ?>
      </div>
   </section>
</footer>



<?php wp_footer(); ?>
</body>

</html>
