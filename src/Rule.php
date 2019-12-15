<?php declare(strict_types=1);

namespace Serhii\ShortNumber;

use Illuminate\Support\Collection;

class Rule
{
    const THOUSAND = 1000;
    const MILLION = 1000000;
    const BILLION = 1000000000;
    const TRILLION = 1000000000000;
    const QUADRILLION = 1000000000000000;

    /**
     * @var string|null
     */
    private $number_name;

    /**
     * @var \Illuminate\Support\Collection
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
     * @param \Illuminate\Support\Collection $options
     */
    public function __construct(string $number_name, array $range, Collection $options)
    {
        $this->options = $options;
        $this->number_name = $number_name;
        $this->range = $range;
    }

    /**
     * @param $num
     * @return string
     */
    public function formatNumber($num): string
    {
        $num = strval($num);

        if ($num < 1000) {
            return $num.$this->getSuffix();
        }

        $short_num = explode(',', number_format(floatval($num)))[0];

//        if ($num === '100899999999990') {
//            dd($short_num);
//        }

        return $short_num.$this->getSuffix();
    }

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

        if ($this->options->contains('lower')) {
            return strtolower(Lang::trans($this->number_name));
        }

        return Lang::trans($this->number_name);
    }
}