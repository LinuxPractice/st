<?php
namespace classes;

/**
 *
 * @author Bill
 *        
 */
class CartItem
{

    /**
     * Placeholder for item id
     *
     * @var int
     */
    private $itemId;

    /**
     * Placeholder for item name
     *
     * @var string
     */
    private $itemName;

    /**
     * Place holder for item quantity
     *
     * @var int
     */
    private $itemQuantity;

    /**
     * Placeholder for item price
     *
     * @var float
     */
    private $itemPrice;

    /**
     * Constructor
     *
     * Add item and set values
     *
     * @todo Add validity checks on passed data
     *      
     * @param array $item
     */
    public function __construct(array $item)
    {
        $this->setItemId($item[0]);
        $this->setItemName($item[1]);
        $this->setItemQuantity($item[2]);
        $this->setItemPrice($item[3]);
    }

    /**
     * Get this item ID
     *
     * @return int
     */
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /**
     * Set an item id
     *
     * @todo Should this be private? Would any usecase exist
     *       for changing a product id?
     *      
     * @param int $id
     */
    public function setItemId(int $id)
    {
        $this->itemId = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * Get an item name
     *
     * @return string
     */
    public function getItemName(): string
    {
        return $this->itemName;
    }

    /**
     * Set the item name
     *
     * @param string $name
     */
    public function setItemName(string $name)
    {
        $this->itemName = filter_var($name, FILTER_SANITIZE_STRING);
    }

    /**
     * Get the item quantity
     *
     * @return int
     */
    public function getItemQuantity(): int
    {
        return $this->itemQuantity;
    }

    /**
     * Set the item quantity
     *
     * @param int $qty
     */
    public function setItemQuantity(int $qty)
    {
        $this->itemQuantity = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * Get the item price
     *
     * @return float
     */
    public function getItemPrice(): float
    {
        return $this->itemPrice;
    }

    /**
     * Set the item price
     *
     * @param float $price
     */
    public function setItemPrice(float $price)
    {
        $this->itemPrice = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
}