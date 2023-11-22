<?php
class Item {
    public $quantity;
    public $price;
    public $tax;

    public function __construct($quantity, $price, $tax) {
        $this->quantity = $quantity;
        $this->price = $price;
        $this->tax = $tax;
    }

    public function getTotalPrice() {
        return $this->quantity * $this->price;
    }

    public function getTotalTax() {
        return $this->getTotalPrice() * $this->tax;
    }
}

class Basket {
    private $items = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotalPrice();
        }
        return $total;
    }

    public function getTotalTax() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotalTax();
        }
        return $total;
    }
}

$basket = new Basket();
$basket->addItem(new Item(6, 1, 0.06)); // Bananas
$basket->addItem(new Item(3, 1.5, 0.06)); // Apples
$basket->addItem(new Item(2, 10, 0.21)); // Wine

echo "Total price: €" . number_format($basket->getTotalPrice(), 2) . "<br>";
echo "Total tax: €" . number_format($basket->getTotalTax(), 2) . "<br>";
?>