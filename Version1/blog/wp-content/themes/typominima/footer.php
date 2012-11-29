		<!-- Start: Widget area -->
		<div class="widget-area">
			<div class="widgets-wrap">
				<div id="widget-box-1" class="footer-widget-box">
					<ul>
						<?php dynamic_sidebar('Widget-box Left'); ?>
					</ul>
				</div>

				<div id="widget-box-2" class="footer-widget-box">
					<ul>
						<?php dynamic_sidebar('Widget-box Center'); ?>
					</ul>
				</div>

				<div id="widget-box-3" class="footer-widget-box">
					<ul>
						<?php dynamic_sidebar('Widget-box Right'); ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- End: Widget area -->

		<!-- Start: Footer -->
		<div id="footer">
			<div class="left">&copy;<?php echo date('Y'); ?> Copyright by <?php bloginfo('name'); ?><br />All rights reserved</div>
			<div class="right"><a href="http://blogsessive.com/blogging-tools/typominima-typography-minimal-wordpress-theme/" title="Typominima WordPress Theme" target="_blank">Typominima</a> theme by <a href="http://qbkl.net" target="_blank" title="Blog design studio">QBKL</a> &amp; <a href="http://blogsessive.com" target="_blank" title="Blog tips">Blogsessive</a><br />Built with <a href="http://cufon.shoqolate.com/" target="_blank">Cuf&#243;n</a> &amp; <a href="http://www.fontsquirrel.com/fonts/TypoSlabserif-Light" target="_blank">TypoSlabserif</a></div>
			<div class="clear"></div>
		</div>
		<!-- End: Footer -->

	</div>
<?php wp_footer(); ?>
</body>
</html>