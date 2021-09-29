<?php

declare(strict_types=1);
/**
 * This file is part of Shoplinke.
 * Developed By Middle Platform Team Of Starlinke
 *
 * @link     https://www.starlinke.com
 * @document https://starlink.feishu.cn/docs/doccnuhsKZVumq24kIecc4oefbf
 * $contact  dev@starlinke.com
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
