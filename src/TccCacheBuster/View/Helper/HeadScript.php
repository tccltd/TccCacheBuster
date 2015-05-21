<?php

namespace TccCacheBuster\View\Helper;

use Zend\View\Helper\HeadScript as ZendHeadScript;

class HeadScript extends ZendHeadScript
{
    protected $version;

    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    protected function getVersion()
    {
        return $this->version;
    }

    public function __call($method, $args)
    {
        if($method == 'appendFile' || $method == 'prependFile') {
            $version = $this->getVersion();

            // Be careful as strpos will return 0 if at the start of the string which equates to false
            if($version && strpos($args[0], 'https://') === false && strpos($args[0], 'http://') === false && strpos($args[0], '//') === false) {
                $lastPos = strripos($args[0], '.');
                $args[0] = substr($args[0], 0, $lastPos) . "." . $version . substr($args[0], $lastPos);
            }
        }

        return parent::__call($method, $args);
    }
}
