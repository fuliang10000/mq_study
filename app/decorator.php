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

use common\decorator\Cd;
use common\decorator\CdTrackListDecoratorCaps;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$myCD = new Cd();
$tracksFromSource = ['What It Means', 'Brr', 'Goodbye'];
foreach ($tracksFromSource as $track) {
    $myCD->addTrack($track);
}
echo $myCD->getTrackList() . "\r\n";
$myCDCaps = new CdTrackListDecoratorCaps($myCD);
$myCDCaps->makeCaps();
echo $myCD->getTrackList() . "\r\n";
