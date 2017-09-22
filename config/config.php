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
 * Register models
 */
 $GLOBALS['TL_MODELS']['tl_bxslider']       = 'Respinar\BxSlider\Model\BxSliderModel';
 $GLOBALS['TL_MODELS']['tl_bxslider_slide'] = 'Respinar\BxSlider\Model\BxSliderSlideModel'; 

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['miscellaneous']['bxslider']   = 'Respinar\BxSlider\Frontend\Module\ModuleBxSlider';

/**
 * Front end modules
 */
$GLOBALS['TL_CTE']['miscellaneous']['bxslider']   = 'Respinar\BxSlider\Frontend\Element\ContentBxSlider';