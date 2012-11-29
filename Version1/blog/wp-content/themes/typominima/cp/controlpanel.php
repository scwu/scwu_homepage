<?php
class ControlPanel {
	// Setting up the options
	var $default_settings = Array(
		'cufon' => 1,
		'description' => 1,

		'link_color' => '#ba954f',
		'link_hover_color' => '#dabc83',

		'custom_rss' => 0,
		'custom_rss_url' => '',

		'archive_author_info' => 0,
		'single_author_info' => 1,
		
		'archive_tags' => 0,
		'single_tags' => 1,

		'archive_categories' => 0,
		'single_categories' => 1,

		'archive_comments' => 1,
		'single_comments' => 1,

		'archive_date' => 0,
		'single_date' => 1
	);

	function ControlPanel() {
		add_action('admin_menu', array(&$this, 'admin_menu'));

		if (!is_array(get_option('Typominima')))
			
			add_option('Typominima', $this->default_settings);
			
			$this->options = get_option('Typominima');
	}

	function admin_menu() {
		add_menu_page('Typominima', 'Typominima CP', 'edit_themes', 'Typominima', array(&$this, 'optionsmenu'));
	}

	function optionsmenu() {
		if ($_POST['tm_action'] == 'save') {

			$settings = array('cufon','description','archive_author_info','single_author_info','archive_comments','single_comments','archive_date','single_date','archive_categories','single_categories','archive_tags','single_tags');

			// Interpret the new settings array

			foreach($settings as $setting) {
				if ($_POST['tm_'.$setting] == "on") {
					$this->options[$setting] = 1;
				}

				else { $this->options[$setting] = 0; }
			}

			// Special case for custom RSS feed URL

			if ($_POST['tm_custom_rss'] == "on") {
				$this->options["custom_rss"] = 1;
			}

			else { $this->options["custom_rss"] = 0; }

			if ($_POST['tm_custom_rss_url'] != "") {
				$this->options["custom_rss_url"] = $_POST['tm_custom_rss_url'];
			}

			else { $this->options["custom_rss_url"] = ""; }

			// Special case for custom link colors

			if ($_POST['tm_link_color'] != "") {
				$hashcheck = substr_count($_POST['tm_link_color'], '#');
				$hash = '';
				if ($hashcheck == 0) {
					$hash = '#';
				}
				$this->options["link_color"] = $hash . $_POST['tm_link_color'];
			}

			else { $this->options["link_color"] = "#ba954f"; }

			if ($_POST['tm_link_hover_color'] != "") {
				$hashcheck = substr_count($_POST['tm_link_color'], '#');
				$hash = '';
				if ($hashcheck == 0) {
					$hash = '#';
				}
				$this->options["link_hover_color"] = $hash . $_POST['tm_link_hover_color'];
			}

			else { $this->options["link_hover_color"] = "#dabc83"; }

			// Update the theme's options

			update_option('Typominima', $this->options);
			echo '<div class="wrap updated fade" id="message" style="margin-top:20px;"><p>Settings <strong>saved</strong>.</p></div>';
		}
		?>
		<div class="wrap">
			<script>
			function fieldSwitch(switcher,target) {
				if (document.getElementById(switcher).checked==true) {
					document.getElementById(target).disabled=false;
				}
				else {
					document.getElementById(target).disabled=true;
				}
			}
			</script>
			<h2>Typominima Theme Options</h2>
			<table class="widefat">
				<thead>
					<tr>
						<th scope="col" style="width: 40%">General Information</th>
						<th scope="col">Support the Developer</th>
					</tr>
				</thead>
				<tbody>
					<tr style="background: #e4fded;">
						<td>
						<strong style="color:red;">Info:</strong> This theme is designed and developed by Alex Cristache of <a href="http://blogsessive.com" title="Blogsessive"><strong>Blogsessive</strong></a> &amp; <a href="http://qbkl.net" title="QBKL">QBKL Media</a>. To stay informed on the updates of "Typominima" I strongly recommend <strong>subscribing to <a href="http://feeds2.feedburner.com/Blogsessive" title="Blogsessive's RSS feed" target="_blank">Blogsessive's RSS feed</a></strong> and following <strong><a href="http://twitter.com/Blogsessive" target="_blank" title="Blogsessive's Twitter profile">Blogsessive on Twitter</a></strong>. This theme is provided for FREE as it is and <strong>support will only be given if/when time allows it</strong>.
						</td>
						<td>
						If you enjoy this theme, consider donating an amount of your choice with PayPal.<br />
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-top: 10px;">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
						<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
						">
						</form>
						</td>
					</tr>
				</tbody>
			</table>			
			<form action="" method="post" class="themeform" name="tmForm" id="tmForm">
			<input type="hidden" id="tm_action" name="tm_action" value="save">
			<table class="widefat">
				<thead>
				<tr>
					<th scope="col" style="width: 40%">Typominima Options</th>
					<th scope="col">Settings</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Enable Cuf&#243;n font-replacement?</strong><br /><small>This enables font replacement for the headlines with the beautiful <a href="http://www.fontsquirrel.com/fonts/TypoSlabserif-Light" target="_blank">TypoSlabserif</a> free font.</small></td>
						<td><input type="checkbox" name="tm_cufon" id="tm_cufon" <?php if($this->options["cufon"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_cufon">Yes, I would like to use Cuf&#243;n.</label></td>
					</tr>
					<tr>
						<td><strong>Display blog description under blog title?</strong><br /><small>By default, the description is on, but you can display only the title.</small></td>
						<td><input type="checkbox" name="tm_description" id="tm_description" <?php if($this->options["description"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_description">Yes, display the description too.</label></td>
					</tr>
					<tr>
						<td><strong>Use custom colors for links?</strong><br /><small>Add hexadecimal color codes for links and their mouse over state.</small></td>
						<td>
							<input type="text" name="tm_link_color" id="tm_link_color" <?php if(isset($this->options["link_color"]) && $this->options["link_color"]!="") { echo ' value="'.$this->options["link_color"].'"'; }?> style="width: 80px; margin-top: 5px;" maxlength="7" /> <label for="tm_link_color">Generic link color. This is your <span style="color: <?php echo $this->options["link_color"]; ?>">current link color</span>.</label><br />
							<input type="text" name="tm_link_hover_color" id="tm_link_hover_color" <?php if(isset($this->options["link_hover_color"]) && $this->options["link_hover_color"]!="") { echo ' value="'.$this->options["link_hover_color"].'"'; }?> style="width: 80px; margin: 5px 0;" maxlength="7" /> <label for="tm_link_hover_color">Mouse over link color This is your <span style="color: <?php echo $this->options["link_hover_color"]; ?>">current link mouse over color</span>.</label><br />
							<p>Use <a href="http://www.colorblender.com/" target="_blank">http://www.colorblender.com/</a> or <a href="http://www.colorpicker.com/" target="_blank">http://www.colorpicker.com/</a> for a better matching set of colors.<br />Clear fields and press "Update" to revert to original colors.</p>
						</td>
					</tr>
					<tr>
						<td><strong>Use a custom feed URL?</strong><br /><small>Some bloggers use services as FeedBurner for RSS distribution.<br />Leave this box unchecked to use WordPress' default RSS URL.</small></td>
						<td><input type="checkbox" name="tm_custom_rss" id="tm_custom_rss" <?php if($this->options["custom_rss"] == 1) { echo " checked"; } ?> onClick="fieldSwitch('tm_custom_rss','tm_custom_rss_url');" /><label style="margin-left: 5px;" for="tm_custom_rss">Yes, I have a custom feed URL.</label><br /><input type="text" name="tm_custom_rss_url" id="tm_custom_rss_url" <?php if(isset($this->options["custom_rss_url"]) && $this->options["custom_rss_url"]!="") { echo ' value="'.$this->options["custom_rss_url"].'"'; }?> style="width: 70%; margin-top: 5px;" <?php if($this->options["custom_rss"] == 0) { echo " disabled"; } ?> /></td>
					</tr>
					<tr>
						<td><strong>Display publish date?</strong><br /><small>Will include publishing date to the right of the post.</small></td>
						<td>
							<input type="checkbox" name="tm_archive_date" id="tm_archive_date" <?php if($this->options["archive_date"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_archive_date">Display on archive pages (homepage too)</label>
							<input type="checkbox" name="tm_single_date" id="tm_single_date" <?php if($this->options["single_date"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_single_date">Display on single post pages</label>
						</td>
					</tr>
					<tr>
						<td><strong>Display comment count?</strong><br /><small>Will include comment count to the right of the post.</small></td>
						<td>
							<input type="checkbox" name="tm_archive_comments" id="tm_archive_comments" <?php if($this->options["archive_comments"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_archive_comments">Display on archive pages (homepage too)</label>
							<input type="checkbox" name="tm_single_comments" id="tm_single_comments" <?php if($this->options["single_comments"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_single_comments">Display on single post pages</label>
						</td>
					</tr>
					<tr>
						<td><strong>Display post's categories?</strong><br /><small>Will include the curent post's category list to the right of the post.</small></td>
						<td>
							<input type="checkbox" name="tm_archive_categories" id="tm_archive_categories" <?php if($this->options["archive_categories"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_archive_categories">Display on archive pages (homepage too)</label>
							<input type="checkbox" name="tm_single_categories" id="tm_single_categories" <?php if($this->options["single_categories"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_single_categories">Display on single post pages</label>
						</td>
					</tr>
					<tr>
						<td><strong>Display post's tags?</strong><br /><small>Will include the curent post's tag list to the right of the post.</small></td>
						<td>
							<input type="checkbox" name="tm_archive_tags" id="tm_archive_tags" <?php if($this->options["archive_tags"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_archive_tags">Display on archive pages (homepage too)</label>
							<input type="checkbox" name="tm_single_tags" id="tm_single_tags" <?php if($this->options["single_tags"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_single_tags">Display on single post pages</label>
						</td>
					</tr>
					<tr>
						<td><strong>Display author info?</strong><br /><small>Will include the curent post's author info to the right of the post.</small></td>
						<td>
							<input type="checkbox" name="tm_archive_author_info" id="tm_archive_author_info" <?php if($this->options["archive_author_info"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_archive_author_info">Display on archive pages (homepage too)</label>
							<input type="checkbox" name="tm_single_author_info" id="tm_single_author_info" <?php if($this->options["single_author_info"] == 1) { echo " checked"; } ?> /><label style="margin-left: 5px;" for="tm_single_author_info">Display on single post pages</label>
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit" style="text-align: right; border: none; margin: 0 0 20px 0;"><input type="submit" value="Update Typominima" name="tm_save" /></p>
			</form>
		</div>
		<?php
	}
}
?>