<?php
$options = get_fields('options'); ?>

<footer class="footer">
    <section class="newsletter-section">
        <div class="container newsletter-container">
            <?php include(YAMA . '/widgets/subscribe-form.php'); ?>
        </div>
    </section>
    <section class="info">
        <?= Utils::imgLazy(get_field('footer_background_image', 'options'), 'large', '2000px', '', 'background-image footer-image');; ?>
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

        </div>
        <div class="logo-footer">
            <?= Utils::imgLazy($options['logo'], 'large', '200px'); ?>
        </div>
    </section>
</footer>


<?php wp_footer(); ?>
</body>

</html>
