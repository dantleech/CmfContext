<?php

namespace Symfony\Cmf\Component\Context;

use Symfony\Cmf\Component\Context\ObjectRequest;

interface ObjectResolverInterface
{
    public function resolve(ObjectRequest $request);
}
