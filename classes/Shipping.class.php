<?php
namespace classes;

/**
 *
 * @author Bill
 *        
 */
class Shipping
{

    /**
     *
     * @var string
     */
    private $shipMethod;

    /**
     *
     * @var float
     */
    private $shipRate;

    /**
     * Constructor
     * Set shipping method and rates
     *
     * @param array $quote
     */
    public function __construct($quote = null)
    {
        $this->setShipMethod($quote['method']);
        $this->setShipRate((float) $quote['rate']);
    }

    /**
     * Get the shipping method
     *
     * @return string
     */
    public function getShipMethod(): string
    {
        return $this->shipMethod;
    }

    /**
     * Set the shipping method
     *
     * @param string $shipMethod
     */
    public function setShipMethod(string $shipMethod)
    {
        $this->shipMethod = filter_var($shipMethod, FILTER_SANITIZE_STRING);
    }

    /**
     * Get the shipping rate
     *
     * @return float
     */
    public function getShipRate(): float
    {
        return $this->shipRate;
    }

    /**
     * Set the shipping rate
     *
     * @param float $shipRate
     */
    public function setShipRate(float $shipRate)
    {
        $this->shipRate = filter_var($shipRate, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
}