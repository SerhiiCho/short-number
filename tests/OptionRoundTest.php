<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Serhii\ShortNumber\Conv;

class OptionRoundTest extends TestCase
{
    /**
     * @dataProvider Provider_for_short_method_rounds_different_when_ROUND_option_passed
     * @test
     * @param string $expect
     * @param int $input
     * @param $param
     */
    public function short_method_rounds_different_when_ROUND_option_passed(string $expect, int $input, $param): void
    {
        $this->assertEquals($expect, Conv::short($input, $param));
    }

    public function Provider_for_short_method_rounds_different_when_ROUND_option_passed(): array
    {
        return [
            ['499', 499, ['round 50']],
            ['1K', 500, ['round 50']],
            ['999K', 999999, ['round 100']],
            ['1K', 501, ['round 50']],
            ['499', 499, 'round 50'],
            ['1K', 500, 'round 50'],
            ['1K', 501, 'round 50'],
            ['899', 899, 'round 90'],
            ['1K', 900, 'round 90'],
            ['1K', 901, 'round 90'],
            ['999', 999, 'round 100'],
            ['1K', 1000, 'round 100'],
//            // Values below 50
            ['499', 499, 'round 40'],
            ['1K', 500, 'round 49'],
            ['1K', 501, 'round 0'],
//            // Values higher than 100
            ['999', 999, 'round 101'],
            ['1K', 1000, 'round 10000'],
        ];
    }
}
