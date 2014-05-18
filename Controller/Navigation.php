<?php

namespace Controller;


class Navigation {

    private $navigation = [];

    public function __construct($navigationFile){
        $this->navigation = json_decode( file_get_contents(ROOTPATH.$navigationFile), true);
    }

    public function getNavigation($url = ''){
        foreach ($this->navigation['navigation'] as &$link) {
            if (preg_match(':^'.$link['url'].':', $url)){
                $link['active'] = 'active';
            }
        }
        return $this->navigation['navigation'];
    }
} 