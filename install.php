<?php

/**
 * Copyright 2016 | Licensed under MIT
 * 
 * Currently additionally required extensions for MyEnvoy:
 *  - acpu
 *  - curl
 *  - gd
 *  - mcrypt
 *  - mhash
 * 
 */
$_required_extensions = array('apcu', 'curl', 'gd', 'mcrypt', 'mhash');
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
echo implode(', ', $_havetoinstall);
if (count($_havetoinstall) === 0) {
    echo 'None.';
}
echo PHP_EOL;

$input = readline('Do you want to proceed? (y/n): ');
if ($input !== 'y') {
    exit();
}
echo PHP_EOL;

foreach ($_havetoinstall as $ext) {
    passthru('apt-get install --force-yes php5-' . $ext);
}

echo 'Extensions successfully checked!' . PHP_EOL . PHP_EOL;
echo '' . PHP_EOL;
