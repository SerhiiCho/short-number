<h2 align="center">Short number</h2>

Light package that shortens given number by taking digits and adding K, M, B or T after them. For example **1234** will be formatted to **1K** and **20244023** to **20M**. Package supports multiple languages, the default is English.

- [Supported languages](https://github.com/SerhiiCho/short-number#supported-languages)
- [Configurations](https://github.com/SerhiiCho/short-number#configurations)
    - [Change language](https://github.com/SerhiiCho/short-number#change-language)
    - [Output to uppercase](https://github.com/SerhiiCho/short-number#output-to-uppercase)
- [Contribute](https://github.com/SerhiiCho/short-number#contribute)

## Supported languages

| Language  | Short | Thousand | Million   | Billion | Trillion |
| :-------- |:------|:---------|:----------|:--------|:---------|
| English   | en    | 1K       | 1M        | 1B      | 1T       |
| Русский   | ru    | 1ТЫС     | 1МЛН      | 1МЛД    | 1ТРН     |

## Configurations

#### Change language

For changing the language you want to call `set` method once before calling other methods from this package.

```php
Serhii\ShortNumber\Lang::set('ru');
```

#### Output to uppercase

By default uppercase is set, to make it lower just pass `lower` as the seconds argument to a `short` method.

```php
use Serhii\ShortNumber\Conv;

Conv::short(1352); // returns: 1K
Conv::short(1352, 'lower'); // returns: 1k
```

## Contribute

You can provide any issues or pull requests that are in frame of this package. For adding language support you can copy any file in `src/lang` directory and translate it. After adding language would be nice to add information about new language to a table in README.md file in section [Supported languages](https://github.com/SerhiiCho/short-number#supported-languages).
