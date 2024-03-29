<?php

namespace Claudusd\Invoicing;

use Claudusd\Invoicing\InvoicingInterface;
use Claudusd\Invoicing\Model\CustomerInterface;
use Claudusd\Invoicing\Model\ProductSet;
use Claudusd\Invoicing\Model\SellerInterface;
use Claudusd\Invoicing\Provider\AbstractProvider;

/**
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 */
class Invoicing implements InvoicingInterface
{
    private $providers = array();

    private $provider;

    public function generate(CustomerInterface $customer, SellerInterface $seller, ProductSet $productSet)
    {
        return $this->provider->getInvoicing($customer, $seller, $productSet);
    }

    public function using($name)
    {
        if (isset($this->providers[$name])) {
            $this->provider = $this->providers[$name];
        }
        return $this;
    }

    public function registerProviders(array $providers = array())
    {
        foreach ($providers as $provider) {
            $this->registerProvider($provider);
        }
        return $this;
    }

    public function registerProvider(AbstractProvider $provider)
    {
        if (null !== $provider) {
            $this->providers[$provider->getName()] = $provider;
        }
        return $this;
    }

    public function getProviders()
    {
        return $this->providers;
    }
}