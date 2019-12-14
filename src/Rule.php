<?php declare(strict_types=1);

namespace Serhii\ShortNumber;

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
     * Rule constructor.
     *
     * @param int $edge
     * @param int $divider
     * @param string|null $translate_key
     */
    public function __construct(int $edge, int $divider, ?string $translate_key = null)
    {
        $this->edge = $edge;
        $this->divider = $divider;
        $this->translate_key = $translate_key;
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
        return $this->translate_key ? Lang::trans($this->translate_key) : '';
    }
}