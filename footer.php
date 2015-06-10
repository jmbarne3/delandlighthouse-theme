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
					<h5>Contact Us</h5>
					<a href='tel:+<?php echo (get_option('qs_contact_phone')); ?>'>
						<?php echo (get_option('qs_contact_phone')); ?>
					</a><br/>
					<a href="/contact-us/request-more-information/">Request More Information</a>
				</div><!-- .col-lg-3 -->
				<div class="col-lg-3">
					<h5>Connect with Us</h5>
					<div class='btn-group'>
						<a class="btn" style='padding: 0' href='<?php echo(get_option('qs_contact_facebook')); ?>' target="_blank"/><img src='<?php echo (get_option('qs_contact_facebook_icon')); ?>' alt='facebook' /></a>
						<!--<a class="btn" style='padding: 0' href='<?php echo (get_option('qs_contact_youtube')); ?>' target="_blank"/><img src='<?php echo (get_option('qs_contact_youtube_icon')); ?>' alt='youtube' /></a>-->
					</div>
				</div><!--.col-lg-3-->	
				<div class="col-lg-3">
					<h5>Service Times</h5>
					<dl>
						<dt>Sunday Morning:</dt>
						<dd>Hour of Power Service: 9:00 AM</dd>
						<dd>Celebration Service: 10:30 AM</dd>
					</dl>
					<a href="/worship-services/">Service Details</a>
				</div>
			</div><!-- .row -->
		</div><!-- #footer-content.container -->
	</footer></div><!-- #footer --> <?php } ?>
</div><!-- #page -->
</div>
<?php wp_footer(); ?>
<script type="text/javascript" src="/wp-content/themes/delandlighthouse-theme/js/respond.min.js"></script>
<?php if (! is_user_logged_in() ) : ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52965997-1', 'auto');
  ga('send', 'pageview');

</script>
<?php endif; ?>
</body>
</html>
