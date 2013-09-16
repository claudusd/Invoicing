<?php

namespace Claudusd\Invoicing\Tests\Model;

use Claudusd\Invoicing\Invoicing;
use Claudusd\Invoicing\Provider\FrenchProvider;

use Claudusd\Invoicing\Tests\InvoicingTest;

class RegisterTest extends InvoicingTest
{
    public function testRegister()
    {
        $invoicing = new Invoicing();
        $frenchProvider = new FrenchProvider(true);

        $providers = array($frenchProvider);
        $invoicing->registerProviders($providers);

        $this->assertTrue(array_key_exists($frenchProvider->getName(), $invoicing->getProviders()));

        $invoicing->using($frenchProvider->getName());
    }
}