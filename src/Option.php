<?php

declare(strict_types=1);

namespace Serhii\ShortNumber;

class Option
{
    /**
     * Returns lowercase result instead of uppercase
     *
     * @example Number::conv(1111) => 1K
     * @example Number::conv(1111, Option::LOWER) => 1k
     */
    public const LOWER = 1;
}