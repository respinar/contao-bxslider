<?php

declare(strict_types=1);

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\BxsliderBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\Template;
use Contao\System;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Respinar\BxsliderBundle\Controller\BxsliderParser;
use Respinar\BxsliderBundle\Model\BxsliderModel;

#[AsContentElement(category: 'slider', template: 'ce_bxslider')]
class BxsliderController extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {

		// Always use the default template in the back end
		if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
		{
			$template->empty = "#### bxSlider ####";

			return $template->getResponse();
		}

		if ($model->bxSlider_items == null)
		{
            $template->empty = $GLOBALS['TL_LANG']['MSC']['bxslider_noSlide'];

			return $template->getResponse();
		}

		if ($model->bxSlider != 0) {
			$objBxSlider = BxsliderModel::findBy('id',$model->bxSlider);
			$template->options = BxsliderParser::setOptions($objBxSlider);
		} else {
			$template->options = null;
		}

		$template->sliderId = 'bxslider-' . strval($model->id);
		$template->thumbnailId = 'bxpager-' . strval($model->id);

		//No items found
		if ($model->bxSlider_items !== null)
		{
			$model->imgSize = $model->size;

			$template->slides = BxsliderParser::parseSlides($model);

			if ($model->bxSlider_thumbnail) {
				$model->imgSize = $model->bxSlider_thumbnailSize;

				$template->thumbnails = BxsliderParser::parseSlides($model);
			}
		}

		$GLOBALS['TL_BODY'][] = Template::generateScriptTag('bundles/respinarbxslider/jquery.bxslider.min.js', false, null);
        $GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarbxslider/jquery.bxslider.min.css', false, null);

        return $template->getResponse();
    }
}
