<?php declare(strict_types=1);

namespace Serhii\ShortNumber;

use Illuminate\Support\Collection;

class Rule
{
    const DEFAULT_ROUND_EDGE = 90;

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
        $this->options = $options;
        $this->divider = $divider;
        $this->translate_key = $translate_key;
        $this->edge = $this->countPercent($edge);
    }

    /**
     * @param int $edge
     * @return int
     */
    private function countPercent(int $edge): int
    {
        $percent = $this->options->contains('half') ? 50 : self::DEFAULT_ROUND_EDGE;
        return intval($edge * ($percent / 100));
    }

    /**
     * @param $number
     * @return string
     */
    public function formatNumber($number): string
    {
        return number_format($number / $this->divider).$this->getSuffix();
    }

    /**
     * @return string
     */
    private function getSuffix(): string
    {
        if (!$this->translate_key) {
            return '';
        }

        if ($this->options->contains('lower')) {
            return strtolower(Lang::trans($this->translate_key));
        }

        return Lang::trans($this->translate_key);
    }
}