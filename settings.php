<?php
/**
 * Administration settings.
 *
 * @package   theme_ws
 * @copyright 2015 Western Seminary
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if($ADMIN->fulltree) {
	
	// Site Title.
    $name = 'theme_ws/sitetitle';
    $title = get_string('sitetitle','theme_ws');
    $description = get_string('sitetitledesc', 'theme_ws');
	$default = get_string('sitetitledefault', 'theme_ws');
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_CLEAN, 60);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
	
	// Site Subtitle.
    $name = 'theme_ws/sitesubtitle';
    $title = get_string('sitesubtitle','theme_ws');
    $description = get_string('sitesubtitledesc', 'theme_ws');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_CLEAN, 60);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
	
    // Logo file setting.
    $name = 'theme_ws/logo';
    $title = get_string('logo','theme_ws');
    $description = get_string('logodesc', 'theme_ws');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
	
	// Help Url.
    $name = 'theme_ws/helpurl';
    $title = get_string('helpurl','theme_ws');
    $description = get_string('helpurldesc', 'theme_ws');
	$default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_ws/customcss';
    $title = get_string('customcss', 'theme_ws');
    $description = get_string('customcssdesc', 'theme_ws');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
	
}
