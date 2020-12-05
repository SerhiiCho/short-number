<?php

declare(strict_types=1);

namespace Serhii\ShortNumber;

class Number
{
    /**
     * @var array|null
     */
    private static $options;

    /**
     * @var bool
     */
    private static $number_is_negative = false;

    /**
     * Takes number and looks at it, if this number is between 1 thousand and 1 million
     * function returns this number with "K" after number, if its bigger it will
     * return this number with 'M' after.
     *
     * @param int $number
     * @param int[]|int|null $options
     *
     * @return string
     */
    public static function conv(int $number, $options = []): string
    {
        self::$options = \is_array($options) ? $options : [$options];

        self::$number_is_negative = $number < 0;

        if (self::$number_is_negative) {
            $number = (int)\abs($number);
        }

        Lang::includeTranslations();

        $rules = [
            new Rule('', [0, 999], self::$options),
            new Rule('thousand', [Rule::THOUSAND, Rule::MILLION - 1], self::$options),
            new Rule('million', [Rule::MILLION, Rule::BILLION - 1], self::$options),
            new Rule('billion', [Rule::BILLION, Rule::TRILLION - 1], self::$options),
            new Rule('trillion', [Rule::TRILLION, Rule::QUADRILLION - 1], self::$options),
        ];

        $needed_rule = \array_filter($rules, static function ($rule) use ($number) {
            return $rule->inRange($number);
        });

        $result = !empty($needed_rule)
            ? \current($needed_rule)->formatNumber($number)
            : \end($rules)->formatNumber($number);

        return self::$number_is_negative ? "-$result" : $result;
    }
}
