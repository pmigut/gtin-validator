<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


class Gtin13Test extends GtinTestAbstract
{
    public function isValidProvider()
    {
        return [
            ['0000000000000', false],    // only zeros
            ['50385380748302', false],   // too long
            ['503853807483', false],     // too short
            ['5 0385 38074830', false],  // not only digits
            ['5.0385.3807.4830', false], // not only digits
            ['5038538074833', false],    // invalid check digit
            ['9668538074835', false],    // invalid prefix
            ['5038538074830', true],     // valid
            ['0000906332847', true]      // valid
        ];
    }
}
