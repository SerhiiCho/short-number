<?php

declare(strict_types=1);

namespace Serhii\Tests;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param int $from
     * @param int $to
     * @return array
     */
    protected function generateDataForProvider(int $from, int $to): array
    {
        $data = [];
        $add = floor(($to - $from) / 100);
        $subtract = strlen(substr(strval($from), 0, -1));

        for ($i = $from; $i < $to; $i += $add) {
            $data[$i] = [$i, substr((string) intval($i), 0, -$subtract)];
        }

        return $data;
    }
}
