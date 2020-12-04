<?php

declare(strict_types=1);

namespace Serhii\ShortNumber;

class Conv
{
    /**
     * @var array|null
     */
    private static $options;

    /**
     * Takes number and looks at it, if this number is between 1 thousand and 1 million
     * function returns this number with "K" after number, if its bigger it will
     * return this number with 'M' after.
     *
     * @param int|float $num
     * @param int[]|int|null $options
     * @return string
     */
    public static function short($num, $options = []): string
    {
        self::$options = \is_array($options) ? $options : [$options];

        $num = (int) $num;

        Lang::includeTranslations();

        $rules = [
            new Rule('', [0, 999], self::$options),
            new Rule('thousand', [Rule::THOUSAND, Rule::MILLION - 1], self::$options),
            new Rule('million', [Rule::MILLION, Rule::BILLION - 1], self::$options),
            new Rule('billion', [Rule::BILLION, Rule::TRILLION - 1], self::$options),
            new Rule('trillion', [Rule::TRILLION, Rule::QUADRILLION - 1], self::$options),
        ];

        $needed_rule = \array_filter($rules, static function ($rule) use ($num) {
            return $rule->inRange($num);
        });

        return !empty($needed_rule)
            ? \current($needed_rule)->formatNumber($num)
            : \end($rules)->formatNumber($num);
    }
}
