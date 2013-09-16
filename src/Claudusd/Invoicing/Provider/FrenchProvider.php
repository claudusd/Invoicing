<?php
namespace Claudusd\Invoicing\Provider;

/**
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 */
class FrenchProvider extends AbstractProvider
{
    private $hasTVA;

    public function __construct($hasTVA)
    {
        $this->hasTVA = $hasTVA;
    }

    /**
     * 
     * @return Invoicing 
     */
    public function getInvoicing(CustomerInterface $customer, SellerInterface $seller, ProductSet $productSet)
    {

    }

    public function getName()
    {
        return 'invoicing_french';
    }
}