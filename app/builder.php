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

use common\builder\Product;
use common\builder\ProductBuilder;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$productConfigs = ['type' => 'shirt', 'size' => 'XL', 'color' => 'red'];

//$product = new Product();
//$product->setType($productConfigs['type']);
//$product->setSize($productConfigs['size']);
//$product->setColor($productConfigs['red']);

$builder = new ProductBuilder($productConfigs);
$builder->build();
$product = $builder->getProduct();
