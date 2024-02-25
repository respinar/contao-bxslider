<?php

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid@respinar.com>
 *
 * @license MIT
 */

use Contao\System;
use Contao\Controller;
use Contao\BackendUser;

/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['bxslider'] = '
	{title_legend},type,headline;
	{images_legend},bxSlider_items;
	{bx_slider_legend},bxSlider,bxSlider_thumbnail;
	{template_legend},bxSlider_template,customTpl,size,bxSlider_thumbnailSize;
	{protected_legend:hide},protected;
	{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['bxSlider'] = [
	'exclude' => true,
	'inputType' => 'select',
	'foreignKey' => 'tl_bxslider.title',
	'eval' => ['multiple' => false, 'includeBlankOption' => true, 'tl_class' => 'w50'],
	'sql' => "int(10) unsigned NOT NULL default 0",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bxSlider_template'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options_callback' => static function () {
		return Controller::getTemplateGroup('bxslider_');
	},
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bxSlider_items'] = [
	'exclude' => true,
	'inputType' => 'fileTree',
	'eval' => ['multiple' => true, 'isGallery' => true, 'extensions' => '%contao.image.valid_extensions%', 'fieldType' => 'checkbox', 'orderField' => 'orderSRC', 'files' => true],
	'sql' => "blob NULL",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bxSlider_thumbnail'] = [
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => ['tl_class' => 'w50 m12'],
	'sql' => "char(1) COLLATE ascii_bin NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bxSlider_thumbnailSize'] = [
	'exclude' => true,
	'inputType' => 'imageSize',
	'reference' => &$GLOBALS['TL_LANG']['MSC'],
	'options_callback' => function () {
		return System::getContainer()->get('contao.image.sizes')->getOptionsForUser(BackendUser::getInstance());
	},
	'eval' => ['rgxp' => 'natural', 'includeBlankOption' => true, 'nospace' => true, 'helpwizard' => true, 'tl_class' => 'w50'],
	'sql' => "varchar(128) COLLATE ascii_bin NOT NULL default ''"
];