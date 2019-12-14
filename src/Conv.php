<?php declare(strict_types=1);

namespace Serhii\ShortNumber;

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
     * @param array|null $options
     * @return string
     */
    public static function short(int $num, ?array $options = []): string
    {
        Lang::includeTranslations();

        self::$options = $options;

        $rules = [
            new Rule(900, 1),
            new Rule(900000, 1000, 'thousand'),
            new Rule(900000000, 1000000, 'million'),
            new Rule(900000000000, 1000000000, 'billion'),
        ];

         foreach ($rules as $rule) {
             if ($num < $rule->edge) {
                 return $rule->formatNumber($num);
             }
         }

        return (new Rule(0, 1000000000000, 'trillion'))->formatNumber($num);
    }
}
