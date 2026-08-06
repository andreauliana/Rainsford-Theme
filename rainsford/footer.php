<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rainsford
 */

?>
<!-- CONTACT — not editable, fixed content -->
<footer>
	<section id="contact" class="contact">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="footer-grid">
						<div class="footer-logo">
							<img width="250" src="<?php echo esc_url( get_template_directory_uri() . '/inc/rainsford-logo-alt.svg' ); ?>" alt="Rainsford Developments">
						</div>
						<div class="footer-content">
							<h5>CONTACT</h5>
							<h3>Get in touch. Let&rsquo;s unlock opportunity.</h3>
							<div class='content'>
								<div><i><img src="<?php echo esc_url( get_template_directory_uri() . '/inc/ico-loc.svg' ); ?>"></i><a href="https://maps.app.goo.gl/XpAaUjFBAxqgEe7K6">51 Moorgate</a>
								</div>
								<div class="contact-detail no-icon"><a href="https://maps.app.goo.gl/XpAaUjFBAxqgEe7K6">London, EC2R 6BH</a></div>
								<div class="contact-detail"><i><img src="<?php echo esc_url( get_template_directory_uri() . '/inc/ico-mail.svg' ); ?>"></i><a title="contact Rainsford" href="mailto:info@rainsford.co.uk">info@rainsford.co.uk</a></div>
								<div class="contact-detail"><i><img src="<?php echo esc_url( get_template_directory_uri() . '/inc/ico-tel.svg' ); ?>"></i><a href="">020 8153 0466</a></div>
							</div>
							<div class="widescreen sub-content">
								<h6><a href="/privacy-policy">PRIVACY POLICY</a></h6>
								<h6>&copy; RAINSFORD DEVELOPMENTS</h6>
							</div>
						</div>
					</div>
					<hr class="footer-divider">
					<div class="footer-bottom">
						<h6><a href="/privacy-policy">PRIVACY POLICY</a></h6>
						<h6>&copy; RAINSFORD DEVELOPMENTS</h6>
					</div>
				</div>
			</div>
		</div>
	</section>
</footer>
</div><!-- #page -->
<a href="#page" id="back-to-top" aria-label="Back to top">
	<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
		<path d="M12 19V5M5 12l7-7 7 7"/>
	</svg>
</a>
<script type="text/javascript">
	(function () {
	var btn = document.getElementById('back-to-top');
	if (!btn) return;
	var THRESHOLD = 1000;
	function toggle() {
		btn.classList.toggle('is-visible', window.scrollY > THRESHOLD);
	}
	window.addEventListener('scroll', toggle, { passive: true });
	toggle();

	btn.addEventListener('click', function (e) {
		e.preventDefault();
		window.scrollTo({ top: 0, behavior: 'smooth' });
	});
})();
</script>
<?php wp_footer(); ?>
</body>
</html>