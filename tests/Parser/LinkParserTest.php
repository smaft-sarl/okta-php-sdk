<?php

namespace Smaft\OktaSdk\Tests\Parser;

use Smaft\OktaSdk\Parser\LinkParser;

class LinkParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestParseData
     */
    public function testParse($linkHeader, array $expectedLinks)
    {
        $parser = new LinkParser();
        $links = $parser->parseLinkHeader($linkHeader);

        $this->assertSame($expectedLinks, $links);
    }

    public function getTestParseData()
    {
        return [
            [
                '<https://yoursubdomain.okta.com/api/v1/users?after=00ubfjQEMYBLRUWIEDKK>; rel="next", <https://yoursubdomain.okta.com/api/v1/users?after=00ub4tTFYKXCCZJSGFKM>; rel="self"',
                [
                    'next' => 'https://yoursubdomain.okta.com/api/v1/users?after=00ubfjQEMYBLRUWIEDKK',
                    'self' => 'https://yoursubdomain.okta.com/api/v1/users?after=00ub4tTFYKXCCZJSGFKM',
                ]
            ],
            [
                '',
                []
            ]
        ];
    }
}
