<?php declare(strict_types=1);

namespace Serhii\ShortNumber;

class Conv
{
    /**
     * Takes number and looks at it, if this number is between 1 thousand and 1 million
     * function returns this number with "тыс." after number, if its bigger it will
     * return this number with 'мил.' after.
     *
     * @param int $number
     * @param array|null $options
     * @return string
     */
    public static function short(int $number, ?array $options = []): string
    {
         $rules = [
            (object) ['edge' => 900, 'divide' => 1, 'suffix' => ''],
            (object) ['edge' => 900000, 'divide' => 1000, 'suffix' => Lang::trans('thousand')],
            (object) ['edge' => 900000000, 'divide' => 1000000, 'suffix' => Lang::trans('million')],
            (object) ['edge' => 900000000000, 'divide' => 1000000000, 'suffix' => Lang::trans('billion')],
        ];

         foreach ($rules as $rule) {
             if ($number < $rule->edge) {
                 return self::format($number / $rule->divide).$rule->suffix;
             }
         }

        return self::format($number / 1000000000000).Lang::trans('trillion');
    }

    /**
     * Removes decimals from number and converts to float
     *
     * @param int|float $number
     * @return float
     */
    private static function format($number): float
    {
        return (float) number_format((float) $number);
    }
}