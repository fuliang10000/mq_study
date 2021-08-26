<?php
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