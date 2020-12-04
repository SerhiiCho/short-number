<?php

declare(strict_types=1);

namespace Serhii\Tests;

class TranslationsTest extends TestCase
{
    public function testing_correct_conversion(): void
    {
        $this->runTestsForSuffixes('en', ['K', 'M', 'B', 'T']);
        $this->runTestsForSuffixes('ru', ['ТЫС', 'МЛН', 'МЛД', 'ТРН']);
    }
}
