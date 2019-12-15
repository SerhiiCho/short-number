<?php declare(strict_types=1);

namespace Serhii\ShortNumber;

use Illuminate\Support\Collection;

class Rule
{
    /**
     * @var int
     */
    public $edge;

    /**
     * @var int
     */
    private $divider;

    /**
     * @var string|null
     */
    private $translate_key;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $options;

    /**
     * Rule constructor.
     *
     * @param int $edge
     * @param int $divider
     * @param string $translate_key
     * @param \Illuminate\Support\Collection $options
     */
    public function __construct(int $edge, int $divider, string $translate_key, Collection $options)
    {
        $this->edge = $edge;
        $this->divider = $divider;
        $this->translate_key = $translate_key;
        $this->options = $options;
    }

    /**
     * @param $number
     * @return string
     */
    public function formatNumber($number): string
    {
        $number = number_format(floatval($number / $this->divider));
        return $number.$this->getSuffix();
    }

    /**
     * @return string
     */
    private function getSuffix(): string
    {
        if (!$this->translate_key) {
            return '';
        }

        if ($this->options->has('lower')) {
            return strtolower(Lang::trans($this->translate_key));
        }

        return Lang::trans($this->translate_key);
    }
}