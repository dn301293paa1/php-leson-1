<?php

class OrderProcessor
{
    public function processOrder($order)
    {
        if ($order->getType() == 'product') {
            $generator = new ProductReportGenerator();
            echo 1 .PHP_EOL;
        } elseif ($order->getType() == 'service') {
            $generator = new ServiceReportGenerator();
            echo 2 .PHP_EOL;
        } elseif ($order->getType() == 'delivery') {
            $generator = new DeliveryReportGenerator();
            echo 3 .PHP_EOL;
        }



        $generator->generateReport();
    }
}
