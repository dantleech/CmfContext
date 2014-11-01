<?php

namespace Symfony\Cmf\Component\Context\Context;

class ConfiguredContext implements ContextPrefixAwareInterface
{
    protected $prefixes = array();

    public function addPrefix($name, $prefix)
    {
        $this->prefixes[$name] = $prefix;
    }

    public function getPrefix($name)
    {
        if (!isset($this->prefixes[$domain])) {
            throw new \InvalidArgumentException(sprintf(
                'Unknown prefix domain "%s"',
                $domain
        }
    }
}
