<?php

declare(strict_types=1);

namespace Serhii\ShortNumber;

class Option
{
    /**
     * Returns uppercase result instead of lowercase
     *
     * @example Number::conv(1111) => 1k
     * @example Number::conv(1111, Option::UPPER) => 1K
     */
    public const UPPER = 1;
}