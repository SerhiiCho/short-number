<?php

declare(strict_types=1);

namespace Serhii\Tests;

use Serhii\ShortNumber\Lang;

class LangTest extends TestCase
{
    public function testMethodTransReturnsTranslationsIfCustomTranslationsAreNotProvided(): void
    {
        Lang::set('ru');

        $this->assertSame('тыс', Lang::trans('thousand'));
        $this->assertSame('млн', Lang::trans('million'));
        $this->assertSame('млд', Lang::trans('billion'));
        $this->assertSame('трн', Lang::trans('trillion'));
    }


    public function testMethodTransCanOverwrite1Field(): void
    {
        Lang::set('en', ['thousand' => 'thou']);

        $this->assertSame('thou', Lang::trans('thousand'));
        $this->assertSame('m', Lang::trans('million'));
        $this->assertSame('b', Lang::trans('billion'));
        $this->assertSame('t', Lang::trans('trillion'));
    }


    public function testMethodTransCanOverwrite2Fields(): void
    {
        Lang::set('en', ['thousand' => 'th', 'million' => 'mi']);

        $this->assertSame('th', Lang::trans('thousand'));
        $this->assertSame('mi', Lang::trans('million'));
        $this->assertSame('b', Lang::trans('billion'));
        $this->assertSame('t', Lang::trans('trillion'));
    }


    public function testMethodTransCanOverwrite3Fields(): void
    {
        Lang::set('en', ['thousand' => 'th', 'million' => 'mi', 'billion' => 'bi']);

        $this->assertSame('th', Lang::trans('thousand'));
        $this->assertSame('mi', Lang::trans('million'));
        $this->assertSame('bi', Lang::trans('billion'));
        $this->assertSame('t', Lang::trans('trillion'));
    }


    public function testMethodTransCanOverwrite4Fields(): void
    {
        Lang::set('en', ['thousand' => 'th', 'million' => 'mi', 'billion' => 'bi', 'trillion' => 'tr']);

        $this->assertSame('th', Lang::trans('thousand'));
        $this->assertSame('mi', Lang::trans('million'));
        $this->assertSame('bi', Lang::trans('billion'));
        $this->assertSame('tr', Lang::trans('trillion'));
    }


    public function testMethodTransReturnsCustomTranslationsIfTheyProvidedForNoneExistingLanguage(): void
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
