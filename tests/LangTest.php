<?php

declare(strict_types=1);

namespace Serhii\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use Serhii\ShortNumber\Conv;
use Serhii\ShortNumber\Lang;
use Serhii\ShortNumber\Option;
use Serhii\ShortNumber\Rule;

class LangTest extends TestCase
{
    /** @test */
    public function availableLanguages_returns_array_of_file_names_in_lang_directory(): void
    {
        $reflect = new ReflectionMethod(Lang::class, 'availableLanguages');
        $reflect->setAccessible(true);
        $output = $reflect->invoke(new Lang);

        $this->assertContains('ru', $output);
        $this->assertContains('en', $output);
    }

    /**
     * @dataProvider Provider_for_sets_method_sets_russian_the_current_language_for_converter
     * @test
     * @param string $expect
     * @param string $lang
     * @param int $input
     */
    public function sets_method_sets_current_language_for_converter(string $expect, string $lang, int $input): void
    {
        Lang::set($lang);
        $this->assertEquals($expect, Conv::short($input));
        $this->assertEquals(strtolower($expect), Conv::short($input, Option::LOWER));
        $this->assertEquals(strtolower($expect), Conv::short($input, [Option::LOWER]));
    }

    public function Provider_for_sets_method_sets_russian_the_current_language_for_converter(): array
    {
        return [
            ['0', 'en', 0],
            ['1K', 'en', Rule::THOUSAND],
            ['1M', 'en', Rule::MILLION],
            ['1B', 'en', Rule::BILLION],
            ['1T', 'en', Rule::TRILLION],
            ['0',  'ru', 0],
            ['1ТЫС', 'ru', Rule::THOUSAND],
            ['1МЛН', 'ru', Rule::MILLION],
            ['1МЛД', 'ru', Rule::BILLION],
            ['1ТРН', 'ru', Rule::TRILLION],
        ];
    }
}
