<?php

namespace Symfony\Cmf\Component\Context;

use Symfony\Cmf\Component\Context\ObjectRequest;

interface ContextInterface
{
    public function translateIdentifier(ObjectRequest $request);
}
