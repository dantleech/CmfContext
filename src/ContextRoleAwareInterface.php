<?php

namespace Symfony\Cmf\Component\Context;

/**
 * Role aware interface.
 *
 * Context that is aware of roles
 */
interface ContextPrefixAwareInterface extends ContextInterface
{
    public function getIdentifierForRole($name);
}

