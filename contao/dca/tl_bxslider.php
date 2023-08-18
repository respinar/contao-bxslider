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
				'href'                => 'act=edit',
				'icon'                => 'edit.svg'
			),
			'copy' => array
			(
				'href'                => 'act=copy',
				'icon'                => 'copy.svg'
			),
			'delete' => array
			(
				'href'                => 'act=delete',
				'icon'                => 'delete.svg',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'href'                => 'act=show',
				'icon'                => 'show.svg'
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
		'__selector__'                => array('pager','ticker','adaptiveHeight','touchEnabled','controls','autoControls','auto'),
		'default'                     => '{title_legend},title;{bx_options_legend},bx_mode,bx_speed,bx_slideMargin,bx_startSlide,bx_infiniteLoop,bx_responsive,bx_captions,bx_randomStart,bx_video,bx_hideControlOnEnd,bx_useCSS,bx_oneToOneTouch,bx_easing,bx_preloadImages,bx_ticker,bx_adaptiveHeight,bx_touchEnabled,bx_preventDefaultSwipeX,bx_preventDefaultSwipeY;{bx_pager_legend},bx_pager;{bx_controls_legend},bx_controls,bx_autoControls;{bx_auto_legend},bx_auto;{bx_carousel_legend:hide},bx_minSlides,bx_maxSlides,bx_moveSlides,bx_slideWidth;{protected_legend:hide},protected;'
	),

	// Subpalettes
	'subpalettes' => array
	(
        'pager'                    => 'pagerType,bx_pagerShortSeparator',
        'ticker'                   => 'tickerHover',
        'adaptiveHeight'           => 'adaptiveHeightSpeed',
        'touchEnabled'             => 'swipeThreshold',
        'controls'                 => 'nextText,bx_prevText',
        'autoControls'             => 'startText,bx_stopText,bx_autoControlsCombine,',
        'auto'                     => 'autoDirection,bx_autoStart,bx_autoHover,bx_pause,bx_autoDelay',
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
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'mode' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'horizontal',
			'options'                 => array('horizontal','vertical','fade'),
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'speed' =>  array
		(
			'exclude'                 => true,
			'default'                 => 500,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'slideMargin' =>  array
		(
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'startSlide' =>  array
		(
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'randomStart' =>  array
		(
			'exclude'                 => true,
			'default'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'infiniteLoop' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'hideControlOnEnd' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'easing' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('linear', 'swing', 'ease-in', 'ease-out', 'ease-in-out', 'cubic-bezier(n,n,n,n)'),
			'eval'                    => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'captions' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'ticker' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr', 'submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'tickerHover' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'adaptiveHeight' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr m12', 'submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'adaptiveHeightSpeed' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'text',
			'default'                 => 500,
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'video' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'responsive' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'useCSS' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'preloadImages' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'visible',
			'options'                 => array('all', 'visible'),
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'touchEnabled' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr m12', 'submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'swipeThreshold' =>  array
		(
			'exclude'                 => true,
			'default'                 => 50,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'oneToOneTouch' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'preventDefaultSwipeX' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'preventDefaultSwipeY' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),


		/* Pager */

		'pager' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'pagerType' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'full',
			'options'                 => array('full', 'short'),
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'pagerShortSeparator' =>  array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => ' / ',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		/* Controls */

		'controls' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'nextText' =>  array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Next',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'prevText' =>  array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Prev',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'autoControls' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'startText' =>  array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Start',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'stopText' =>  array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Stop',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'autoControlsCombine' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		/* Auto */

		'auto' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'pause' =>  array
		(
			'exclude'                 => true,
			'default'                 => 4000,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'autoStart' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'autoDirection' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'next',
			'options'                 => array('next', 'prev'),
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),

		'autoStart' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'autoHover' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),

		'autoDelay' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		/* Carousel */

		'minSlides' =>  array
		(
			'exclude'                 => true,
			'default'                 => 1,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'maxSlides' =>  array
		(
			'exclude'                 => true,
			'default'                 => 1,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),

		'moveSlides' =>  array
		(
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),
		'slideWidth' =>  array
		(
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
		),
		'protected' => array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'eval'                    => array('mandatory'=>true, 'multiple'=>true),
			'sql'                     => "blob NULL",
			'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
		)
	)
);