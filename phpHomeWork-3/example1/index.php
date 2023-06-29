<?php


require_once 'Order.php';
require_once 'processors/OrderProcessor.php';
require_once 'generators/ProductReportGenerator.php';
require_once 'generators/ServiceReportGenerator.php';
require_once 'generators/DeliveryReportGenerator.php';

$order = new Order('delivery');
$orderProcessor = new OrderProcessor();
$orderProcessor->processOrder($order);