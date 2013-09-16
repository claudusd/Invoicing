<?php

namespace Claudusd\Invoicing\Provider;

/**
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 */
abstract class AbstractProvider
{
    /**
     * 
     * @return Invoicing 
     */
    abstract public function getInvoicing(CustomerInterface $customer, SellerInterface $seller, ProductSet $productSet);

    abstract public function getName();
}