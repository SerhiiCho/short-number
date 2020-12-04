<?php declare(strict_types=1);

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
     * @param string $lang Can be 'ru' or 'en' or other languages
     * that are supported by this package. All supported languages
     * you can find on Github page.
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
        $file_paths = \glob(__DIR__.'/lang/*.php');

        return \array_map(static function ($path) {
            \preg_match('!/([a-z]+).php!', $path, $lang);
            return $lang[1];
        }, $file_paths);
    }

    /**
     * @param string $index The key name of the translation
     * @return string|null Needed translation for current language,
     * if translation not found returns null
     */
    public static function trans(string $index): ?string
    {
        return self::$translations[$index] ?? null;
    }

    /**
     * Includes array of translations from lang directory
     * into the $translations variable.
     */
    public static function includeTranslations(): void
    {
        self::$translations = self::$lang === 'ru'
            ? require __DIR__.'/lang/ru.php'
            : require __DIR__.'/lang/en.php';
    }
}
