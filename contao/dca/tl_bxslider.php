<?php

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid@respinar.com>
 *
 * @license MIT
 */

use Contao\System;
use Contao\BackendUser;


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
		'default'                     => '{title_legend},title;{options_legend},mode,speed,slideMargin,startSlide,infiniteLoop,responsive,captions,randomStart,video,hideControlOnEnd,useCSS,oneToOneTouch,easing,preloadImages,ticker,adaptiveHeight,touchEnabled,preventDefaultSwipeX,preventDefaultSwipeY;{pager_legend},pager;{controls_legend},controls,autoControls;{auto_legend},auto;{carousel_legend:hide},minSlides,maxSlides,moveSlides,slideWidth;{keyboard_legend:hide},keyboardEnabled;{aria_legend:hide},ariaLive,ariaHidden;{class_legend:hide},wrapperClass;{protected_legend:hide},protected;'
	),

	// Subpalettes
	'subpalettes' => array
	(
        'pager'                    => 'pagerType,pagerShortSeparator',
        'ticker'                   => 'tickerHover',
        'adaptiveHeight'           => 'adaptiveHeightSpeed',
        'touchEnabled'             => 'swipeThreshold',
        'controls'                 => 'nextText,prevText',
        'autoControls'             => 'startText,stopText,autoControlsCombine,',
        'auto'                     => 'autoDirection,autoStart,autoHover,pause,autoDelay',
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
			'sql'                     => "int(10) unsigned NOT NULL default 0"
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
			'sql'                     => "varchar(64) NOT NULL default 'horizontal'"
		),

		'speed' =>  array
		(
			'exclude'                 => true,
			'default'                 => 500,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 500"
		),

		'slideMargin' =>  array
		(
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 0"
		),

		'startSlide' =>  array
		(
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 0"
		),

		'randomStart' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		'infiniteLoop' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'hideControlOnEnd' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => false)
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
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		'ticker' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr', 'submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		'tickerHover' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),
		'adaptiveHeight' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr m12', 'submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),
		'adaptiveHeightSpeed' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'text',
			'default'                 => 500,
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 500"
		),

		'video' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		'responsive' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'useCSS' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'preloadImages' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'visible',
			'options'                 => array('all', 'visible'),
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default 'visible'"
		),

		'touchEnabled' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr m12', 'submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'swipeThreshold' =>  array
		(
			'exclude'                 => true,
			'default'                 => 50,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 50"
		),

		'oneToOneTouch' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'preventDefaultSwipeX' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'preventDefaultSwipeY' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		/* Pager */
		'pager' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'pagerType' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'                 => 'full',
			'options'                 => array('full', 'short'),
			'eval'                    => array('tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default 'full'"
		),

		'pagerShortSeparator' =>  array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => '/',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default '/'"
		),

		/* Controls */
		'controls' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'nextText' =>  array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Next',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default 'Next'"
		),

		'prevText' =>  array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => 'Prev',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default 'Prev'"
		),

		'autoControls' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr','submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		'startText' =>  array
		(
			'exclude'                 => true,
			'default'                 => 'Start',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default 'Start'"
		),

		'stopText' =>  array
		(
			'exclude'                 => true,
			'default'                 => 'Stop',
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default 'Stop'"
		),

		'autoControlsCombine' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		/* Auto */
		'auto' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		'pause' =>  array
		(
			'exclude'                 => true,
			'default'                 => 4000,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 4000"
		),

		'autoStart' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => true)
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
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'autoHover' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		'autoDelay' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 0"
		),

		/* Carousel */
		'minSlides' =>  array
		(
			'exclude'                 => true,
			'default'                 => 1,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 1"
		),

		'maxSlides' =>  array
		(
			'exclude'                 => true,
			'default'                 => 1,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 1"
		),

		'moveSlides' =>  array
		(
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 0"
		),
		'slideWidth' =>  array
		(
			'exclude'                 => true,
			'default'                 => 0,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'                     => "smallint(5) unsigned NOT NULL default 0"
		),

		'thumbnail' => array
		(
			'exclude'          => true,
			'inputType'        => 'checkbox',
			'eval'             => array('tl_class'=>'w50 m12'),
			'sql'              => "char(1) COLLATE ascii_bin NOT NULL default ''"
		),
		'thumbnailSize' => array
		(
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'options_callback' => function () {
				return System::getContainer()->get('contao.image.image_sizes')->getOptionsForUser(BackendUser::getInstance());
			},
			'eval'                    => array('rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(128) COLLATE ascii_bin NOT NULL default ''"
		),

		'keyboardEnabled' =>  array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		),

		'ariaLive' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),
		'ariaHidden' =>  array
		(
			'exclude'                 => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => array('type' => 'boolean', 'default' => true)
		),

		'wrapperClass' =>  array
		(
			'exclude'                 => true,
			'default'                 => 'bx-wrapper',
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default 'bx-wrapper'"
		),

		'protected' => array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => false)
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