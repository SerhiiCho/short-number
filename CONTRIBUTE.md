# Contribute language support

Contribute another language is very simple. You need to make 3 steps:
 
### 1. Translations
Add translations to `resources/translations.php` file. Here is the file:

```php
return [
    // English
    'en' => [
        'thousand' => 'k',
        'million' => 'm',
        'billion' => 'b',
        'trillion' => 't',
    ],
    // Russian
    'ru' => [
        'thousand' => 'тыс',
        'million' => 'млн',
        'billion' => 'млд',
        'trillion' => 'трн',
    ],
    // add same for your language
];
```

### 2. Tests

After adding another language, you need to add line to `tests/TranslationsTest.php`. The method `runTestsForSuffixes(string $lang, string[] $suffixes)` will generate tests for you. You just need to run `./vendor/bin/phpunit` to make sure your translation works. 

```php
class TranslationsTest extends TestCase
{
    public function testing_correct_conversion(): void
    {
        $this->runTestsForSuffixes('en', ['k', 'm', 'b', 't']);
        $this->runTestsForSuffixes('ru', ['тыс', 'млн', 'млд', 'трн']);
        // add same line for your language here
    }
}
```

### 3. README.md

Last step you need to add new language to README.md file under the section **Supported languages**.
