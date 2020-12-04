<?php

declare(strict_types=1);

namespace Serhii\Tests;

use Serhii\ShortNumber\Lang;
use Serhii\ShortNumber\Number;
use Serhii\ShortNumber\Option;
use Serhii\ShortNumber\Rule;

class NumberTest extends TestCase
{
    /**
     * @dataProvider Provider_for_returns_correct_number_below_thousand
     * @test
     * @param int $number
     */
    public function returns_correct_number_below_thousand(int $number): void
    {
        $this->assertEquals($number, Number::conv($number), "Failed on test #$number without option");
        $this->assertEquals($number, Number::conv($number, Option::LOWER), "Failed on test #$number with option Option::LOWER");
        $this->assertEquals($number, Number::conv($number, [Option::LOWER]), "Failed on test #$number with option [Option::LOWER]");
    }

    public function Provider_for_returns_correct_number_below_thousand(): array
    {
        $data = [];

        for ($i = 0; $i < 899; $i += 10) {
            $data[$i] = [$i];
        }

        return $data;
    }

    /**
     * @dataProvider Provider_for_returns_correct_number_for_thousands
     * @test
     * @param int $num_before
     * @param int $num_after
     */
    public function returns_correct_number_for_thousands(int $num_before, int $num_after): void
    {
        Lang::set('en');

        $msg = "Failed on test #$num_before without option";
        $this->assertEquals("{$num_after}K", Number::conv($num_before), $msg);

        $msg = "Failed on test #$num_before with option Option::LOWER";
        $this->assertEquals("{$num_after}k", Number::conv($num_before, Option::LOWER), $msg);

        $msg = "Failed on test #$num_before with option [Option::LOWER]";
        $this->assertEquals("{$num_after}k", Number::conv($num_before, [Option::LOWER]), $msg);
    }

    public function Provider_for_returns_correct_number_for_thousands(): array
    {
        return $this->generateDataForProvider(Rule::THOUSAND, Rule::MILLION - 1);
    }

    /**
     * @dataProvider Provider_for_returns_correct_number_for_millions
     * @test
     *
     * @param int $num_before
     * @param int $num_after
     */
    public function returns_correct_number_for_millions(int $num_before, int $num_after): void
    {
        $msg = "Failed on test #$num_before without option";
        $this->assertEquals("{$num_after}M", Number::conv($num_before), $msg);

        $msg = "Failed on test #$num_before with option Option::LOWER";
        $this->assertEquals("{$num_after}m", Number::conv($num_before, Option::LOWER), $msg);

        $msg = "Failed on test #$num_before with option [Option::LOWER]";
        $this->assertEquals("{$num_after}m", Number::conv($num_before, [Option::LOWER]), $msg);
    }

    public function Provider_for_returns_correct_number_for_millions(): array
    {
        return $this->generateDataForProvider(Rule::MILLION, Rule::BILLION - 1);
    }

    /**
     * @dataProvider Provider_for_returns_correct_number_for_billions
     * @test
     * @param int $num_before
     * @param int $num_after
     */
    public function returns_correct_number_for_billions(int $num_before, int $num_after): void
    {
        $msg = "Failed on test #$num_before without option";
        $this->assertEquals("{$num_after}B", Number::conv($num_before), $msg);

        $msg = "Failed on test #$num_before with option Option::LOWER";
        $this->assertEquals("{$num_after}b", Number::conv($num_before, Option::LOWER), $msg);

        $msg = "Failed on test #$num_before with option [Option::LOWER]";
        $this->assertEquals("{$num_after}b", Number::conv($num_before, [Option::LOWER]), $msg);
    }

    public function Provider_for_returns_correct_number_for_billions(): array
    {
        return $this->generateDataForProvider(Rule::BILLION, Rule::TRILLION - 1);
    }

    /**
     * @dataProvider Provider_for_returns_correct_number_for_trillions
     * @test
     * @param int $num_before
     * @param int $num_after
     */
    public function returns_correct_number_for_trillions(int $num_before, int $num_after): void
    {
        $msg = "Failed on test #$num_before without option";
        $this->assertEquals("{$num_after}T", Number::conv($num_before), $msg);

        $msg = "Failed on test #$num_before with option Option::LOWER";
        $this->assertEquals("{$num_after}t", Number::conv($num_before, Option::LOWER), $msg);

        $msg = "Failed on test #$num_before with option [Option::LOWER]";
        $this->assertEquals("{$num_after}t", Number::conv($num_before, [Option::LOWER]), $msg);
    }

    public function Provider_for_returns_correct_number_for_trillions(): array
    {
        return $this->generateDataForProvider(Rule::TRILLION, Rule::QUADRILLION - 1);
    }
}
