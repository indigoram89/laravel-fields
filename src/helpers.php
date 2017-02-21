<?php

use Indigoram89\Fields\Field;

if ( ! function_exists('field')) {

    /**
     * Get or create a field.
     *
     * @param  string $key
     * @param  string|array|null $value
     * @param  string|array|null $description
     * @return \Indigoram89\Fields\Field
     */
    function field(string $key, $value = null, $description = null)
    {
        $field = Field::firstOrNew(compact('key'));

        $field->setDefaultValue($value);
        $field->setDefaultDescription($description);

        $field->save();

        return $field;
    }
}
