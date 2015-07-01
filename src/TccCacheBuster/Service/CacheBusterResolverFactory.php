<?php

namespace TccCacheBuster\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class CacheBusterResolverFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('Config');
        $version = isset($config['version']) ? $config['version'] : null;

        $pathStack = $serviceLocator->get('AssetManager\Resolver\PathStackResolver');
        return new CacheBusterResolver($pathStack, $version);
    }
}
