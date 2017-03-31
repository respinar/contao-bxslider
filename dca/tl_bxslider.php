<?php

/**
 * bxSlider Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */


/**
 * Table tl_bxslider
 */
$GLOBALS['TL_DCA']['tl_bxslider'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_bxslider_slide'),
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bxslider']['edit'],
				'href'                => 'table=tl_bxslider_slide',
				'icon'                => 'edit.gif'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bxslider']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bxslider']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bxslider']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bxslider']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Select
	'select' => array
	(
		'buttons_callback' => array()
	),

	// Edit
	'edit' => array
	(
		'buttons_callback' => array()
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('protected','bx_pager','bx_ticker','bx_adaptiveHeight','bx_touchEnabled','bx_controls','bx_autoControls','bx_auto'),
		'default'                     => '{title_legend},title;{bx_options_legend},bx_mode,bx_speed,bx_slideMargin,bx_startSlide,bx_infiniteLoop,bx_responsive,bx_captions,bx_randomStart,bx_video,bx_hideControlOnEnd,bx_useCSS,bx_oneToOneTouch,bx_easing,bx_preloadImages,bx_ticker,bx_adaptiveHeight,bx_touchEnabled,bx_preventDefaultSwipeX,bx_preventDefaultSwipeY;{bx_pager_legend},bx_pager;{bx_controls_legend},bx_controls,bx_autoControls;{bx_auto_legend},bx_auto;{bx_carousel_legend:hide},bx_minSlides,bx_maxSlides,bx_moveSlides,bx_slideWidth;{protected_legend:hide},protected;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'protected'                   => 'groups',
        'bx_pager'                    => 'bx_pagerType,bx_pagerShortSeparator',
        'bx_ticker'                   => 'bx_tickerHover',
        'bx_adaptiveHeight'           => 'bx_adaptiveHeightSpeed',
        'bx_touchEnabled'             => 'bx_swipeThreshold',
        'bx_controls'                 => 'bx_nextText,bx_prevText',
        'bx_autoControls'             => 'bx_startText,bx_stopText,bx_autoControlsCombine,',
        'bx_auto'                     => 'bx_autoDirection,bx_autoStart,bx_autoHover,bx_pause,bx_autoDelay',
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'bx_mode' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_mode'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'horizontal',
			'options'                 => array('horizontal','vertical','fade'),
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_speed' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_speed'],
			'exclude'                 => true,
			'default'                 => 500,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'bx_slideMargin' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_slideMargin'],
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',	
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'bx_startSlide' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_startSlide'],
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',	
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'bx_randomStart' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_randomStart'],
			'exclude'                 => true,
			'default'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_infiniteLoop' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_infiniteLoop'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_hideControlOnEnd' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_hideControlOnEnd'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_easing' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_easing'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('linear', 'swing', 'ease-in', 'ease-out', 'ease-in-out', 'cubic-bezier(n,n,n,n)'),
			'eval'                    => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_captions' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_captions'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_ticker' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_ticker'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr', 'submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_tickerHover' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_tickerHover'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'bx_adaptiveHeight' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_adaptiveHeight'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr m12', 'submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'bx_adaptiveHeightSpeed' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_adaptiveHeightSpeed'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'default'                 => 500,
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'bx_video' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_video'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_responsive' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_responsive'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',	
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_useCSS' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_useCSS'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_preloadImages' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_preloadImages'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'visible',
			'options'                 => array('all', 'visible'),
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_touchEnabled' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_touchEnabled'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr m12', 'submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_swipeThreshold' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_swipeThreshold'],
			'exclude'                 => true,
			'default'                 => 50,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'bx_oneToOneTouch' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_oneToOneTouch'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_preventDefaultSwipeX' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_preventDefaultSwipeX'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_preventDefaultSwipeY' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_preventDefaultSwipeY'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),


		/* Pager */

		'bx_pager' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_pager'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_pagerType' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_pagerType'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'full',
			'options'                 => array('full', 'short'),
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_pagerShortSeparator' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_pagerShortSeparator'],
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => ' / ',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		/* Controls */

		'bx_controls' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_controls'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_nextText' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_nextText'],
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Next',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_prevText' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_prevText'],
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Prev',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_autoControls' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_autoControls'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_startText' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_startText'],
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Start',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_stopText' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_prevText'],
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Stop',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_autoControlsCombine' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_autoControlsCombine'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		/* Auto */

		'bx_auto' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_auto'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_pause' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_pause'],
			'exclude'                 => true,
			'default'                 => 4000,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'bx_autoStart' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_autoStart'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_autoDirection' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_autoDirection'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'next',
			'options'                 => array('next', 'prev'),
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'bx_autoStart' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_autoStart'],
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_autoHover' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_autoHover'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'bx_autoDelay' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_autoDelay'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		/* Carousel */

		'bx_minSlides' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_minSlides'],
			'exclude'                 => true,
			'default'                 => 1,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'bx_maxSlides' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_maxSlides'],
			'exclude'                 => true,
			'default'                 => 1,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'bx_moveSlides' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_moveSlides'],
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),
		'bx_slideWidth' =>  array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['bx_slideWidth'],
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),
		'protected' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['protected'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bxslider']['groups'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'eval'                    => array('mandatory'=>true, 'multiple'=>true),
			'sql'                     => "blob NULL",
			'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
		)
	)
);
