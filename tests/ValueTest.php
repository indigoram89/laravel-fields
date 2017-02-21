<?php

namespace Indigoram89\Fields\Test;

class ValueTest extends TestCase
{
    /** @test */
    public function set_a_value()
    {
        $model = TestModel::create([]);

        $model->field('foo', 'bar');

        $this->assertEquals('bar', $model->field('foo')->value);

        $model->field('foo', 'baz');

        $this->assertEquals('bar', $model->field('foo')->value);

        $model->field('foo')->value = 'baz';

        $this->assertEquals('baz', $model->field('foo')->value);
        $this->assertEquals('baz', $model->field('foo'));
    }

    /** @test */
    public function set_a_default_value_from_config()
    {
        $model = TestModel::create([]);

        config(['fields.values.foo' => 'bar']);

        $model->field('foo');

        $this->assertEquals('bar', $model->field('foo')->value);
    }
}
