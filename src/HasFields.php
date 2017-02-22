<?php

namespace Indigoram89\Fields;

use Illuminate\Database\Eloquent\Builder;

trait HasFields
{
    /**
     * Has many fields.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function fields()
    {
        return $this->morphMany(Field::class, 'owner')->oldest();
    }

    /**
     * Get or create a field.
     *
     * @param  string $key
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function field(string $key, $value = null, $description = null)
    {
        if ( ! $field = $this->fields->where('key', $key)->first()) {
            $this->fields->push(
                $field = $this->fields()->firstOrNew(compact('key'))
            );
        }

        $field->setDefaultValue($value);
        $field->setDefaultDescription($description);

        $field->save();

        return $field;
    }

    /**
     * Get or create a field with key "text".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function text($value = null, $description = null)
    {
        return $this->field('text', $value, $description);
    }

    /**
     * Get a field with key "text";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getTextAttribute()
    {
        if (is_null($value = $this->field('text'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "name".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function name($value = null, $description = null)
    {
        return $this->field('name', $value, $description);
    }

    /**
     * Get a field with key "name";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getNameAttribute()
    {
        if (is_null($value = $this->field('name'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "title".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function title($value = null, $description = null)
    {
        return $this->field('title', $value, $description);
    }

    /**
     * Get a field with key "title";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getTitleAttribute()
    {
        if (is_null($value = $this->field('title'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "description".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function description($value = null, $description = null)
    {
        return $this->field('description', $value, $description);
    }

    /**
     * Get a field with key "Description";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getDescriptionAttribute()
    {
        if (is_null($value = $this->field('description'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "content".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function content($value = null, $description = null)
    {
        return $this->field('content', $value, $description);
    }

    /**
     * Get a field with key "content";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getContentAttribute()
    {
        if (is_null($value = $this->field('content'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "image".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function image($value = null, $description = null)
    {
        return $this->field('image', $value, $description);
    }

    /**
     * Get a field with key "image";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getImageAttribute()
    {
        if (is_null($value = $this->field('image'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "url".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function url($value = null, $description = null)
    {
        return $this->field('url', $value, $description);
    }

    /**
     * Get a field with key "url";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getUrlAttribute()
    {
        if (is_null($value = $this->field('url'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "button".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function button($value = null, $description = null)
    {
        return $this->field('button', $value, $description);
    }

    /**
     * Get a field with key "button";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getButtonAttribute()
    {
        if (is_null($value = $this->field('button'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "hint".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function hint($value = null, $description = null)
    {
        return $this->field('hint', $value, $description);
    }

    /**
     * Get a field with key "hint";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getHintAttribute()
    {
        if (is_null($value = $this->field('hint'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "placeholder".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function placeholder($value = null, $description = null)
    {
        return $this->field('placeholder', $value, $description);
    }

    /**
     * Get a field with key "placeholder";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getPlaceholderAttribute()
    {
        if (is_null($value = $this->field('placeholder'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "label".
     *
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    public function label($value = null, $description = null)
    {
        return $this->field('label', $value, $description);
    }

    /**
     * Get a field with key "label";
     *
     * @return \Indigoram89\Fields\Field
     */
    public function getLabelAttribute()
    {
        if (is_null($value = $this->field('label'))) {
            return null;
        }

        return (string) $value;
    }

    /**
     * Get or create a field with key "meta-*".
     *
     * @param  string $key
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return self|string|null
     */
    public function meta(string $key, string $value = null, string $description = null)
    {
        return $this->field("meta-{$key}", $value, $description);
    }
}
