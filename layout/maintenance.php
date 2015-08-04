<?php
/**
 * The maintenance layout.
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
	<div id="page" class="container-fluid">

		<div id="page-content" class="row-fluid">
			<section id="region-main" class="span12">
				<?php echo $OUTPUT->main_content(); ?>
			</section>
		</div>
		<?php echo $OUTPUT->standard_end_of_body_html() ?>

	</div>
</div>

<footer id="page-footer">
	<?php
	echo $OUTPUT->standard_footer_html();
	?>
</footer>

</body>
</html>
