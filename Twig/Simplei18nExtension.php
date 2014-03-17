<?php

namespace Juanber84\Bundle\Simplei18nBundle\Twig;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Simplei18nExtension extends \Twig_Extension
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var Request
     */
    protected $request;

    /**
     * Constructor
     * 
     * @param ContainerInterface $container
     */
    public function __construct($container)
    {

        $this->container = $container;

        if ($this->container->isScopeActive('request')) {
            $this->request = $this->container->get('request');
        }
    }

    public function getFilters()
    {
        return array(
        );
    }

    public function getFunctions()
    {
        return array(
            'language' => new \Twig_Function_Method($this, 'language'),
            'simplei18n' => new \Twig_Function_Method($this, 'simplei18n'),
        );
    }    


    public function language($language = null)
    {
        $session = $this->container->get('session');
        if ($language == null) {
            if (!$session->get('language')) {
                $session->set('language','en');
            }
            $language = $session->get('language');
        }
 
        if ($language) {
            $this->request->setLocale($language);
        }
        return '';
    }    

    public function simplei18n($languages){

        $engine = $this->container->get('templating');
        $content = $engine->render('Juanber84Simplei18nBundle:Simplei18n:select.html.twig',array('languages' => $languages ));

        return $content;
    }

    public function getName()
    {
        return 'simplei18n_extension';
    }

}