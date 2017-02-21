<?php

namespace Indigoram89\Fields\Test;

class FieldsTest extends TestCase
{
    /** @test */
    public function create_an_empty_field()
    {
        $model = TestModel::create([]);

        $model->field('foo');

        $this->assertCount(1, $model->fields);
        $this->assertCount(1, $model->fields()->get());

        $this->assertEquals('foo', $model->field('foo')->key);
    }

    /** @test */
    public function dublicate_fields_in_collection()
    {
        $model = TestModel::create([]);

        $model->field('foo');
        $model->field('foo', 'bar');

        $this->assertCount(1, $model->fields);
        $this->assertCount(1, $model->fields()->get());

        $this->assertEquals('bar', $model->fields->first()->value);
    }

    /** @test */
    public function text_field()
    {
        $model = TestModel::create([]);

        $model->text('foo');
        $this->assertEquals('foo', $model->text);
    }

    /** @test */
    public function name_field()
    {
        $model = TestModel::create([]);

        $model->name('foo');
        $this->assertEquals('foo', $model->name);
    }

    /** @test */
    public function title_field()
    {
        $model = TestModel::create([]);

        $model->title('foo');
        $this->assertEquals('foo', $model->title);
    }

    /** @test */
    public function description_field()
    {
        $model = TestModel::create([]);

        $model->description('foo');
        $this->assertEquals('foo', $model->description);
    }

    /** @test */
    public function content_field()
    {
        $model = TestModel::create([]);

        $model->content('foo');
        $this->assertEquals('foo', $model->content);
    }

    /** @test */
    public function image_field()
    {
        $model = TestModel::create([]);

        $model->image('foo');
        $this->assertEquals('foo', $model->image);
    }

    /** @test */
    public function url_field()
    {
        $model = TestModel::create([]);

        $model->url('foo');
        $this->assertEquals('foo', $model->url);
    }

    /** @test */
    public function button_field()
    {
        $model = TestModel::create([]);

        $model->button('foo');
        $this->assertEquals('foo', $model->button);
    }

    /** @test */
    public function hint_field()
    {
        $model = TestModel::create([]);

        $model->hint('foo');
        $this->assertEquals('foo', $model->hint);
    }

    /** @test */
    public function placeholder_field()
    {
        $model = TestModel::create([]);

        $model->placeholder('foo');
        $this->assertEquals('foo', $model->placeholder);
    }

    /** @test */
    public function label_field()
    {
        $model = TestModel::create([]);

        $model->label('foo');
        $this->assertEquals('foo', $model->label);
    }

    /** @test */
    public function meta_field()
    {
        $model = TestModel::create([]);

        $model->meta('title', 'foo');

        $this->assertEquals('foo', $model->meta('title'));
    }
}
