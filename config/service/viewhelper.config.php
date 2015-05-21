<?php

use TccCacheBuster\View\Helper\HeadScript;
use TccCacheBuster\View\Helper\HeadLink;

return array(
    'factories' => array(
        'headscript' => function ($vhm) {
            $helper = new HeadScript();
            $config = $vhm->getServiceLocator()->get('Config');
            $version = isset($config['version']) ? $config['version'] : null;
            $helper->setVersion($version);
            return $helper;
        },
        'headlink' => function ($vhm) {
            $helper = new HeadLink();
            $config = $vhm->getServiceLocator()->get('Config');
            $version = isset($config['version']) ? $config['version'] : null;
            $helper->setVersion($version);
            return $helper;
        }
    ),
);
