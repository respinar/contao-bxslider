<?php

/**
 * bxslider Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */

use Respinar\BxsliderBundle\Model\BxsliderModel;

$GLOBALS['BE_MOD']['system']['bxslider'] = array (
		'tables' => array('tl_bxslider')
);

/**
 * Register models
 */
$GLOBALS['TL_MODELS']['tl_bxslider'] = BxsliderModel::class; 
