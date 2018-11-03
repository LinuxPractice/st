<?php
namespace classes;

/**
 *
 * @author Bill
 *        
 */
class Customer
{

    /**
     * Place holder for the customer id
     * readonly
     *
     * @var string
     */
    private $custId;

    /**
     * Placeholder for customers first name
     *
     * @var string
     */
    private $firstName;

    /**
     * Placeholder for customer's last name
     *
     * @var string
     */
    private $lastName;

    /**
     * Array of billing address data
     *
     * @var array
     */
    private $billingAddress;

    /**
     * Array of shipping address data
     *
     * @var array
     */
    private $shippingAddress;

    /**
     * Shopping cart object
     *
     * @var ShoppingCart
     */
    private $cart;

    /**
     * Constructor
     * Init customer values
     *
     * @todo validae input
     *      
     * @param array $customer
     */
    public function __construct(array $customer)
    {
        /* custId is unique and should be from the database */
        $this->custId = uniqid('st_', TRUE);
        $this->setFirstName($customer['first_name']);
        $this->setLastName($customer['last_name']);
        $this->setAddress($customer['address'], 'billing');
        $this->setAddress($customer['address'], 'shipping');
        $this->cart = new ShoppingCart();
    }

    /**
     * Get the customer id
     *
     * @return string
     */
    public function getCustId(): string
    {
        return $this->custId();
    }

    /**
     * Get the customer's first name
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set the customer's first name
     *
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    }

    /**
     * Get the customer's last name
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->LastName;
    }

    /**
     * Set the customer's last name
     *
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->LastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    }

    /**
     * Get the custoemr address
     *
     * valid $type is billing. shipping
     *
     * @param string $type
     * @return array
     */
    public function getAddress(string $type = null): array
    {
        switch ($type) {
            case 'shipping':
                return $this->shippingAddress;
                break;
            case 'billing':
            default:
                return $this->billingAddress;
        }
    }

    /**
     * Set the customer's address
     *
     * @param array $address
     * @param string $type
     */
    public function setAddress(array $address, string $type)
    {
        switch ($type) {
            case 'shipping':
                $this->shippingAddress = $address;
                break;
            case 'billing':
            default:
                $this->billingAddress = $address;
        }
    }

    /**
     * Get the customer's shopping cart
     *
     * @return ShoppingCart
     */
    public function getCart(): ShoppingCart
    {
        return $this->cart;
    }
}