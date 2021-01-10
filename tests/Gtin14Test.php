<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


class Gtin14Test extends GtinTestAbstract
{
    public function isValidProvider()
    {
        return [
            ['00000000000000', false],    // only zeros
            ['450385380748383', false],   // too long
            ['4503853807483', false],     // too short
            ['4 503 8538074838', false],  // not only digits
            ['4-5-038538-074838', false], // not only digits
            ['45038538074830', false],    // invalid check digit
            ['40000018074831', false],    // invalid prefix
            ['45038538074838', true],     // valid
            ['30000906332848', true]      // valid
        ];
    }

    /**
     * @dataProvider isValidProvider
     * @covers \Pmigut\GtinValidator\Gtin14::isValid
     */
    public function testIsValid($gtin, $expected)
    {
        parent::testIsValid($gtin, $expected);
    }

    /**
     * @covers \Pmigut\GtinValidator\Gtin14::testStrictTypes
     */
    public function testStrictTypes()
    {
        parent::testStrictTypes();
    }
}
