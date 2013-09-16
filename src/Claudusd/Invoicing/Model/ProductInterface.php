<?php

namespace Claudusd\Invoicing\Model;

interface ProductInterface
{
    public function getReference();

    public function getPrice();

    public function getTax();

    public function getDescription();
}