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
namespace bxSlider;


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

		$intTotal = \bxSliderSlideModel::countPublishedByPid($this->bx_slider);

		if ($intTotal < 1)
		{
			$this->Template->empty = $GLOBALS['TL_LANG']['MSC']['bxslider_noSlide'];
			
			return;
		}

		$objSlides = \bxSliderSlideModel::findPublishedByPid($this->bx_slider);

		// No items found
		if ($objSlides !== null)
		{
			$this->Template->slides = $this->parseSlides($objSlides);
		}

	}

	protected function parseSlides($objSlides)
	{
		$limit = $objSlides->count();

		if ($limit < 1)
		{
			return array();
		}

		$count = 0;
		$arrSlides = array();

		while ($objSlides->next())
		{
			$arrSlides[] = $this->parseSlide($objSlides, ((++$count == 1) ? ' first' : '') . (($count == $limit) ? ' last' : '') . ((($count % 2) == 0) ? ' odd' : ' even'), $count);
		}

		return $arrSlides;
	}


	protected function parseSlide($objSlide, $strClass='', $intCount=0)
	{

		$objTemplate = new \FrontendTemplate('bxslider_slide');

		$objTemplate->setData($objSlide->row());

		$objTemplate->addImage = false;

		// Add an image
		if ($objSlide->singleSRC != '')
		{
			$objModel = \FilesModel::findByUuid($objSlide->singleSRC);

			if ($objModel === null)
			{
				if (!\Validator::isUuid($objSlide->singleSRC))
				{
					$objTemplate->text = '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
				}
			}
			elseif (is_file(TL_ROOT . '/' . $objModel->path))
			{
				// Do not override the field now that we have a model registry (see #6303)
				$arrSlide = $objSlide->row();

				// Override the default image size
				if ($objSlide->size != '' || $this->imgSize != '')
				{
					if ( $this->imgSize != '')
					{
						$objSlide->size = $this->imgSize;
					}

					$size = deserialize($objSlide->size);


					if ($size[0] > 0 || $size[1] > 0 || is_numeric($size[2]))
					{
						$arrSlide['size'] = $objSlide->size;
					}
				}

				$arrSlide['singleSRC'] = $objModel->path;				
				$this->addImageToTemplate($objTemplate, $arrSlide);
			}
		}		

		$objTemplate->class     = $strClass;
		$objTemplate->hrefclass = $objSlide->class;

		return $objTemplate->parse();

	}

}
