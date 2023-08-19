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
