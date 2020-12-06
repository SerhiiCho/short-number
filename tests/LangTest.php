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
    public function method_trans_can_overwrite_1_field(): void
    {
        Lang::set('en', ['thousand' => 'thou']);

        $this->assertSame('thou', Lang::trans('thousand'));
        $this->assertSame('m', Lang::trans('million'));
        $this->assertSame('b', Lang::trans('billion'));
        $this->assertSame('t', Lang::trans('trillion'));
    }

    /** @test */
    public function method_trans_can_overwrite_2_fields(): void
    {
        Lang::set('en', ['thousand' => 'th', 'million' => 'mi']);

        $this->assertSame('th', Lang::trans('thousand'));
        $this->assertSame('mi', Lang::trans('million'));
        $this->assertSame('b', Lang::trans('billion'));
        $this->assertSame('t', Lang::trans('trillion'));
    }

    /** @test */
    public function method_trans_can_overwrite_3_fields(): void
    {
        Lang::set('en', ['thousand' => 'th', 'million' => 'mi', 'billion' => 'bi']);

        $this->assertSame('th', Lang::trans('thousand'));
        $this->assertSame('mi', Lang::trans('million'));
        $this->assertSame('bi', Lang::trans('billion'));
        $this->assertSame('t', Lang::trans('trillion'));
    }

    /** @test */
    public function method_trans_can_overwrite_4_fields(): void
    {
        Lang::set('en', ['thousand' => 'th', 'million' => 'mi', 'billion' => 'bi', 'trillion' => 'tr']);

        $this->assertSame('th', Lang::trans('thousand'));
        $this->assertSame('mi', Lang::trans('million'));
        $this->assertSame('bi', Lang::trans('billion'));
        $this->assertSame('tr', Lang::trans('trillion'));
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
