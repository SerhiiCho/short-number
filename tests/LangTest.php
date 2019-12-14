<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use Serhii\ShortNumber\Lang;

class LangTest extends TestCase
{
    /** @test */
    public function availableLanguages_returns_array_of_file_names_in_lang_directory(): void
    {
        $reflect = new ReflectionMethod(Lang::class, 'availableLanguages');
        $reflect->setAccessible(true);
        $output = $reflect->invoke(new Lang);

        $this->assertTrue(in_array('ru', $output));
        $this->assertTrue(in_array('en', $output));
    }
}
