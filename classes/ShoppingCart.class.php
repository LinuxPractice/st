<?php
namespace classes;

use traits\CustomErrorObject;

/**
 *
 * @author Bill
 *        
 */
class ShoppingCart
{
    /**
     * Add a trait for returning an error object for
     * methods that return an error where an object is specified
     */
    use CustomErrorObject;

    /**
     * Placeholder for cart id
     * Read only
     * This should really be an integer derived from a database
     *
     * @var string
     */
    private $cartId = null;

    /**
     * Placeholder for cart contents
     * Read only, must use ShoppingCart::addToCart
     *
     * @var array
     */
    private $cartContents = [];

    /**
     * Constructor;
     * Create a unique id for the cart
     */
    public function __construct()
    {
        /* id should be generated from shopping cart table, this is for testing */
        $this->cartId = uniqid('st_', TRUE);
    }

    /**
     * Get the cart id
     *
     * @return string
     */
    public function getCartId(): string
    {
        return $this->cartid;
    }

    /**
     * Get cart contents
     *
     * @return array
     */
    public function getCartContents(): array
    {
        return $this->cartContents;
    }

    /**
     * Get one cart item by id
     *
     * @param int $id
     * @return CartItem
     */
    public function getCartItemById(int $id): CartItem
    {
        foreach ($this->cartContents as $k => $v) {
            if ($v->getItemId() == $id) {
                return $this->cartContents[$k];
            }
        }
        return $this->createErrorObject('Product not found');
    }

    /**
     * Set cart contents
     *
     * @param CartItem $item
     */
    public function addToCart(CartItem $item)
    {
        $this->cartContents[] = $item;
    }
}