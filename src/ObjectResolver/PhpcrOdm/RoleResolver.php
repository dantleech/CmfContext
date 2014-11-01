<?php

namespace Symfony\Cmf\Component\Context\ObjectResolver;

class RoleResolver
{
    private $documentManager;
    private $context;

    public function __construct(RoleAwareContextInterface $context, DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
        $this->context = $context;
    }

    public function supports(ObjectRequest $request)
    {
        $identifier = $request->getIdentifier();

        if (substr($identifier, 0, 1) === '@') {
            return true;
        }

        return false;
    }

    public function resolve(ObjectRequest $request)
    {
        $role = $this->parseRole($request->getIdentifier());
        $resolvedIdentifier = $this->context->getRoleIdentifier($role);

        $document = $this->documentManager->find(null, $resolvedPath);

        if (null === $document) {
            throw new ObjectNotFoundException(sprintf(
                'Could not find object at resolved path "%s" by role "%s"',
                $resolvedPath,
                $role
            ));
        }


        return $resolvedIdentifier;
    }

    private function parseRole($identifier)
    {
        return substr($identifier, 1);
    }
}
