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
	<?php if (!$_GET['nofooter']) { ?>
	<div id="footer">
	<footer role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<h5>Address</h5>
					<address>
						<a href='https://www.google.com/maps/place/The+Lighthouse+Church/@29.001927,-81.313869,17z/data=!3m1!4b1!4m2!3m1!1s0x88e704b4bb3a5739:0x952e255acd2b056c' target="_blank">
						<?php echo (get_option('qs_contact_street')); ?></br>
						<?php echo (get_option('qs_contact_city') . ', ' . get_option('qs_contact_state') . ' ' . get_option('qs_contact_zip')); ?>
						</a>
					</address>
				</div>
				<div class="col-md-3">
					<h5>Call Us</h5>
					<a href='tel:+<?php echo (get_option('qs_contact_phone')); ?>'>
						<?php echo (get_option('qs_contact_phone')); ?>
					</a>
				</div><!-- .col-lg-3 -->
				<div class="col-lg-3">
					<h5>Social Media</h5>
					<div class='btn-group'>
						<a class="btn" style='padding: 0' href='<?php echo(get_option('qs_contact_facebook')); ?>' target="_blank"/><img src='<?php echo (get_option('qs_contact_facebook_icon')); ?>' alt='facebook' /></a>
						<a class="btn" style='padding: 0' href='<?php echo (get_option('qs_contact_youtube')); ?>' target="_blank"/><img src='<?php echo (get_option('qs_contact_youtube_icon')); ?>' alt='youtube' /></a>
					</div>
				</div><!--.col-lg-3-->	
				<div class="col-lg-3">
					<h5>Service Times</h5>
					<dl>
						<dt>Sunday Morning:</dt>
						<dd>Hour of Power Service: 9:00 AM</dd>
						<dd>Celebration Service: 10:30 AM</dd>
					</dl>
					<a href="/worship-services/">Details on Services</a>
				</div>
			</div><!-- .row -->
		</div><!-- #footer-content.container -->
	</footer></div><!-- #footer --> <?php } ?>
</div><!-- #page -->
</div>
<?php wp_footer(); ?>
</body>
</html>
