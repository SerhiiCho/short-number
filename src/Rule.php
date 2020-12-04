<?php

declare(strict_types=1);

namespace Serhii\ShortNumber;

class Rule
{
    public const THOUSAND = 1000;
    public const MILLION = 1000000;
    public const BILLION = 1000000000;
    public const TRILLION = 1000000000000;
    public const QUADRILLION = 1000000000000000;

    /**
     * @var string|null
     */
    private $number_name;

    /**
     * @var array
     */
    private $options;

    /**
     * @var array
     */
    private $range;

    /**
     * Rule constructor.
     *
     * @param string $number_name
     * @param array $range
     * @param array $options
     */
    public function __construct(string $number_name, array $range, array $options)
    {
        $this->options = $options;
        $this->number_name = $number_name;
        $this->range = $range;
    }

    /**
     * @param mixed $num
     * @return string
     */
    public function formatNumber($num): string
    {
        $num = (string) $num;

        if ($num < 1000) {
            return $num.$this->getSuffix();
        }

        $short_num = \explode(',', \number_format((float) $num))[0];

        return $short_num.$this->getSuffix();
    }

    /**
     * Check if given value is in number range, for example
     * thousand must be in range 1000 - 999_999
     *
     * @param int $num
     * @return bool
     */
    public function inRange(int $num): bool
    {
        [$min, $max] = $this->range;
        return $num >= $min && $num <= $max;
    }

    /**
     * @return string
     */
    private function getSuffix(): string
    {
        if (!$this->number_name) {
            return '';
        }

        if (\in_array(Option::LOWER, $this->options, true)) {
            return \strtolower(Lang::trans($this->number_name));
        }

        return Lang::trans($this->number_name);
    }
}