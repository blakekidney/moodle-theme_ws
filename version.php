<?php
/**
 * WS theme for Moodle based upon the clean theme.
 *
 * @package   theme_ws
 * @copyright 2015 Western Seminary
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$plugin->version   = 2015030100;
$plugin->requires  = 2014110400;
$plugin->component = 'theme_ws';
$plugin->dependencies = array(
    'theme_bootstrapbase'  => 2014110400,
);
