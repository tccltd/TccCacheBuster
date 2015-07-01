<?php
return [
    'asset_manager' => [
        'resolvers' => [
            'TccCacheBuster\Service\CacheBusterResolver' => 400,
        ],
    ],
    'service_manager' => [
        'factories' => [
            'TccCacheBuster\Service\CacheBusterResolver' => 'TccCacheBuster\Service\CacheBusterResolverFactory'
        ],
    ],
];
