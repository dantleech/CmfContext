<?php

namespace Symfony\Cmf\Component\Context\Context;

class DocumentContext extends ConfiguredContext implements ContextRoleAwareInterface
{
    private $contextDocument;

    /**
     * @param ContextDocumentInterface ODM Document
     */
    public function setDocument(ContextDocumentInterface $contextDocument)
    {
        $this->contextDocument = $contextDocument;
    }

    public function getIdentifierForRole($role)
    {
        return $this->contextDocument->getIdentifierForRole($role);
    }
}
