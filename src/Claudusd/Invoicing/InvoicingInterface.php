<?php

namespace Claudusd\Invoicing;

use Claudusd\Invoicing\Model\CustomerInterface;
use Claudusd\Invoicing\Model\ProductSet;
use Claudusd\Invoicing\Model\SellerInterface;

interface InvoicingInterface
{
    public function generate(CustomerInterface $customer, SellerInterface $seller, ProductSet $productSet);
}