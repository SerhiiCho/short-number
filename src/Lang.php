<?php

declare(strict_types=1);

namespace Serhii\ShortNumber;

class Lang
{
    /**
     * @var string
     */
    public static $lang = 'en';

    /**
     * @var null|array
     */
    private static $translations;

    /**
     * Set the language by passing language short name
     * like 'en' or 'ru' as the argument.
     * If given language is not supported by this package,
     * it language will be set to English by default.
     *
     * If you don't call this method, the default
     * language will be also English.
     *
     * @param string $lang Can be 'ru' or 'en' for example.
     * Or any other language that is supported by this package.
     *
     * @see https://github.com/SerhiiCho/short-number
     */
    public static function set(string $lang): void
    {
        self::$lang = \in_array($lang, self::availableLanguages(), true) ? $lang : 'en';
    }

    /**
     * Returns array of languages that are currently in lang directory
     *
     * @return array
     */
    private static function availableLanguages(): array
    {
        return self::$translations ? array_keys(self::$translations) : [];
    }

    /**
     * @param string $index The key name of the translation
     * @return string|null Needed translation for current language,
     * if translation not found returns null
     */
    public static function trans(string $index): ?string
    {
        return self::$translations[self::$lang][$index] ?? null;
    }

    public static function includeTranslations(): void
    {
        self::$translations = require __DIR__ . '/../resources/translations.php';
    }
}
