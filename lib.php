<?php
/**
 * WS theme for Moodle based upon the clean theme.
 *
 * @package   theme_ws
 * @copyright 2015 Western Seminary
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/**
 * Parses CSS before it is cached.
 *
 * This function can make alterations and replace patterns within the CSS.
 *
 * @param string $css The CSS
 * @param theme_config $theme The theme config object.
 * @return string The parsed CSS The parsed CSS.
 */
function theme_ws_process_css($css, $theme) {

    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_ws_set_logo($css, $logo);

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_ws_set_customcss($css, $customcss);

    return $css;
}
/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */
function theme_ws_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Adds the logo to CSS.
 *
 * @param string $css The CSS.
 * @param string $logo The URL of the logo.
 * @return string The parsed CSS
 */
function theme_ws_set_logo($css, $logo) {
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}
 /**
 * Returns the html for the <head> of the document.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return string The html.
 */
function theme_ws_html_head(renderer_base $output, moodle_page $page) {
	return '
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$output->page_title().'</title>
    <link rel="shortcut icon" href="'.$output->favicon().'" />
    '.$output->standard_head_html().'
</head>
';
}
/**
 * Returns the html for the <header> of the document.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return string The html.
 */
function theme_ws_html_header(renderer_base $output, moodle_page $page) {
	global $CFG;
	
	//if the sitetitle hasn't been set, then set to the default
	if(empty($page->theme->settings->sitetitle)) $page->theme->settings->sitetitle = get_string('sitetitledefault', 'theme_ws');
	
	//save a css class to indicate whether there is a logo image or not
	$logoimg = 'no-logo-img';
	
	//if a logo file has been specified, then use it
	if(!empty($page->theme->settings->logo)) {
		$src = $page->theme->setting_file_url('logo', 'logo');
		$brand = '<img alt="'.$page->theme->settings->sitetitle.'" src="'.$src.'">';
		$logoimg = 'logo-img';
	
	//if no logo file is specified, then use the site title
	} else {
		$brand = '<span class="site-title">'.$page->theme->settings->sitetitle.'</span>';
	}	
	
	return '
	<header role="banner" class="navbar navbar-static-top moodle-has-zindex'.
	(!empty($page->theme->settings->sitesubtitle) ? ' hassubtitle' : '').'">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid '.$logoimg.'">
			<a class="brand" href="'.$CFG->wwwroot.'">
				'.$brand.'
			</a>
			'.(!empty($page->theme->settings->sitesubtitle) ? 
			'<span class="sitesubtitle">'.$page->theme->settings->sitesubtitle.'</span>' : '').'
			'.(!empty($page->theme->settings->helpurl) ? 
			'<a class="helpbtn" title="help" href="'.$page->theme->settings->helpurl.'" target="_blank"><span>?</span></a>' : '').'
			'.($output->custom_menu() || $output->page_heading_menu() ? 
            '<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>' : '').
            $output->user_menu().'
            <div class="nav-collapse collapse">
                '.$output->custom_menu().'
                <ul class="nav pull-right">
                    <li>'.$output->page_heading_menu().'</li>
                </ul>
            </div>
        </div>
    </nav>
</header>
';
}
/**
 * Returns the html for the breadcrumbs band.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return string The html.
 */
function theme_ws_html_breadcrumbs(renderer_base $output, moodle_page $page) {
	return '
	<div id="breadcrumbs" class="band clearfix">
		<div class="band-inner">
			<nav class="breadcrumb-nav">
				'.$output->navbar().'
			</nav>
			<div class="breadcrumb-btn">
				'.$output->page_heading_button().'
			</div>
		</div>
	</div>';
}

/**
 * Returns the html for the <footer> of the document.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return string The html.
 */
function theme_ws_html_footer(renderer_base $output, moodle_page $page) {
	global $CFG;
	return '
	<footer id="page-footer">
		<div id="course-footer">'.$output->course_footer().'</div>
		<p class="helplink">'.$output->page_doc_link().'</p>
		'.$output->login_info().'
		'.$output->home_link().'
		'.$output->standard_footer_html().'
	</footer>
';
}
/**
 * Runs when the page initializes.
 *
 * @param moodle_page $page Pass in $PAGE.
 * @return void
 */
function theme_ws_page_init(moodle_page $page) {
    $page->requires->jquery();
}
/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_ws_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
	if($context->contextlevel == CONTEXT_SYSTEM and $filearea === 'logo') {
        $theme = theme_config::load('ws');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }
        return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}

class Utils {
	/**
	 * Echos a print_r surrounded by a <pre> tag.
	 * 
	 * @param  mixed  $obj  Any variable to echo.
	 * @param  boolean  $returnString  (optional) Indicates whether to return the string or echo it.
	 * 
	 * @return  void|string  If specified, will return a string of the print_r.
	 */
	public static function preprint($obj, $returnString=false) {
		if(!$returnString) {
			echo '<pre>';
			print_r($obj);
			echo  '</pre>';
		} else {
			return '<pre>'.print_r($obj, true).'</pre>';
		}
	}
}
