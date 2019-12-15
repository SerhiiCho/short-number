<?php declare(strict_types=1);

namespace Serhii\ShortNumber;

use Illuminate\Support\Collection;

class Conv
{
    /**
     * @var array|null
     */
    private static $options;

    /**
     * Takes number and looks at it, if this number is between 1 thousand and 1 million
     * function returns this number with "тыс." after number, if its bigger it will
     * return this number with 'мил.' after.
     *
     * @param int $num
     * @param array|string|null $options
     * @return string
     */
    public static function short(int $num, $options = ''): string
    {
        self::$options = self::formatOptions($options);

        Lang::includeTranslations();

        $rules = collect([
            new Rule(1000, 1, '', self::$options),
            new Rule(1000000, 1000, 'thousand', self::$options),
            new Rule(1000000000, 1000000, 'million', self::$options),
            new Rule(1000000000000, 1000000000, 'billion', self::$options),
        ]);

         foreach ($rules as $rule) {
             if ($num < $rule->edge) {
                 return $rule->formatNumber($num);
             }
         }

        return $rules->last()->formatNumber($num);
    }

    /**
     * Formats dynamic options like 'round 30' etc...
     *
     * @param array|string $options
     * @return \Illuminate\Support\Collection
     */
    private static function formatOptions($options): Collection
    {
        if (is_array($options)) {
            return collect(array_flip($options))->map(function ($_, $key) {
                return $key;
            });
        }

        return collect([strval($options) => $options]);
    }
}
