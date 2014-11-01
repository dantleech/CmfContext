<?php

namespace Symfony\Cmf\Component\Context\ObjectResolver;

class PathResolver
{
    private $documentManager;
    private $context;

    public function __construct(PrefixAwareContextInterface $context, DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
        $this->context = $context;
    }

    public function supports(ObjectRequest $request)
    {
        return true;
    }

    public function resolve(ObjectRequest $request)
    {
        $path = $request->getIdentifier();
        $prefixName = $request->getObjectDomain();

        $prefixPath = $this->context->getPrefixPath($prefixName);
        $resolvedPath = $prefixPath . '/' . $path;

        $document = $this->documentManager->find(null, $resolvedPath);

        if (null === $document) {
            throw new ObjectNotFoundException(sprintf(
                'Could not find object at resolved path "%s"',
                $resolvedPath
            ));
        }

        return $document;
    }
}

