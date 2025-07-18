<?php
require_once(YAMA . '/hubspot/Hubspot.php');

$options = get_fields('options');
$colorWhite = ($options['change_color'] == true) ? 'color-white ' : '';
?>

<footer class="footer">
    <section class="newsletter-section">
        <div class="container newsletter-container fadeIn <?= $colorWhite ;?>">
            <h1>Subscribe to our Newsletter!</h1>
            <?php HubSpot::createForm($options['newsletter_form_id']) ?>
        </div>
    </section>
    <section class="info <?= $colorWhite ;?>">
        <?= Utils::imgLazy(get_field('footer_background_image', 'options'), 'large', '2000px', '', 'background-image footer-image fadeIn');; ?>
        <div class="container contact">
            <h5 class="fadeIn">GET IN TOUCH</h5>
            <div class="tel fadeIn">
                <?php
                $tel = get_field('telephone', 'options');
                if (!empty($tel)) { ?>
                    <h5>T</h5>
                    <p><a href="tel:<?= $tel ?>"><?= $tel; ?></a></p>
                <?php } ?>
            </div>
            <div class="email fadeIn">
                <?php
                $mail = get_field('email', 'options');
                if (!empty($mail)) { ?>
                    <h5>E</h5>
                    <p><a href="mailto:<?= $mail; ?>"><?= $mail; ?></a></p>
                <?php } ?>
            </div>
            <a class="fadeIn" href="<?= get_field('url', 'options'); ?>"><?= get_field('url', 'options'); ?></a>
            <h5 class="top-50 fadeIn">KK LA NEIGE</h5>
            <p class="adress fadeIn"><?= get_field('adress', 'options'); ?></p>
        </div>
        <div class="container social-media top-100 fadeIn">
            <a href="<?= get_field('instagram', 'options'); ?>"><?= Utils::imgLazy($options['instagram_icon'], 'large', '100px') ?></a>
            <a href="<?= get_field('facebook', 'options'); ?>"><?= Utils::imgLazy($options['facebook_icon'], 'large', '100px') ?></a>
            <a href="<?= get_field('youtube', 'options'); ?>"><?= Utils::imgLazy($options['youtube_icon'], 'large', '100px') ?></a>
            <a href="<?= get_field('tiktok', 'options'); ?>"><?= Utils::imgLazy($options['tiktok_icon'], 'large', '100px') ?></a>
        </div>
        <div class="container top-50 copyright fadeIn">
            <p>
                <?= date("Y"); ?> © LA NEIGE
            </p>
        </div>
        <div class="header-content">
            <div class="signature-footer fadeIn03">
                <?= $options['footer_signature']; ?>
            </div>
        </div>
        <div class="logo-footer">
            <?= Utils::imgLazy($options['logo'], 'large', '200px', '', 'fadeIn'); ?>
        </div>
    </section>
</footer>


<?php wp_footer(); ?>
</body>

</html>
