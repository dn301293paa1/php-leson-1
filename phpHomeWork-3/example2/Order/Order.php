<?php
require_once 'OrderProcessor.php';
require_once 'OrderInfoDisplay.php';

class Order
{


    public function __construct(private OrderProcessor $orderProcessor, private OrderInfoDisplay $orderInfoDisplay)
    {
        $this->orderProcessor = $orderProcessor;
        $this->orderInfoDisplay = $orderInfoDisplay;
    }

    public function processOrder($orderData)
    {
        $this->orderProcessor->processOrder($orderData);
    }

    public function displayOrderInfo($orderId)
    {
        $this->orderInfoDisplay->displayOrderInfo($orderId);
    }
}
