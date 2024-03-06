<?php

declare(strict_types=1);

namespace Serhii\ShortNumber;

final class Number
{
    /**
     * @var int
     */
    private $number;

    private function __construct()
    {
    }

    /**
     * @var Number|null
     */
    private static $instance;

    public static function singleton(): self
    {
        return self::$instance ?? (self::$instance = new self());
    }

    /**
     * Converts given number to its short form.
     *
     * @param int $number
     *
     * @return string
     */
    public static function conv(int $number): string
    {
        return self::singleton()->process($number);
    }

    /**
     * Converts given number to its short form.
     *
     * @param int $number
     *
     * @return string
     */
    private function process(int $number): string
    {
        $this->number = $number;

        $number_is_negative = $number < 0;

        if ($number_is_negative) {
            $this->number = (int) \abs($this->number);
        }

        $rules = $this->createRules();

        $needed_rule = $this->getRuleThatMatchesNumber($rules);
        $last_rule = $rules[count($rules) - 1];

        $result = !empty($needed_rule)
            ? \current($needed_rule)->formatNumber($this->number)
            : $last_rule->formatNumber($this->number);

        return $number_is_negative ? "-{$result}" : $result;
    }

    /**
     * @return Rule[]
     */
    private function createRules(): array
    {
        return [
            new Rule('', [0, 999]),
            new Rule('thousand', [Rule::THOUSAND, Rule::MILLION - 1]),
            new Rule('million', [Rule::MILLION, Rule::BILLION - 1]),
            new Rule('billion', [Rule::BILLION, Rule::TRILLION - 1]),
            new Rule('trillion', [Rule::TRILLION, Rule::QUADRILLION - 1]),
        ];
    }

    /**
     * @param Rule[] $rules
     *
     * @return Rule[]
     */
    private function getRuleThatMatchesNumber(array $rules): array
    {
        return \array_filter($rules, function ($rule) {
            return $rule->inRange($this->number);
        });
    }
}
