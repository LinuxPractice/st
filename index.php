<?php
use classes\CartItem;
use classes\Customer;
use classes\CartTotals;
use classes\Shipping;

/**
 * file_name
 *
 * Oct 31, 2018
 */
/* auto loader */
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.class.php';
    $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.class.php';
    if (file_exists($file)) {
        include $file;
    }
});
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.trait.php';
    $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.trait.php';
    if (file_exists($file)) {
        include $file;
    }
});
/* end auto loader */

/* Item data */
$item = array(
    '256',
    'candy',
    2,
    199.99
);

$item2 = array(
    '12',
    'candy2',
    2,
    25
);


/* Customer data */
$customerArray = array(
    'first_name' => 'Bill',
    'last_name' => 'Platt',
    'address' => array(
        array(
            '12438 Duckett Ct',
            '',
            'Spring Hill',
            'Florida',
            '34610'
        )
    )
);

/* pretend values from some unkown shipping api */
$shippingQuote = array('method'=>'USPS', 'rate'=>'7.95');
$quotes = new Shipping($shippingQuote);


/* item id for testing */
$itemId = 12;

$customer = new Customer($customerArray);


$customer->getCart()->addToCart(new CartItem($item));
$customer->getCart()->addToCart(new CartItem($item2));

$totals = new CartTotals();


echo 'Customer First Name';
echo '<pre>';
echo $customer->getFirstName() .' ' .$customer->getLastName() ;
echo '</pre>';

echo '<br>';
echo 'Customer Address';
echo '<pre>';
var_dump($customer->getAddress('billing'));
echo '</pre>';

echo 'All cart contents';
echo '<pre>';
var_dump($customer->getCart()->getCartContents());
echo '</pre>';

echo 'Customer Shipping Address';
echo '<pre>';
var_dump($customer->getAddress('shipping'));
echo '</pre>';

echo 'One cart item name';
echo '<pre>';
echo $customer->getCart()->getCartItemById($itemId)->getItemName();
echo '</pre>';

echo 'Item plus tax and shipping';
echo '<pre>';

/* item price in var for readability for method call */
$itemprice = $customer->getCart()->getCartItemById($itemId)->getItemPrice();
echo $totals->calcItem($itemprice, .07, $quotes->getShipRate() );
echo '</pre>';


echo 'SubTotal: All items without tax and shipping';
echo '<pre>';

/* item price in var for readability for method call */
echo $totals->cartSubTotal($customer->getCart(), .07, $quotes->getShipRate() );
echo '</pre>';

echo 'Total: All items plus tax and shipping';
echo '<pre>';

/* item price in var for readability for method call */
echo $totals->cartTotal($customer->getCart(), .07, $quotes->getShipRate() );
echo '</pre>';


