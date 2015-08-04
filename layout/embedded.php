<?php
/**
 * The embedded layout.
 *
 * @package   theme_ws
 * @copyright 2015 Western Seminary
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<?php echo theme_ws_html_head($OUTPUT, $PAGE); ?>

<body <?php echo $OUTPUT->body_attributes(); ?>>
<?php echo $OUTPUT->standard_top_of_body_html() ?>
<div class="page-frame">
	<div id="page">
		<div id="page-content" class="clearfix">
			<?php echo $OUTPUT->main_content(); ?>
		</div>
	</div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>