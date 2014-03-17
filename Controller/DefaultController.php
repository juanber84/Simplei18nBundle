<?php

namespace Juanber84\Bundle\Simplei18nBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    public function changelocaleAction($locale)
    {
        $session = $this->get("session");
        $session->set("_locale", $locale);
        $referer = $this->get('request')->headers->get('referer');
        return new RedirectResponse($referer);
    }
}
