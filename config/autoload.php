<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Respinar\BxSlider',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Library
	'Respinar\BxSlider\ContentBxSlider'    => 'system/modules/bxslider/library/Respinar/BxSlider/Frontend/Element/ContentBxSlider.php',
	'Respinar\BxSlider\ModuleBxSlider'     => 'system/modules/bxslider/library/Respinar/BxSlider/Frontend/Module/ModuleBxSlider.php',
	'Respinar\BxSlider\BxSlider'           => 'system/modules/bxslider/library/Respinar/BxSlider/Frontend/BxSlider.php',
	'Respinar\BxSlider\BxSliderModel'      => 'system/modules/bxslider/library/Respinar/BxSlider/Model/BxSliderModel.php',
	'Respinar\BxSlider\BxSliderSlideModel' => 'system/modules/bxslider/library/Respinar/BxSlider/Model/BxSliderSlideModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'bxslider_slide' => 'system/modules/bxslider/templates/slide',
	'ce_bxslider'    => 'system/modules/bxslider/templates/elements',
	'mod_bxslider'   => 'system/modules/bxslider/templates/modules',
));
