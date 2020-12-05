<?php

declare(strict_types=1);

namespace Serhii\Tests;

use Serhii\ShortNumber\Lang;

class LangTest extends TestCase
{
    /** @test */
    public function method_trans_returns_translations_if_custom_translations_are_not_provided(): void
    {
        Lang::set('ru');

        $this->assertSame('тыс', Lang::trans('thousand'));
        $this->assertSame('млн', Lang::trans('million'));
        $this->assertSame('млд', Lang::trans('billion'));
        $this->assertSame('трн', Lang::trans('trillion'));
    }

    /** @test */
    public function method_trans_returns_custom_translations_if_they_provided_for_existing_language(): void
    {
        Lang::set('en', [
            'thousand' => 'thou',
            'million' => 'mil',
            'billion' => 'bil',
            'trillion' => 'tril',
        ]);

        $this->assertSame('thou', Lang::trans('thousand'));
        $this->assertSame('mil', Lang::trans('million'));
        $this->assertSame('bil', Lang::trans('billion'));
        $this->assertSame('tril', Lang::trans('trillion'));
    }

    /** @test */
    public function method_trans_returns_custom_translations_if_they_provided_for_none_existing_language(): void
    {
        Lang::set('xx', [
            'thousand' => 'x1',
            'million' => 'x2',
            'billion' => 'x3',
            'trillion' => 'x4',
        ]);

        $this->assertSame('x1', Lang::trans('thousand'));
        $this->assertSame('x2', Lang::trans('million'));
        $this->assertSame('x3', Lang::trans('billion'));
        $this->assertSame('x4', Lang::trans('trillion'));
    }
}
