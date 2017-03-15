<?php

/**
 * bxslider Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */

 array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'bxslider' => array
	(
		'tables' => array('tl_bxslider', 'tl_bxslider_slide'),
		'icon'   => 'system/modules/bxslider/assets/bxSlider.svg'
	)
));

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['miscellaneous']['bxslider']   = 'Respinar\BxSlider\ModuleBxSlider';

/**
 * Front end modules
 */
$GLOBALS['TL_CTE']['miscellaneous']['bxslider']   = 'Respinar\BxSlider\ContentBxSlider';