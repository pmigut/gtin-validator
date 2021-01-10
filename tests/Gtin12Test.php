<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


class Gtin12Test extends GtinTestAbstract
{
    public function isValidProvider()
    {
        return [
            ['000000000000', false],    // only zeros
            ['0184664688451', false],   // too long
            ['01846646884', false],     // too short
            ['0 00906332847', false],   // not only digits
            ['0-009063-32847', false],  // not only digits
            ['018466468841', false],    // invalid check digit
            ['020466468845', false],    // invalid prefix
            ['018466468845', true],     // valid
            ['000906332847', true]      // valid
        ];
    }

    /**
     * @dataProvider isValidProvider
     * @covers \Pmigut\GtinValidator\Gtin12::isValid
     */
    public function testIsValid($gtin, $expected)
    {
        parent::testIsValid($gtin, $expected);
    }

    /**
     * @covers \Pmigut\GtinValidator\Gtin12::testStrictTypes
     */
    public function testStrictTypes()
    {
        parent::testStrictTypes();
    }
}
