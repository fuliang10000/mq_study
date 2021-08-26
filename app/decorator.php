<?php
/**
 * 装饰器模式
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