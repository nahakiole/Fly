<?php

namespace Controller;


use  Fredy\Configuration;
use Fredy\Controller\Controller;
use  Fredy\LanguageLoader;
use  Fredy\View\HTMLResponse;
use View\FrontendResponse;

class Fly extends Controller
{


    public function __construct()
    {
        //$this->database = $database;
    }


    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function indexAction($request)
    {
        $response = new FrontendResponse('packages.twig', $request->matches[0]);
        $response->setTwigVariables(
            [
                'title' => 'Demo'
            ]

        );
        return $response;

    }


    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function faqAction($request)
    {
        $response = new FrontendResponse('faq.twig', $request->matches[0]);
        return $response;
    }

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function aboutAction($request)
    {
        $response = new FrontendResponse('about.twig', $request->matches[0]);
        return $response;
    }

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function dummyAction($request)
    {
        $response = new FrontendResponse('dummy.twig', $request->matches[0]);
        return $response;
    }
}