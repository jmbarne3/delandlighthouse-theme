<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @since 1.0.0
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>
	</main><!-- main -->

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<h5>Address</h5>
					<address>
						<a href='<?php echo (get_option('qs_contact_email')); ?>'>
						<?php echo (get_option('qs_contact_street')); ?></br>
						<?php echo (get_option('qs_contact_city') . ', ' . get_option('qs_contact_state') . ' ' . get_option('qs_contact_zip')); ?></br>
						View Map
						</a>
					</address>
					<h5>Call Us</h5>
					<a href='tel:+<?php echo (get_option('qs_contact_phone')); ?>'>
						<?php echo (get_option('qs_contact_phone')); ?>
					</a>
				</div><!-- .col-lg-3 -->
				<div class="col-lg-3">
					<h5>Map</h5>
					<?php echo do_shortcode('[map zoom="15"]1525 South State Road 15-A DeLand, Florida 32720[/map]'); ?>
				</div>
				<div class="col-lg-3">
					<h5>Contact Us</h5>
					<?php echo do_shortcode("[proper_contact_form]"); ?>
				</div>
				<div class="col-lg-3">
					<h5>Social Media</h5>
					<div class='btn-group'>
						<a class="btn" style='padding: 0' href='<?php echo(get_option('qs_contact_facebook')); ?>' target="_blank"/><img src='<?php echo (get_option('qs_contact_facebook_icon')); ?>' alt='facebook' /></a>
						<a class="btn" style='padding: 0' href='<?php echo (get_option('qs_contact_youtube')); ?>' target="_blank"/><img src='<?php echo (get_option('qs_contact_youtube_icon')); ?>' alt='youtube' /></a>
					</div>
				</div><!--.col-lg-3-->
			</div><!-- .row -->
		</div><!-- #footer-content.container -->
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
