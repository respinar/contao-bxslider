<?php

/**
 * bxslider Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */

$GLOBALS['BE_MOD']['content']['bxslider'] = array (
		'tables' => array('tl_bxslider', 'tl_bxslider_slide')
);

/**
 * Register models
 */
 $GLOBALS['TL_MODELS']['tl_bxslider']       = 'Respinar\BxsliderBundle\Model\BxsliderModel';
 $GLOBALS['TL_MODELS']['tl_bxslider_slide'] = 'Respinar\BxsliderBundle\Model\BxsliderSlideModel';