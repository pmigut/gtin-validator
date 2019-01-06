<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


class Gtin14 extends GtinAbstract implements ValidatorInterface
{
    public static function isValid(string $gtin): bool
    {
        if (!static::isValidFormat($gtin, 14)) {
            return false;
        }

        if (!static::isValidChecksum($gtin)) {
            return false;
        }

        return static::isValidGtin13Prefix(substr($gtin, 1));
    }
}