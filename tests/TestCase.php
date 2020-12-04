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
        $subtract = mb_strlen(mb_substr((string) $from, 0, -1));

        for ($i = $from; $i < $to; $i += $add) {
            $data[$i] = [$i, mb_substr((string) (int) $i, 0, -$subtract)];
        }

        return $data;
    }
}
