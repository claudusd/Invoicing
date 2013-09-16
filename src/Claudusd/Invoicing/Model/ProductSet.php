<?php

namespace Claudusd\Invoicing\Model;

/**
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 */
class ProductSet implements \IteratorAggregate, \Countable
{
    /**
     * The set of entryset.
     */
    private $array;

    /**
     *
     */
    public function __construct()
    {
        $this->array = array();
    }

    /**
     * 
     * @param
     * @param
     * @return
     */
    public function add(ProductInterface $product, $amount = 1) 
    {
        if(array_key_exists($product->getReference(), $this->array)) {
            $this->array[$product->getReference()]->setAmount($amount);
        } else {
            $this->array[$product->getReference()] = new ProductSetEntry($product, $amount);
        }
        return $this;
    }

    /**
     *
     * @param
     * @param
     * @return
     */
    public function remove(ProductInterface $product, $amount = null)
    {
        if(array_key_exists($product->getReference(), $this->array)) {
            if(is_null($amount)) {
                return $this->removeProductCompletely($product);
            }

            if($amount < $this->array[$product->getReference()]->getAmount()) {
                $this->array[$product->getReference()]->setAmount(-$amount);
                return true;
            } elseif ($amount == $this->array[$product->getReference()]->getAmount()) {
                return $this->removeProductCompletely($product);
            }
        }
        return false;
    }

        /**
         *
         * @param 
         * @return 
         */
        private function removeProductCompletely(ProductInterface $product)
        {
            unset($this->array[$product->getReference()]);
            return true;
        }

    /**
     * 
     */
    public function clear()
    {
        unset($this->array);
        $this->array = array();
    }

    /**
     *
     * @param
     * @return
     */
    public function get($reference)
    {
        if(array_key_exists($reference, $this->array)) {
            return $this->array[$reference];
        }
        throw new \OutOfBoundsException('The product with the reference '.$reference.' not exist in the set.');
    }

    /**
     *
     * @return 
     */
    public function getIterator() 
    {
        return new \ArrayIterator($this->array);
    }

    /**
     * 
     * @return 
     */
    public function count() 
    { 
        return count($this->array);
    } 
}