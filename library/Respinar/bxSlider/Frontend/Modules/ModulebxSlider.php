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
namespace Respinar\bxSlider\Frontend\Modules;

use Respinar\bxSlider\Model\bxSliderModel;
use Respinar\bxSlider\Model\bxSliderSlideModel;

/**
 * Class ModulebxSlider
 */
class ModulebxSlider extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_bxslider';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['bxslider'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}		

		// No catalog categries available
		if (!isset($this->bx_slider))
		{
			return '';
		}

		if (TL_MODE == 'FE')
		{
            $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/bxslider/assets/vendor/jquery.bxslider/jquery.bxslider.min.js|static';
            $GLOBALS['TL_CSS'][] = 'system/modules/bxslider/assets/vendor/jquery.bxslider/jquery.bxslider.min.css|static';
        }

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{		

		$intTotal = bxSliderSlideModel::countPublishedByPid($this->bx_slider);

		if ($intTotal < 1)
		{
			$this->Template->empty = $GLOBALS['TL_LANG']['MSC']['bxslider_noSlide'];
			
			return;
		}

		$objSlides = bxSliderSlideModel::findPublishedByPid($this->bx_slider);

		// No items found
		if ($objSlides !== null)
		{
			$bxSlider = new bxSlider();

			$bxSlider->bx_slide_template = $this->bx_slide_template;
			$bxSlider->imgSize = $this->imgSize;

			$this->Template->slides = $bxSlider->parseSlides($objSlides);
		}

	}

}
