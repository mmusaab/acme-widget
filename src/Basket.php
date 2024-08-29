<?php

class Basket
{
    private $catalogue;
    private $deliveryCharges;
    private $offers;
    private $items = [];

    public function __construct($catalogue, $deliveryCharges, $offers = [])
    {
        $this->catalogue = $catalogue;
        $this->deliveryCharges = $deliveryCharges;
        $this->offers = $offers;
    }

    public function add($productCode)
    {
        if (!isset($this->catalogue[$productCode])) {
            throw new Exception("Product code {$productCode} not found in catalogue.");
        }
        $this->items[] = $productCode;
    }

    public function getProducts(): array
    {
        return $this->catalogue;
    }

    public function total()
    {
        $total = 0.00;
        $productCounts = array_count_values($this->items);

        if(0 === $productCounts) {
            return 0.00;
        }

        // Find the product with the highest price
        $highestPricedProduct = $this->getHighestPricedProduct($productCounts);

        // Calculate the cost of each product, applying the offer only to the highest priced product
        foreach ($productCounts as $productCode => $quantity) {
            $price = $this->catalogue[$productCode];
            if ($productCode === $highestPricedProduct) {
                $total += $this->applyOfferToHighestPricedProduct($quantity, $price);
            } else {
                $total += $quantity * $price;
            }
        }

        if(0 != $total) {
            // Calculate delivery charges
            $total = $this->applyDeliveryCharges($total);
        }

        return number_format($total, 2);
    }

    private function getHighestPricedProduct($productCounts)
    {
        $highestPrice = 0;
        $highestPricedProduct = null;

        foreach ($productCounts as $productCode => $quantity) {
            $price = $this->catalogue[$productCode];
            if ($price > $highestPrice) {
                $highestPrice = $price;
                $highestPricedProduct = $productCode;
            }
        }

        return $highestPricedProduct;
    }

    private function applyOfferToHighestPricedProduct($quantity, $price)
    {
        if ($quantity >= 2) {
            return ($price * ($quantity - 1)) + ($price * 0.5);
        }

        return $quantity * $price;
    }

    private function applyDeliveryCharges($total)
    {
        foreach ($this->deliveryCharges as $threshold => $charge) {
            if ($total < $threshold) {
                return $total + $charge;
            }
        }

        return $total;
    }
}
