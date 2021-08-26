<?php
/**
 * 外观模式
 */
namespace app;

use common\facade\Cd;
use common\facade\WebServiceFacade;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$title = 'title';
$band = 'band';
$tracks = ['What It Means', 'Brr', 'Goodbye'];
$cd = new Cd($title, $band, $tracks);

echo WebServiceFacade::makeXMLCall($cd);