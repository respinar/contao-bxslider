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
namespace Respinar\BxSlider\Frontend;

/**
 * Class BxSlider
 */
class BxSlider extends \Frontend
{
	/**
	 * Name of the table
	 *
	 */

	public function parseSlides($objSlides)
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


	public function parseSlide($objSlide, $strClass='', $intCount=0)
	{
		$objTemplate = new \FrontendTemplate($this->bx_slide_template);

		$objTemplate->setData($objSlide->row());

		$objTemplate->addImage = false;

		// Add an image
		if ($objSlide->singleSRC != '')
		{
			$objModel = \FilesModel::findByUuid($objSlide->singleSRC);

			if ($objModel !== null && is_file(\System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path))
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
				$this->addImageToTemplate($objTemplate, $arrSlide, null, null, $objModel);
			}
		}

		$objTemplate->class     = $strClass;
		$objTemplate->hrefclass = $objSlide->class;

		return $objTemplate->parse();
	}
}
