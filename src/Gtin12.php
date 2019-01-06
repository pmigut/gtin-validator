<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


class Gtin12 extends GtinAbstract implements ValidatorInterface
{
    public static function isValid(string $gtin): bool
    {
        if (!static::isValidFormat($gtin, 12)) {
            return false;
        }

        if (!static::isValidChecksum($gtin)) {
            return false;
        }

        return static::isValidGtin13Prefix('0' . $gtin);
    }
}