<?php

namespace Claudusd\Invoicing\Tests\Model;

use Claudusd\Invoicing\Model\ProductSetEntry;

use Claudusd\Invoicing\Tests\InvoicingTest;

class ProductSetEntryTest extends InvoicingTest
{
    public function testProductSetEntry()
    {
        $product1 = $this->getMock('Claudusd\Invoicing\Model\ProductInterface');
        $product1->expects($this->any())
            ->method('getReference')
            ->will($this->returnValue('ref1'));

        $entrySet = new ProductSetEntry($product1, 9);
        $this->assertEquals(9, $entrySet->getAmount());
        $entrySet->setAmount(2);
        $this->assertEquals(11, $entrySet->getAmount());
        $this->assertEquals($product1->getReference(), $entrySet->getProduct()->getReference());
    }
}