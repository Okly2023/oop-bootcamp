<?php
// Define the items in the basket
$basket = [
    'bananas' => ['quantity' => 6, 'price' => 1, 'tax' => 0.06],
    'apples' => ['quantity' => 3, 'price' => 1.5, 'tax' => 0.06],
    'wine' => ['quantity' => 2, 'price' => 10, 'tax' => 0.21],
];

// Initialize total price and total tax
$totalPrice = 0;
$totalTax = 0;

// Calculate total price and total tax
foreach ($basket as $item) {
    $totalPrice += $item['quantity'] * $item['price'];
    $totalTax += $item['quantity'] * $item['price'] * $item['tax'];
}

// Output the total price and total tax
echo "Total price: €" . number_format($totalPrice, 2) . "<br>";
echo "Total tax: €" . number_format($totalTax, 2) . "<br>";
?>