<?php

/**
 * bxSlider Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'bxSlider'
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'bxSlider\ModulebxSlider'     => 'system/modules/bxslider/modules/ModulebxSlider.php',

	// Models
	'bxSlider\bxSliderModel'      => 'system/modules/bxslider/models/bxSliderModel.php',
	'bxSlider\bxSliderSlideModel' => 'system/modules/bxslider/models/bxSliderSlideModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_bxslider'   => 'system/modules/bxslider/templates/module',
	'bxslider_slide' => 'system/modules/bxslider/templates/slide',
));
