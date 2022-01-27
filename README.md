[![Build Status](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2FSerhiiCho%2Fshort-number%2Fbadge&style=flat)](https://actions-badge.atrox.dev/SerhiiCho/short-number/goto)
[![Latest Stable Version](https://poser.pugx.org/serhii/short-number/v/stable)](https://packagist.org/packages/serhii/short-number)
[![Total Downloads](https://poser.pugx.org/serhii/short-number/downloads)](https://packagist.org/packages/serhii/short-number)
[![License](https://poser.pugx.org/serhii/short-number/license)](https://packagist.org/packages/serhii/short-number)
<a href="https://php.net/" rel="nofollow"><img src="https://camo.githubusercontent.com/2b1ed18c21257b0a1e6b8568010e6e8f3636e6d5/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f7068702d253345253344253230372e312d3838393242462e7376673f7374796c653d666c61742d737175617265" alt="Minimum PHP Version" data-canonical-src="https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg" style="max-width:100%;"></a>

- [✏️ Description](#description)
- [🐘 Supported PHP versions](#supported-php-versions)
- [⚙️ Language configurations](#language-configurations)
- [🚩 Supported languages](#supported-languages)
- [👏 Usage](#usage)
- [🤲 Options](#options)
- [🚀 Quick start](#quick-start)
- [🎁 Contribute](https://github.com/SerhiiCho/short-number/blob/master/CONTRIBUTE.md)

## Description

Lightweight package shortens given number to a short representation of it. For example **1234** will be formatted to **1k** and **20244023** to **20m**. Package supports multiple languages, the default it's set to English.

## Supported PHP versions

- ✅ 7.1
- ✅ 7.2
- ✅ 7.3
- ✅ 7.4
- ✅ 8.0
- ✅ 8.1


## Language configurations

#### Change language

For changing the language you want to call `set()` method once before calling other methods from this package.

```php
Serhii\ShortNumber\Lang::set('ru');
```

#### Overwrite translations

If you want to replace existing translations for supported language or add your own language, you can pass custom translations as the second argument to `set()` method.

```php
// Overwriting all fields
Serhii\ShortNumber\Lang::set('en', [
    'thousand' => 'thou',
    'million' => 'mil',
    'billion' => 'bil',
    'trillion' => 'tril',
]);
```
You can overwrite any fields that you need, overwriting all fields is not necessary.

```php
// Overwriting 1 field
Serhii\ShortNumber\Lang::set('en', ['million' => 'mil']);
```

## Supported languages

| Flag | Language | Code (ISO 639-1) | Thousand | Million | Billion | Trillion |
| --- | --- | --- | --- | --- | --- | --- |
| 🇬🇧 | English | en | 1k | 1m | 1b | 1t |
| 🇷🇺 | Russian | ru | 1тыс | 1млн | 1млд | 1трн |
| 🇺🇦 | Ukrainian | uk | 1тис | 1млн | 1млд | 1трн |

## Usage

```php
use Serhii\ShortNumber\Number;

Number::conv(1893234); // returns: 1m
Number::conv(20234); // returns: 20m
```

## Options

#### Output to lowercase

By default, conv() method is returning lowercase result, to make it uppercase just pass `Option::UPPER` as the second argument to a `conv()` method.

```php
use Serhii\ShortNumber\Option;
use Serhii\ShortNumber\Number;

Number::conv(1352); // returns: 1k
Number::conv(1352, Option::UPPER); // returns: 1K
```

## Quick start

```bash
composer require serhii/short-number
```
