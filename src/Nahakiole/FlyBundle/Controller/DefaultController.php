<?php

namespace Nahakiole\FlyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FlyBundle:Default:packages.html.twig');
    }
}
