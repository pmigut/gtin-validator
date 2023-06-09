[![Build Status](https://travis-ci.org/pmigut/gtin-validator.svg?branch=master)](https://travis-ci.org/pmigut/gtin-validator)

This library is a set of static methods for GTIN validation.

The library is best suited for quick validation of many codes without instantiating new object for each code.
Simple `true` or `false` is returned and no additional details are provided on failure. Only trade product codes return
 `true`, codes with restricted or special use prefix return `false`.

Supported codes
 
- GTIN-8 (former EAN-8)
- GTIN-12 (former UPC)
- GTIN-13 (former EAN-13)
- GTIN-14

Checks performed

- format
- check digit
- GS1 prefix

Implementation is based on GS1 General Specifications ver. 18, Jan 2018.
Prefix list last updated on 9 June 2023.


### Installation

Via Composer

```bash
$ composer require pmigut/gtin-validator
```

Via Git

```bash
$ git clone git@github.com:pmigut/gtin-validator.git
```

### Examples

**Basic usage**

```php
<?php

use Pmigut\GtinValidator\Gtin8;

var_dump(Gtin8::isValid('12312312'));
// Output: false

```

**Strict types**

`isValid` method expects `string` argument. If `strict_types=1` is declared, `isValid` may throw `TypeError`.

```php
<?php
declare(strict_types=1);

use Pmigut\GtinValidator\Gtin8;

var_dump(Gtin8::isValid(12312312));
// Output: PHP Fatal error:  Uncaught TypeError: Argument 1 passed to
// Pmigut\GtinValidator\Gtin8::isValid() must be of the type string, integer given
```

**Leading zeros**

Codes are validated as is, no leading zeros are added.

```php
<?php

use Pmigut\GtinValidator\Gtin13;

var_dump(Gtin13::isValid('0000906332847'));
// Output: true

var_dump(Gtin13::isValid('906332847'));
// Output: false
``` 

### Testing

```bash
$ composer test
```

### License

This library is licensed under the MIT License, see [LICENSE](LICENSE) for details.