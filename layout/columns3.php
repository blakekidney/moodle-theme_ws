<?php
/**
 * Moodle's Clean theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_ws
 * @copyright 2015 Western Seminary
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if(right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
} else {
    $regionbsid = 'region-bs-main-and-pre';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<?php echo theme_ws_html_head($OUTPUT, $PAGE); ?>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>
<?php echo theme_ws_html_header($OUTPUT, $PAGE); ?>
<?php echo theme_ws_html_breadcrumbs($OUTPUT, $PAGE); ?>

<div class="page-frame">
	<div id="page" class="container-fluid">
		<div id="page-content" class="row-fluid">
			<div id="<?php echo $regionbsid ?>" class="span9">
				<div class="row-fluid">
					<section id="region-main" class="span8 pull-right">
						<?php
						echo $OUTPUT->course_content_header();
						echo $OUTPUT->main_content();
						echo $OUTPUT->course_content_footer();
						?>
					</section>
					<?php echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column'); ?>
				</div>
			</div>
			<?php echo $OUTPUT->blocks('side-post', 'span3'); ?>
		</div>

		<?php echo $OUTPUT->standard_end_of_body_html() ?>

	</div>
</div>
<?php echo theme_ws_html_footer($OUTPUT, $PAGE); ?>
</body>
</html>
