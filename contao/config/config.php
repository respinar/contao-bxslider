<?php

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Peywasti 2023 <abbaszadeh.h@gmail.com>
 *
 * @license MIT
 */

use Respinar\BxsliderBundle\Model\BxsliderModel;

$GLOBALS['BE_MOD']['system']['bxslider'] = array (
		'tables' => array('tl_bxslider')
);

/**
 * Register models
 */
$GLOBALS['TL_MODELS']['tl_bxslider'] = BxsliderModel::class;
