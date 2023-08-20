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
 * Namespace
 */
namespace Respinar\BxsliderBundle\Controller;

use Contao\FrontendTemplate;
use Contao\System;
use Contao\FilesModel;
use Contao\StringUtil;

/**
 * Class Bxslider
 */
class BxsliderParser
{
	/**
	 * Name of the table
	 *
	 */

	static public function setOptions($bxSlider)
	{
		$defaultOptions = array (
			'mode' => 'horizontal',
			'speed' => 500,
			'slideMargin' =>  0,
			'startSlide' => 0,
			'randomStart' => '', //false,
			'slideSelector' => '',
			'infiniteLoop' => 1, //true
			'hideControlOnEnd' => '', //false,
			'easing' => null,
			'captions' => '', //false,
			'ticker' => '', //false,
			'tickerHover' => '', //false,
			'adaptiveHeight' => '', //false,
			'adaptiveHeight' => false,
			'adaptiveHeightSpeed' => 500,
			'video' => '', //false,
			'responsive' => 1, //true
			'useCSS' => 1, //true
			'preloadImages' => 'visible',
			'touchEnabled' => 1, //true
			'swipeThreshold' => 50,
			'oneToOneTouch' => 1, //true
			'preventDefaultSwipeX' => 1, //true
			'preventDefaultSwipeY' => '', //false
			'wrapperClass' => 'bx-wrapper',

			'pager' => 1, //true
			'pagerType' => 'full',
			'pagerShortSeparator' => '/',
			'pagerSelector' => '',
			'pagerCustom' => null,
			'buildPager' => null,

			'controls' => 1, //true
			'nextText' => 'Next',
			'prevText' => 'Prev',
			'nextSelector' => null,
			'prevSelector' => null,
			'autoControls' => '', //false,
			'autoControls' => '', //false,
			'startText' => 'Start',
			'stopText' => 'Stop',
			'autoControlsCombine' => '', //false,
			'autoControlsSelector' => null,
			'keyboardEnabled' => '', //false,

			'auto' => '', //false,
			'stopAutoOnClick' => '', //false,
			'pause' => 4000,
			'autoStart' => 1, //true
			'autoDirection' => 'next',
			'autoHover' => '', //false,
			'autoDelay' => 0,
			'minSlides' => 1,
			'maxSlides' => 1,
			'moveSlides' => 0,
			'slideWidth' => 0,
			'shrinkItems' => '', //false,

			'keyboardEnabled' => '', //false,					

			'ariaLive' => 1, //true
			'ariaHidden' => 1, //true
		);

		$setOptions = array();

		foreach($defaultOptions as $key => $value) {
			if ($bxSlider->$key != $value) {
				$setOptions[$key] = json_encode($bxSlider->$key);
			}
		}

		return $setOptions;
	}

	static public function parseSlides($model)
	{

		$slideItems = StringUtil::deserialize($model->bxSlider_items);

		$arrSlides = array();

		foreach($slideItems as $slideItem)
		{
			$arrSlides[] = BxsliderParser::parseSlide($slideItem, $model);
		}

		return $arrSlides;
	}


	static public function parseSlide($slideItem, $model)
	{
		$objTemplate = new FrontendTemplate($model->bxSlider_template);

		//$objTemplate->setData($slideItem->row());

		$objTemplate->addImage = false;

		// Add an image
		if ($slideItem != '')
		{
			$imgSize = null;
			
			if ($model->imgSize)
			{
				$size = StringUtil::deserialize($model->imgSize);

				if ($size[0] > 0 || $size[1] > 0 || is_numeric($size[2]) || ($size[2][0] ?? null) === '_')
				{
					$imgSize = $model->imgSize;
				}
			}

			$figureBuilder = System::getContainer()
				->get('contao.image.studio')
				->createFigureBuilder()
				->from($slideItem)
				->setSize($imgSize);

			if (null !== ($figure = $figureBuilder->buildIfResourceExists()))
			{
				$figure->applyLegacyTemplateData($objTemplate);
			}
		}

		return $objTemplate->parse();
	}
}
