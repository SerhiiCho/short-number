<h1 align="center">Short number</h1>

Shortens given number by taking digits and adding K, M, B or T after them. For example **1234** will be formatted to **1K** and **20244023** to **20M**. Package supports multiple languages, the default is English.

## Supported languages

| Language  | Short | Thousand | Million   | Billion | Trillion |
| :-------- |:------|:---------|:----------|:--------|:---------|
| English   | en    | 1K       | 1M        | 1B      | 1T       |
| Русский   | ru    | 1ТЫС     | 1МЛН      | 1МЛД    | 1ТРН     |

## Usage

```php
use Serhii\ShortNumber\Conv;

Conv::short(1893234); // returns: 1M
Conv::short(20234); // returns: 20K
```

## Configurations

#### Change language

For changing the language you want to call `set` method once before calling other methods from this package.

```php
Serhii\ShortNumber\Lang::set('ru');
```

## Options

#### Output to lowercase

By default uppercase is set, to make it lower just pass `lower` as the seconds argument to a `short` method.

```php
use Serhii\ShortNumber\Conv;

Conv::short(1352); // returns: 1K
Conv::short(1352, 'lower'); // returns: 1k
```

## Get started

```bash
composer require serhii/short-number
```

## Contribute

You can provide any issues or pull requests that are in frame of this package. For adding language support you can copy any file in `src/lang` directory and translate it. After adding language would be nice to add information about new language to a table in README.md file in section [Supported languages](https://github.com/SerhiiCho/short-number#supported-languages).
