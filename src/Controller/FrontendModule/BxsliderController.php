<?php

declare(strict_types=1);

namespace Respinar\BxsliderBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\ModuleModel;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Respinar\BxsliderBundle\Controller\BxsliderParser;
use Respinar\BxsliderBundle\Model\BxsliderModel;
use Respinar\BxsliderBundle\Model\BxsliderSlideModel;

#[AsFrontendModule(category: 'slider')]
class BxsliderController extends AbstractFrontendModuleController
{
    protected function getResponse(Template $template, ModuleModel $model, Request $request): Response
    {
        $intTotal = BxsliderSlideModel::countPublishedByPid($model->bx_slider);

		if ($intTotal < 1)
		{
			$template->empty = $GLOBALS['TL_LANG']['MSC']['bxslider_noSlide'];

			return $template->getResponse();
		}

		$objbxSlider = BxsliderModel::findBy('id',$model->bx_slider);

		$template->setData($objbxSlider->row());

		$objSlides = BxsliderSlideModel::findPublishedByPid($model->bx_slider);

		// No items found
		if ($objSlides !== null)
		{
			$bxSlider = new BxsliderParser();

			$template->slides = $bxSlider->parseSlides($objSlides, $model);
		}

        return $template->getResponse();
    }
}
