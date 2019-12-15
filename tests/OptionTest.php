<?php declare(strict_types=1);

namespace Tests;

use Serhii\ShortNumber\Conv;

class OptionTest extends TestCase
{
    /**
     * @dataProvider Provider_for_option_lower_changes_suffix_case
     * @test
     * @param int $num_before
     * @param int $num_after
     */
    public function option_lower_changes_suffix_case(int $num_before, int $num_after): void
    {
        $msg = "Failed on test #$num_before";
        $this->assertEquals("{$num_after}k", Conv::short($num_before, 'lower'), $msg);
    }

    public function Provider_for_option_lower_changes_suffix_case(): array
    {
        return $this->generateDataForProvider(900, 899999, 10000);
    }
}
