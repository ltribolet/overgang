<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package overgang
 */

?>

	</div><!-- #content -->

    <hr class="m-0">
	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="signature container">
            <div class="row">
                <div class="col-12">
                    <div class="footer__logo">
                        <img src="<?= get_template_directory_uri() ?>/img/logo-overgang.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7 col-lg-5">
                    <p>Overgang Magazine meet amazing people, ambitious brands and association; let’s shake people brain together.</p>
                </div>
                <div class="col-12 col-md-5 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-2">
				            <?php
				            $args = [
					            'menu'       => 'bottom-menu',
					            'menu_class' => 'list-unstyled bottom-menu overgang_nav',
					            'container'  => ''
				            ];
				            //wp_nav_menu( $args );
				            ?>
                            <ul>
                                <li><a class="underline-link" href="https://www.facebook.com/overgang.magazine/" target="_blank">Facebook</a></li>
                                <li><a class="underline-link" href="https://www.instagram.com/overgang.magazine/" target="_blank">Instagram</a></li>
                                <li><a class="underline-link" href="https://overgang.fr/pdf/Overgang_dossier_presse.pdf" target="_blank">Dossier de presse</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="m-0">
        <div class="copyright d-flex justify-content-center">
            <span>&copy; Copyright Övergång Magazine <?= date('Y')?>. All rights reserved.</span>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->


<?php
get_sidebar();
?>
</div><!--.root-->

<?php if (is_home() || is_single() || is_page('archives')) {?>
    <div class="newsletter default-gradient d-flex justify-content-center align-items-center">
        <div>
            <div class="d-flex justify-content-center newsletter__logo"><img class="m-auto logo" src="<?= get_template_directory_uri() ?>/img/logo-overgang-white.svg" alt=""></div>
            <p class="align-content-center" style="font-size: 40px">Recevoir notre newsletter</p>
            <div class="d-flex justify-content-center" id="mc_embed_signup">
                <form action="//overgang.us16.list-manage.com/subscribe/post?u=9934da7c3617d37ede589d0fd&amp;id=92352c949a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">

                            <input type="email" placeholder="Votre adresse mail" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            <input type="submit" value="Envoyer" name="subscribe" id="mc-embedded-subscribe" class="button">
                        </div>
                        <div id="mce-responses">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9934da7c3617d37ede589d0fd_92352c949a" tabindex="-1" value=""></div>
                </form>
            </div>
            <p class="align-content-center" style="opacity:.4;">Pas de spam nous respectons vos données personnels</p>
        </div>
    </div>
<?php }?>

<?php
wp_footer();
?>
</body>
</html>
