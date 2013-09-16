<?php

namespace Claudusd\Invoicing\Tax;

/**
 * The tax Interface.
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 */
interface TaxInterface
{
    /**
     * Get the tax's value in percent.
     * @return float The percent value of the tax.
     */
    public function getValue();

    /**
     * Get the tax name.
     * @return string The tax name.
     */
    public function getName();
}