<h2 align="center">Ago</h2>

Light package that shortens given number by taking digits and adding K, M, B or T after them. For example **1234** will be formatted to **1K** and **20244023** to **20M**. Package supports multiple languages, the default is English.

## Supported languages

| Language  | Short | Thousand | Million   | Billion | Trillion |
| :-------- |:------|:---------|:----------|:--------|:---------|
| English   | en    | 1k       | 1m        | 1b      | 1t       |
| Русский   | ru    | 1тыс     | 1млн      | 1млд    | 1трн     |

## Change language

For changing the language you want to call `set` method once before calling other methods from this package.

```php
Serhii\ShortNumber\Lang::set('ru');
```
## Contribute

You can provide any issues or pull requests that are in frame of this package. For adding language support you can copy any file in `src/lang` directory and translate it. After adding language would be nice to add information about new language to a table in README.md file in section "Supported languages".
