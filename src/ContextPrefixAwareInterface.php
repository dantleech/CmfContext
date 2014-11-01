<?php

namespace Symfony\Cmf\Component\Context;

/**
 * Prefix aware interface
 */
interface ContextPrefixAwareInterface extends ContextInterface
{
    public function getPrefixPath($name);
}
