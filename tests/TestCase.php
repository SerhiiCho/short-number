<?php declare(strict_types=1);

namespace Tests;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param int $from
     * @param int $until
     * @param int $divide
     * @return array
     */
    protected function generateDataForProvider(int $from, int $until, int $divide)
    {
        $data = [];
        $add = floor(($until - $from) / 100);

        for ($i = $from; $i < $until; $i += $add) {
            $data[$i] = [$i, number_format(floatval($i / $divide))];
        }

        return $data;
    }
}
