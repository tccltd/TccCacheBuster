# TccCacheBuster Module

This module automatically inserts a version number into the head links and head scripts you have on your pages. The version number is pulled from the applicaiton config.

```php
return [
    'version' => '1.1.1',
];
```

This will lead to a head link like `/css/my-css-file.1.1.1.css`

If you don't specify a version number nothing happens so can be used in development and then the buildscript for a production environment can insert a config file into the applications `config/autoload` directory.

A minor addition needs to be made to the apache .htaccess file to allow this to work using ModRewrite...

```htaccess
# Capture version bumping of files
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)\.([0-9]+\.[0-9]+\.[0-9]+)\.(js|css|png|jpg|gif)$ /$1.$3 [L]
```

(Note: With the above you can also version images but this module does not automatically do this).

Why do I need this?
-------------------

If you web server is set to cache js/css files in a users browser and you release a new version the browser will pull files from cache rather than download new version from the server.

By altering the version number of the file requested the browser downloads a new version from the server when the files have changed.
