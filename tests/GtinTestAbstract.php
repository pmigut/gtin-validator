<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;

use PHPUnit\Framework\TestCase;

abstract class GtinTestAbstract extends TestCase
{
    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($gtin, $expected)
    {
        $className = static::getTargetClassName();
        $this->assertSame(
            $className::isValid($gtin),
            $expected,
            $gtin .' should be '. ($expected ? 'valid' : 'invalid') .' '. str_replace(__NAMESPACE__.'\\', '', $className));
    }

    public function testStrictTypes()
    {
        $className = static::getTargetClassName();
        $this->expectException(\TypeError::class);
        $className::isValid(1);
    }

    private function getTargetClassName()
    {
        return str_replace('Test', '', static::class);
    }

    abstract public function isValidProvider();
}
