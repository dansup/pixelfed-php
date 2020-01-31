<?php

require __DIR__ . '/../vendor/autoload.php';

use \Pixelfed\PixelfedApi;

echo "Fetching nodeinfo from pixelfed.social ... \n\n";

$api = new PixelfedApi('https://pixelfed.social');

$nodeinfo = $api->nodeinfo();

echo "pixelfed.social nodeinfo: \n";

echo json_encode($nodeinfo, JSON_PRETTY_PRINT);

echo "\n\n";

exit;