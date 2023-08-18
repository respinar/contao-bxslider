<?php

declare(strict_types=1);

namespace Respinar\BxsliderBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Respinar\BxsliderBundle\Controller\BxsliderParser;
use Respinar\BxsliderBundle\Model\BxsliderModel;

#[AsContentElement(category: 'slider')]
class BxsliderController extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        //$intTotal = BxsliderSlideModel::countPublishedByPid($model->bx_slider);

		if ($intTotal < 1)
		{
            $template->empty = $GLOBALS['TL_LANG']['MSC']['bxslider_noSlide'];

			return $template->getResponse();
		}

		$objbxSlider = BxsliderModel::findBy('id',$model->bx_slider);

		$template->setData($objbxSlider->row());

		//$objSlides = BxsliderSlideModel::findPublishedByPid($model->bx_slider);



		// No items found
		if ($objSlides !== null)
		{
			$bxSlider = new BxsliderParser();

			$model->imgSize = $model->size;

			$template->slides = $bxSlider->parseSlides($objSlides, $model);
		}

        return $template->getResponse();
    }
}
