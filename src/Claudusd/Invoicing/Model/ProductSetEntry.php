<?php

namespace Claudusd\Invoicing\Model;

/**
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 */
class ProductSetEntry
{
    /**
     * The product of the entry set.
     */
    private $product;

    /**
     * The amount of product in the entry set.
     */
    private $amount;

    /**
     *
     * @param
     * @param 
     * @throws RangeException
     */
    public function __construct(ProductInterface $product, $amount)
    {
        if($amount <= 0 ) {
            throw new \RangeException('The amount must be superior to 0');
        }
        $this->product = $product;
        $this->amount = $amount;
    }

    /**
     * To change the 
     * @param 
     * @return 
     */
    public function setAmount($amount)
    {
        $this->amount += $amount;
        return $this;
    }

    /**
     * Get the amount of product of the entry set.
     * @return int The amount of product.
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the product of the entry set.
     * @return ProductInterface The product of the entry set.
     */
    public function getProduct()
    {
        return $this->product;
    }
}