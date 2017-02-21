<?php

namespace Indigoram89\Fields\Test;

class DescriptionTest extends TestCase
{
    /** @test */
    public function set_a_description()
    {
        $model = TestModel::create([]);

        $model->field('foo', 'bar', 'baz');

        $this->assertEquals('baz', $model->field('foo')->description);

        $model->field('foo', 'bar', 'gaz');

        $this->assertEquals('baz', $model->field('foo')->description);

        $model->field('foo')->description = 'gaz';

        $this->assertEquals('gaz', $model->field('foo')->description);
    }

    /** @test */
    public function set_a_default_description_from_config()
    {
        $model = TestModel::create([]);

        config(['fields.descriptions.foo' => 'bar']);

        $model->field('foo');

        $this->assertEquals('bar', $model->field('foo')->description);
    }
}
