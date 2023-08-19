<?php

/**
 * bxslider Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */

use Contao\Backend;
use Contao\Controller;
use Contao\System;
use Contao\BackendUser;

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['bxslider']   = '
	{title_legend},name,headline,type;
	{bx_slider_legend},bx_slider,bxSlider_thumbnail;
	{template_legend},bx_slide_template,customTpl,imgSize,bxSlider_thumbnailSize;
	{protected_legend:hide},protected;
	{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['bx_slider'] = array
(
	'exclude'              => true,
	'inputType'            => 'select',
	'foreignKey'           => 'tl_bxslider.title',
	'eval'                 => array('multiple'=>false, 'mandatory'=>true),
	'sql'				   => "int(10) unsigned NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_slide_template'] = array
(
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => static function ()
	{
		return Controller::getTemplateGroup('bxslider_');
	},
	'eval'				   => array('tl_class'=>'w50 clr'),
	'sql'				   => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bxSlider_thumbnail'] = array
(
	'exclude'          => true,
	'inputType'        => 'checkbox',
	'eval'             => array('tl_class'=>'w50 m12'),
	'sql'              => "char(1) COLLATE ascii_bin NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bxSlider_thumbnailSize'] = array
(
	'exclude'                 => true,
	'inputType'               => 'imageSize',
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'options_callback' => function () {
		return System::getContainer()->get('contao.image.image_sizes')->getOptionsForUser(BackendUser::getInstance());
	},
	'eval'                    => array('rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(128) COLLATE ascii_bin NOT NULL default ''"
);

/**
 * Class tl_module_bxslider
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_module_bxslider extends Backend
{
	/**
	 * Return all news templates as array
	 *
	 * @return array
	 */
	public function getSlideTemplates()
	{
		return $this->getTemplateGroup('bxslider_');
	}
}
