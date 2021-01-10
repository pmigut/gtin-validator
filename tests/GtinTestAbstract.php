<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;

use PHPUnit\Framework\TestCase;
use TypeError;

abstract class GtinTestAbstract extends TestCase
{
    public function testIsValid($gtin, $expected)
    {
        /** @var ValidatorInterface $className */
        $className = static::getTargetClassName();
        $this->assertSame(
            $className::isValid($gtin),
            $expected,
            $gtin .' should be '. ($expected ? 'valid' : 'invalid') .' '. str_replace(__NAMESPACE__.'\\', '', $className));
    }

    public function testStrictTypes()
    {
        /** @var ValidatorInterface $className */
        $className = static::getTargetClassName();
        $this->expectException(TypeError::class);
        $className::isValid(1);
    }

    private function getTargetClassName()
    {
        return str_replace('Test', '', static::class);
    }

    abstract public function isValidProvider();
}
