<?php declare(strict_types=1);

namespace Serhii\ShortNumber;

class Option
{
    /**
     * @var string|null
     */
    private $option;

    /**
     * Option constructor.
     *
     * @param string|null $option
     */
    public function __construct(?string $option = null)
    {
        $this->option = $option;
    }
}