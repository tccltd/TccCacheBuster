<?php

namespace TccCacheBuster;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements
    ViewHelperProviderInterface,
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{
    public function getViewHelperConfig()
    {
        return include(__DIR__ . '/config/service/viewhelper.config.php');
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include(__DIR__ . '/config/module.config.php');
    }

    public function getServiceConfig()
    {
        return include(__DIR__ . '/config/service/service.config.php');
    }
}
