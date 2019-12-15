<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Serhii\ShortNumber\Conv;

class OptionRoundTest extends TestCase
{
    /**
     * @dataProvider Provider_for_short_method_rounds_at_half_when_HALF_option_passed
     * @test
     * @param string $expect
     * @param int $input
     * @param $param
     */
    public function short_method_rounds_at_half_when_HALF_option_passed(string $expect, int $input, $param): void
    {
        $this->assertEquals($expect, Conv::short($input, $param));
    }

    public function Provider_for_short_method_rounds_at_half_when_HALF_option_passed(): array
    {
        return [
            ['10M', 10499999, ['half']],
            ['11M', 10500000, ['half']],
            ['1M', 1499999, ['half']],
            ['2M', 1500000, ['half']],
            ['100K', 100499, ['half']],
            ['101K', 100500, ['half']],
            ['499', 499, ['half']],
            ['1K', 500, 'half'],
            ['1K', 501, 'half'],
            ['499', 499, 'half'],
            ['1K', 500, 'half'],
            ['1K', 501, 'half'],
        ];
    }
}
