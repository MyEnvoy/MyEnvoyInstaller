<?php

/**
 * Copyright 2016 | Licensed under MIT
 * 
 * Currently additionally required extensions for MyEnvoy:
 *  - apc
 *  - acpu
 *  - curl
 *  - gd
 *  - mcrypt
 *  - mhash
 * 
 */
$_required_extensions = array('apc', 'apcu', 'curl', 'gd', 'mcrypt', 'mhash');
$_havetoinstall = array();


echo 'Welcome to the MyEnvoy installer script!' . PHP_EOL;
echo 'This PHP script will lead you through the installation process of an envoy on your machine.' . PHP_EOL . PHP_EOL;
echo 'At first, all missing PHP extensions will get installed.' . PHP_EOL;
echo 'Search for installed extensions . . .' . PHP_EOL;

foreach ($_required_extensions as $ext) {
    if (extension_loaded($ext) === FALSE) {
        $_havetoinstall[] = $ext;
    }
}

echo 'The following missing extensions will get installed:' . PHP_EOL;
echo implode(', ', $_havetoinstall) . PHP_EOL;
echo '' . PHP_EOL;
