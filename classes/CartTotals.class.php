<?php
namespace classes;

/**
 *
 * @author Bill
 *        
 */
class CartTotals
{

    /**
     * Add tax and shipping to one item
     *
     * @todo Should pass in the shipping object
     * @todo shoudl pass in a tax object
     *      
     * @param float $itemPrice
     * @param float $tax
     * @param float $shipping
     * @return float
     */
    public function calcItem(float $itemPrice, float $tax = 0.00, float $shipping = 0.00): float
    {
        $total = $itemPrice;
        if (! empty($tax)) {
            $total += $this->addTax($itemPrice, $tax);
        }
        if (! empty($shipping)) {
            $total += $shipping;
        }
        return $total;
    }

    /**
     * Add tax
     *
     * @todo Make sure to modify if tax is passed as an object in the future
     *      
     * @param float $itemPrice
     * @param float $tax
     * @return float
     */
    private function addTax(float $itemPrice, float $tax): float
    {
        return ($itemPrice * $tax);
    }

    /**
     * Add tax and shipping to each item in cart and return the sum of all items
     *
     * @param ShoppingCart $cart
     * @param float $tax
     * @param float $shipping
     * @return float
     */
    public function cartSubTotal(ShoppingCart $cart): float
    {
        $contents = $cart->getCartContents();
        $total = 0;
        foreach ($contents as $v) {
            $total += $this->calcItem($v->getItemPrice());
        }
        return $total;
    }

    /**
     * Get Shopping cart totals including tax
     * Optionally add tax
     *
     * @todo Should this be merged with cartSubTotal?
     *      
     * @param ShoppingCart $cart
     * @param float $tax
     * @param float $shipping
     * @return float
     */
    public function cartTotal(ShoppingCart $cart, float $tax, float $shipping = 0.00): float
    {
        $contents = $cart->getCartContents();
        $total = 0;
        foreach ($contents as $v) {
            $total += $this->calcItem($v->getItemPrice(), $tax);
        }
        if (! empty($shipping)) {
            $total += $shipping;
        }
        return $total;
    }
}