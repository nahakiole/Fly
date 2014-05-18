<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 15.05.14
 * Time: 21:33
 */

namespace View;


use Controller\Navigation;
use Fredy\View\HTMLResponse;

class FrontendResponse extends HTMLResponse {


    public function __construct($templatePath, $url)
    {
        parent::__construct($templatePath);
        $navigation = new Navigation('navigation.json');
        $this->setTwigVariables([
           'navigation' => $navigation->getNavigation($url)
        ]);

    }
} 