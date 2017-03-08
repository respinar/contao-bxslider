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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['bxslider']   = '{title_legend},name,headline,type;{bx_slider_legend},bx_slider;{template_legend},bx_slide_template,customTpl,imgSize;{bx_options_legend},bx_mode,bx_speed,bx_slideMargin,bx_startSlide,bx_infiniteLoop,bx_responsive,bx_captions,bx_randomStart,bx_video,bx_hideControlOnEnd,bx_useCSS,bx_oneToOneTouch,bx_easing,bx_preloadImages,bx_ticker,bx_adaptiveHeight,bx_touchEnabled,bx_preventDefaultSwipeX,bx_preventDefaultSwipeY;{bx_pager_legend},bx_pager;{bx_controls_legend},bx_controls,bx_autoControls;{bx_auto_legend},bx_auto;{bx_carousel_legend:hide},bx_minSlides,bx_maxSlides,bx_moveSlides,bx_slideWidth;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'bx_pager';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['bx_pager'] = 'bx_pagerType,bx_pagerShortSeparator';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'bx_ticker';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['bx_ticker'] = 'bx_tickerHover';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'bx_adaptiveHeight';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['bx_adaptiveHeight'] = 'bx_adaptiveHeightSpeed';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'bx_touchEnabled';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['bx_touchEnabled'] = 'bx_swipeThreshold';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'bx_controls';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['bx_controls'] = 'bx_nextText,bx_prevText';


$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'bx_autoControls';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['bx_autoControls'] = 'bx_startText,bx_stopText,bx_autoControlsCombine,';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'bx_auto';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['bx_auto'] = 'bx_autoDirection,bx_autoStart,bx_autoHover,bx_pause,bx_autoDelay';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['bx_slider'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['bx_slider'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_bxslider.title',
	'eval'                 => array('multiple'=>false, 'mandatory'=>true),
	'sql'				   => "int(10) unsigned NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_slide_template'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['bx_slide_template'],
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => array('tl_module_bxslider', 'getSlideTemplates'),
	'eval'				   => array('tl_class'=>'w50 clr'),
	'sql'				   => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_mode'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_mode'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'                 => 'horizontal',
	'options'                 => array('horizontal','vertical','fade'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_speed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_speed'],
	'exclude'                 => true,
	'default'                 => 500,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_slideMargin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_slideMargin'],
	'exclude'                 => true,
	'default'                 => 0,
	'inputType'               => 'text',	
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_startSlide'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_startSlide'],
	'exclude'                 => true,
	'default'                 => 0,
	'inputType'               => 'text',	
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_randomStart'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_randomStart'],
	'exclude'                 => true,
	'default'                 => false,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_infiniteLoop'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_infiniteLoop'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_hideControlOnEnd'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_hideControlOnEnd'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_easing'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_easing'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('linear', 'swing', 'ease-in', 'ease-out', 'ease-in-out', 'cubic-bezier(n,n,n,n)'),
	'eval'                    => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_captions'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_captions'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_ticker'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_ticker'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr', 'submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_tickerHover'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_tickerHover'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['bx_adaptiveHeight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_adaptiveHeight'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr m12', 'submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['bx_adaptiveHeightSpeed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_adaptiveHeightSpeed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'default'                 => 500,
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_video'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_video'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_responsive'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_responsive'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',	
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_useCSS'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_useCSS'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_preloadImages'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_preloadImages'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'                 => 'visible',
	'options'                 => array('all', 'visible'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_touchEnabled'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_touchEnabled'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr m12', 'submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_swipeThreshold'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_swipeThreshold'],
	'exclude'                 => true,
	'default'                 => 50,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_oneToOneTouch'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_oneToOneTouch'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_preventDefaultSwipeX'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_preventDefaultSwipeX'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_preventDefaultSwipeY'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_preventDefaultSwipeY'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);


/* Pager */

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_pager'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_pager'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_pagerType'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_pagerType'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'                 => 'full',
	'options'                 => array('full', 'short'),
	'eval'                    => array('tl_class'=>'w50 clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_pagerShortSeparator'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_pagerShortSeparator'],
	'exclude'                 => true,
	'search'                  => true,
	'default'                 => ' / ',
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

/* Controls */

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_controls'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_controls'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_nextText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_nextText'],
	'exclude'                 => true,
	'search'                  => true,
	'default'                 => 'Next',
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_prevText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_prevText'],
	'exclude'                 => true,
	'search'                  => true,
	'default'                 => 'Prev',
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_autoControls'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_autoControls'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr','submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_startText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_startText'],
	'exclude'                 => true,
	'search'                  => true,
	'default'                 => 'Start',
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_stopText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_prevText'],
	'exclude'                 => true,
	'search'                  => true,
	'default'                 => 'Stop',
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_autoControlsCombine'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_autoControlsCombine'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

/* Auto */

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_auto'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_auto'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_pause'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_pause'],
	'exclude'                 => true,
	'default'                 => 4000,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_autoStart'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_autoStart'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_autoDirection'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_autoDirection'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'                 => 'next',
	'options'                 => array('next', 'prev'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_autoStart'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_autoStart'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_autoHover'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_autoHover'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_autoDelay'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_autoDelay'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

/* Carousel */

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_minSlides'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_minSlides'],
	'exclude'                 => true,
	'default'                 => 1,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_maxSlides'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_maxSlides'],
	'exclude'                 => true,
	'default'                 => 1,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bx_moveSlides'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_moveSlides'],
	'exclude'                 => true,
	'default'                 => 0,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['bx_slideWidth'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['bx_slideWidth'],
	'exclude'                 => true,
	'default'                 => 0,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
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
