<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


class Gtin8Test extends GtinTestAbstract
{
    public function isValidProvider()
    {
        return [
            ['00000000', false],    // only zeros
            ['873406791', false],   // too long
            ['8734067', false],     // too short
            ['8 7340679', false],   // not only digits
            ['8-734-0679', false],  // not only digits
            ['87340670', false],    // invalid check digit
            ['20334536', false],    // invalid prefix
            ['87340679', true],     // valid
            ['96134535', true]      // valid
        ];
    }
}
