<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


class Gtin8 extends GtinAbstract implements ValidatorInterface
{
    public static function isValid(string $gtin): bool
    {
        if (!static::isValidFormat($gtin, 8)) {
            return false;
        }

        if (!static::isValidChecksum($gtin)) {
            return false;
        }

        return static::isValidGtin8Prefix($gtin);
    }
}