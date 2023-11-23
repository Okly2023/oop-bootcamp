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

class Fruit extends Item {
    public function getDiscountedPrice(){
        return $this->getTotalPrice() * 0.5;
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
            if($item instanceof Fruit) {
                $total += $item->getDiscountedPrice();
            } else {
                $total += $item->getTotalPrice();
            }
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
$basket->addItem(new Fruit(6, 1, 0.06)); //  Bananas discount 50%
$basket->addItem(new Fruit(3, 1.5, 0.06)); // Apples discount 50%
$basket->addItem(new Item(2, 10, 0.21)); // Wine

echo "Total price: €" . number_format($basket->getTotalPrice(), 2) . "<br>";
echo "Total tax: €" . number_format($basket->getTotalTax(), 2) . "<br>";
?>