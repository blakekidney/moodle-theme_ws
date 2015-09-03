<?php
/**
 * The two column layout.
 *
 * @package   theme_ws
 * @copyright 2015 Western Seminary
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$left = (!right_to_left());  // To know if to add 'pull-right' and 'desktop-first-column' classes in the layout for LTR.
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
			<section id="region-main" class="span9<?php if ($left) { echo ' pull-right'; } ?>">
				<?php
				echo $OUTPUT->course_content_header();
				echo $OUTPUT->main_content();
				echo $OUTPUT->course_content_footer();
				?>
			</section>
			<?php
			$classextra = '';
			if ($left) {
				$classextra = ' desktop-first-column';
			}
			echo $OUTPUT->blocks('side-pre', 'span3'.$classextra);
			?>
		</div>

		<?php echo theme_ws_html_footer($OUTPUT, $PAGE); ?>

	</div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
