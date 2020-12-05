<?php

declare(strict_types=1);

namespace Serhii\ShortNumber;

class Number
{
    /**
     * @var array|null
     */
    private $options;

    /**
     * @var \Serhii\ShortNumber\Number|null
     */
    private static $instance;

    public static function singleton(): self
    {
        return static::$instance ?? (static::$instance = new static());
    }

    /**
     * Converts given number to its short form.
     *
     * @param int $number
     * @param int[]|int|null $options
     *
     * @return string
     */
    public static function conv(int $number, $options = []): string
    {
        return self::singleton()->process($number, \is_array($options) ? $options : [$options]);
    }

    /**
     * Converts given number to its short form.
     *
     * @param int $number
     * @param int[]|array $options
     *
     * @return string
     */
    private function process(int $number, array $options): string
    {
        $this->options = $options;
        $number_is_negative = $number < 0;

        Lang::includeTranslations();

        if ($number_is_negative) {
            $number = (int) \abs($number);
        }

        $rules = [
            new Rule('', [0, 999], $this->options),
            new Rule('thousand', [Rule::THOUSAND, Rule::MILLION - 1], $this->options),
            new Rule('million', [Rule::MILLION, Rule::BILLION - 1], $this->options),
            new Rule('billion', [Rule::BILLION, Rule::TRILLION - 1], $this->options),
            new Rule('trillion', [Rule::TRILLION, Rule::QUADRILLION - 1], $this->options),
        ];

        $needed_rule = \array_filter($rules, static function ($rule) use ($number) {
            return $rule->inRange($number);
        });

        $result = !empty($needed_rule)
            ? \current($needed_rule)->formatNumber($number)
            : \end($rules)->formatNumber($number);

        return $number_is_negative ? "-$result" : $result;
    }
}
