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
 * Register PSR-0 namespaces
 */
if (class_exists('NamespaceClassLoader')) {
   // NamespaceClassLoader::add('Respinar\bxSlider', 'system/modules/bxslider/library');
}


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_bxslider'   => 'system/modules/bxslider/templates/modules',
	'ce_bxslider'    => 'system/modules/bxslider/templates/elements',
	'bxslider_slide' => 'system/modules/bxslider/templates/slide',
));
