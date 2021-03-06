[![Build Status](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2FSerhiiCho%2Fshort-number%2Fbadge&style=flat)](https://actions-badge.atrox.dev/SerhiiCho/short-number/goto)
[![Latest Stable Version](https://poser.pugx.org/serhii/short-number/v/stable)](https://packagist.org/packages/serhii/short-number)
[![Total Downloads](https://poser.pugx.org/serhii/short-number/downloads)](https://packagist.org/packages/serhii/short-number)
[![License](https://poser.pugx.org/serhii/short-number/license)](https://packagist.org/packages/serhii/short-number)
<a href="https://php.net/" rel="nofollow"><img src="https://camo.githubusercontent.com/2b1ed18c21257b0a1e6b8568010e6e8f3636e6d5/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f7068702d253345253344253230372e312d3838393242462e7376673f7374796c653d666c61742d737175617265" alt="Minimum PHP Version" data-canonical-src="https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg" style="max-width:100%;"></a>

Lightweight package shortens given number to a short representation of it. For example **1234** will be formatted to **1k** and **20244023** to **20m**. Package supports multiple languages, the default it's set to English.

- [Contribute](https://github.com/SerhiiCho/short-number/blob/master/CONTRIBUTE.md)


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

<table>
    <thead>
        <tr>
            <th>Language</th>
            <th>ISO 639-1</th>
            <th>Thousand</th>
            <th>Million</th>
            <th>Billion</th>
            <th>Trillion</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>English</td>
            <td>en</td>
            <td>1k</td>
            <td>1m</td>
            <td>1b</td>
            <td>1t</td>
        </tr>
        <tr>
            <td>Russian</td>
            <td>ru</td>
            <td>1тыс</td>
            <td>1млн</td>
            <td>1млд</td>
            <td>1трн</td>
        </tr>
        <tr>
            <td>Ukrainian</td>
            <td>uk</td>
            <td>1тис</td>
            <td>1млн</td>
            <td>1млд</td>
            <td>1трн</td>
        </tr>
    </tbody>
</table>

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

## Get started

```bash
composer require serhii/short-number
```
