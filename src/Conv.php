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
     * @param array|string|null $options
     * @return string
     */
    public static function short(int $number, $options = null): string
    {
        switch (true) {
            case $number < 900: // 0 - 900
                $new_number = number_format((float) $number);
                $suffix = '';
                break;

            case $number < 900000: // 0.9k-850k
                $new_number = number_format((float) $number / 1000);
                $suffix = Lang::trans('thousand');
                break;

            case $number < 900000000: // 0.9m-850m
                $new_number = number_format((float) $number / 1000000);
                $suffix = Lang::trans('million');
                break;

            case $number < 900000000000: // 0.9b-850b
                $new_number = number_format((float) $number / 1000000000);
                $suffix = Lang::trans('billion');
                break;

            default: // 0.9t+
                $new_number = number_format((float) $number / 1000000000000);
                $suffix = Lang::trans('trillion');
        }

        // Remove unnecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        $dotzero = '.' . str_repeat('0', 1);
        $new_number = str_replace($dotzero, '', $new_number);

        return $new_number.$suffix;
    }
}