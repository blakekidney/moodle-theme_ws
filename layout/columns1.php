<?php
/**
 * The one column layout.
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
<?php echo theme_ws_html_header($OUTPUT, $PAGE); ?>
<?php echo theme_ws_html_breadcrumbs($OUTPUT, $PAGE); ?>

<div class="page-frame">
	<div id="page" class="container-fluid">

		<header id="page-header" class="clearfix">
			<div id="course-header">
				<?php echo $OUTPUT->course_header(); ?>
			</div>
		</header>

		<div id="page-content" class="row-fluid">
			<section id="region-main" class="span12">
				<?php
				echo $OUTPUT->course_content_header();
				echo $OUTPUT->main_content();
				echo $OUTPUT->course_content_footer();
				?>
			</section>
		</div>

		<?php echo $OUTPUT->standard_end_of_body_html() ?>

	</div>
</div>
<?php echo theme_ws_html_footer($OUTPUT, $PAGE); ?>
</body>
</html>
