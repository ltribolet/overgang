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

    <hr>
	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="signature container">
            <div class="row">
                <div class="col-12">
                    <div class="footer__logo">
                        <img src="<?= get_template_directory_uri() ?>/img/logo-overgang.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <p>Overgang Magazine meet amazing people, ambitious brands and association; let’s shake people brain together.</p>
                </div>
                <div class="col-2 offset-1">
	                <?php
	                $args = [
		                'menu' => 'bottom-menu',
		                'menu_class' => 'list-unstyled bottom-menu overgang_nav',
		                'container' => ''
	                ];
	                wp_nav_menu($args);
	                ?>
                </div>
                <div class="col-2 offset-1">
                    <ul class="list-unstyled bottom-menu overgang_nav">
                        <li><a href="">Nous soutenir sur Tipee</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="underline-link" href="">Facebook</a>
                    <a class="underline-link" href="">Instagram</a>
                </div>
            </div>
        </div>
        <hr class="marg0">
        <div class="copyright d-flex justify-content-center">
            <span>&copy; Copyright Övergång Magazine <?= date('Y')?>. All rights reserved.</span>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->


<?php
get_sidebar();
?>
</div><!--.root-->

<?php if (is_home()) {?>
    <div class="newsletter d-flex justify-content-center">
        <div>
            <div class="newsletter__logo"><img src="<?= get_template_directory_uri() ?>/img/logo-overgang-white.png" alt=""></div>
            <p>Recevoir notre newsletter</p>
            <!--<div><input type="text"><button>Envoyer</button></div>-->
            <!-- Begin MailChimp Signup Form -->
            <div id="mc_embed_signup">
                <form action="//overgang.us16.list-manage.com/subscribe/post?u=9934da7c3617d37ede589d0fd&amp;id=92352c949a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">

                        <div class="mc-field-group">
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                        </div>
                        <div id="mce-responses">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9934da7c3617d37ede589d0fd_92352c949a" tabindex="-1" value=""></div>
                    </div>
                </form>
            </div>
            <!--End mc_embed_signup-->
        </div>
    </div>
<?php }?>

<?php
wp_footer();
?>
</body>
</html>
