<?php

namespace Claudusd\Invoicing\Tests\Model;

use Claudusd\Invoicing\Model\ProductSet;
use Claudusd\Invoicing\Model\ProductSetEntry;

use Claudusd\Invoicing\Tests\InvoicingTest;

class ProductSetTest extends InvoicingTest
{
    public function testProductSet()
    {
        $product1 = $this->getMock('Claudusd\Invoicing\Model\ProductInterface');
        $product1->expects($this->any())
            ->method('getReference')
            ->will($this->returnValue('ref1'));

        $product2 = $this->getMock('Claudusd\Invoicing\Model\ProductInterface');
        $product2->expects($this->any())
            ->method('getReference')
            ->will($this->returnValue('ref2'));

        $set = new ProductSet();

        $set->add($product1);
        $set->add($product2, 5);
        $this->assertEquals(2, count($set));

        $set->add($product1, 1);
        $this->assertEquals(2, count($set));
        $this->assertTrue($set->get('ref1') instanceof ProductSetEntry);
        $this->assertEquals(2, $set->get('ref1')->getAmount());

        try {
            $set->get('ref3');
            $this->fail('An expected exception (OutOfBoundsException) has not been raised.');
        } catch(\OutOfBoundsException $e) { }

        foreach ($set as $key => $value) { }

        $this->assertTrue($set->remove($product1));
        $this->assertFalse($set->remove($product2, 6));
        $this->assertTrue($set->remove($product2, 1));
        $this->assertEquals(4, $set->get('ref2')->getAmount());
        $this->assertTrue($set->remove($product2, 4));
        $this->assertEquals(0, count($set));
        $this->assertFalse($set->remove($product1));

        $set->add($product1);
        $set->add($product2, 5);

        $set->clear();
        $this->assertEquals(0, count($set));
    }
}