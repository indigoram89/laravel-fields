<?php

namespace Indigoram89\Fields\Test;

class TranslatedTest extends TestCase
{
    /** @test */
    public function is_translated()
    {
        $model = TestModel::create([]);

        config(['app.fallback_locale' => 'ru']);

        $model->field('foo', 'bar');

        $this->assertTrue($model->field('foo')->isTranslated('ru'));
    }

    /** @test */
    public function add_translated()
    {
        $model = TestModel::create([]);

        config(['app.fallback_locale' => 'ru']);

        $model->field('foo')->addTranslated('en');
        $model->field('foo')->addTranslated('de');

        $this->assertEquals(['en', 'de'], $model->field('foo')->translated);

        $model->field('foo')->addTranslated('ru');

        $this->assertEquals(['ru'], $model->field('foo')->translated);
    }
}
