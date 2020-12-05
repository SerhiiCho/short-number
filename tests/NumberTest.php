<?php

declare(strict_types=1);

namespace Serhii\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use Serhii\ShortNumber\Lang;
use Serhii\ShortNumber\Number;
use Serhii\ShortNumber\Option;
use Serhii\ShortNumber\Rule;

class NumberTest extends TestCase
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
     * @dataProvider provider_for_sets_method_sets_russian_the_current_language_for_converter
     * @test
     * @param string $expect
     * @param string $lang
     * @param int $input
     */
    public function it_can_convert_number_to_lowercase(string $expect, string $lang, int $input): void
    {
        Lang::set($lang);
        $this->assertEquals(mb_strtolower($expect), Number::conv($input, Option::LOWER));
    }

    public function provider_for_sets_method_sets_russian_the_current_language_for_converter(): array
    {
        return [
            ['1K', 'en', Rule::THOUSAND],
            ['1M', 'en', Rule::MILLION],
            ['1B', 'en', Rule::BILLION],
            ['1T', 'en', Rule::TRILLION],
            ['1ТЫС', 'ru', Rule::THOUSAND],
            ['1МЛН', 'ru', Rule::MILLION],
            ['1МЛД', 'ru', Rule::BILLION],
            ['1ТРН', 'ru', Rule::TRILLION],
        ];
    }

    /**
     * @dataProvider provider_for_it_can_convert_negative_numbers
     * @test
     * @param string $expect
     * @param string $lang
     * @param int $input
     */
    public function it_can_convert_negative_numbers(string $expect, string $lang, int $input): void
    {
        Lang::set($lang);
        $this->assertEquals($expect, Number::conv($input));
    }

    public function provider_for_it_can_convert_negative_numbers(): array
    {
        return [
            ['-1K', 'en', -Rule::THOUSAND],
            ['-1M', 'en', -Rule::MILLION],
            ['-1B', 'en', -Rule::BILLION],
            ['-1T', 'en', -Rule::TRILLION],
            ['-1ТЫС', 'ru', -Rule::THOUSAND],
            ['-1МЛН', 'ru', -Rule::MILLION],
            ['-1МЛД', 'ru', -Rule::BILLION],
            ['-1ТРН', 'ru', -Rule::TRILLION],
        ];
    }
}
