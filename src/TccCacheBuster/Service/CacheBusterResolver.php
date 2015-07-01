<?php
namespace TccCacheBuster\Service;

use AssetManager\Resolver\ResolverInterface;

class CacheBusterResolver implements ResolverInterface
{
    protected $realResolver;
    protected $version;

    public function __construct($realResolver, $version=null)
    {
        $this->setRealResolver($realResolver);
        $this->version = $version;
    }


    public function resolve($name)
    {
        $replace = str_replace($this->version.'.', '', $name);

        if($name !== $replace) {
            return $this->getRealResolver()->resolve($replace);
        }
    }


    public function __call($name, $args)
    {
        $realResolver = $this->getRealResolver();
        return call_user_func_array([$realResolver, $name], $args);
    }

    protected function setRealResolver($resolver)
    {
        $this->realResolver = $resolver;
        return $this;
    }

    protected function getRealResolver()
    {
        return $this->realResolver;
    }
}
