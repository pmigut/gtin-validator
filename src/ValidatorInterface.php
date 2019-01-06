<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


interface ValidatorInterface
{
    public static function isValid(string $gtin): bool;
}