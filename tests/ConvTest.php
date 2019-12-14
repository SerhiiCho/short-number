<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Serhii\ShortNumber\Conv;
use Serhii\ShortNumber\Lang;

class ConvTest extends TestCase
{
    /**
     * @dataProvider Provider_for_short_method_converts_data_correctly
     * @test
     * @param int $num_before
     * @param int $num_after
     * @param string $prefix
     */
    public function short_method_converts_data_correctly(int $num_before, int $num_after, string $prefix): void
    {
        $prefix = $prefix ? Lang::trans($prefix) : '';
        $this->assertEquals($num_after.$prefix, Conv::short($num_before));
    }

    /**
     * @return array
     */
    public function Provider_for_short_method_converts_data_correctly(): array
    {
        return [
            [0, 0, ''],
            [99, 99, ''],
            [100, 100, ''],
            [899, 899, ''],
            [900, 1, 'thousand'],
            [899499, 899, 'thousand'],
            [900000, 1, 'million'],
            [899999999, 900, 'million'],
            [900000000, 1, 'billion'],
            [899999999999, 900, 'billion'],
            [900000000000, 1, 'trillion'],
            [899999999999999, 900, 'trillion'],
        ];
    }

    /**
     * @dataProvider Provider_for_returns_correct_number_between_0_and_899
     * @test
     * @param int $number
     */
    public function returns_correct_number_between_0_and_899(int $number): void
    {
        $this->assertEquals($number, Conv::short($number));
    }

    /**
     * @return array
     */
    public function Provider_for_returns_correct_number_between_0_and_899(): array
    {
        $data = [];

        for ($i = 0; $i < 899; $i++) {
            $data[$i][] = $i;
        }

        return $data;
    }
}
