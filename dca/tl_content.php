<?php

/**
 * bxslider Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */

/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['bxslider']   = '{title_legend},name,headline,type;{bx_slider_legend},bx_slider;{template_legend},bx_slide_template,customTpl,size;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['bx_slider'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['bx_slider'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_bxslider.title',
	'eval'                 => array('multiple'=>false, 'mandatory'=>true),
	'sql'				   => "int(10) unsigned NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['bx_slide_template'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['bx_slide_template'],
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => array('tl_content_bxslider', 'getSlideTemplates'),
	'eval'				   => array('tl_class'=>'w50 clr'),
	'sql'				   => "varchar(64) NOT NULL default ''",
);

/**
 * Class tl_content_bxslider
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_content_bxslider extends Backend
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
