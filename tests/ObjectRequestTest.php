<?php

namespace Symfony\Cmf\Component\Context;

use Symfony\Cmf\Component\Context\ObjectRequest;

class ObjectRequestTest extends \PHPUnit_Framework_Testcase
{
    public function provideCreateFromUrl()
    {
        return array(
            array('phpcrodm:foo/bar', 'phpcrodm', 'foo/bar'),
            array('phpcrodm:@foobar', 'phpcrodm', '@foobar'),

            array('@foobar', null, '@foobar'),
            array('foobar', null, 'foobar'),

            array('doctrineorm://tableName/foobar')
        );
    }

    /**
     * @dataProvider provideCreateFromUrl
     */
    public function testCreateFromUrl($url, $expectedScheme, $expectedIdentifier)
    {
        $new = ObjectRequest::createFromUrl($url);

        $this->assertEquals($expectedScheme, $new->getProviderName());
        $this->assertEquals($expectedIdentifier, $new->getIdentifier());
    }
}
