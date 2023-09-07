<?php

declare(strict_types=1);

namespace Serhii\Tests;

class TranslationsTest extends TestCase
{
    public function testingCorrectConversion(): void
    {
        $this->runTestsForSuffixes('en', ['k', 'm', 'b', 't']);
        $this->runTestsForSuffixes('ru', ['тыс', 'млн', 'млд', 'трн']);
        $this->runTestsForSuffixes('uk', ['тис', 'млн', 'млд', 'трн']);
    }
}
