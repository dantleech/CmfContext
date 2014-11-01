<?php

namespace Symfony\Cmf\Component\Context;

class ObjectRequest
{
    private $providerName;
    private $identifier;

    public function __construct($providerName = null, $identifier = null)
    {
        $this->providerName = $providerName;
        $this->identifier = $identifier;
    }

    public function getProviderName() 
    {
        return $this->providerName;
    }

    public function getIdentifier() 
    {
        return $this->identifier;
    }
}
