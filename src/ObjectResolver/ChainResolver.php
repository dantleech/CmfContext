<?php

namespace ObjectResolver;

use Symfony\Cmf\Component\Context\ObjectResolverInterface;

class ChainResolver implements ObjectResolverInterface
{
    protected $objectResolvers = array();

    public function addObjectResolver(ObjectResolverInterface $objectResolver)
    {
        $this->objectResolvers[] = $objectResolver;
    }

    public function resolve(ObjectRequest $request)
    {
        foreach ($this->objectResolves as $resolver) {
            try {
                $resolver->resolve($request);
            } catch (ObjectNotFoundException $e) {
                continue;
            }
        }

        throw new ObjectNotFoundException(sprintf(
            'None of the object resolvers were able to resolve the object request'
        ));
    }
}
