<?php

namespace Indigoram89\Fields;

use Illuminate\Database\Eloquent\Model;
use Indigoram89\Translatable\Translatable;

class Field extends Model
{
    use Translatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laravel_fields';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be translated.
     *
     * @var array
     */
    protected $translatable = ['value', 'description'];

    /**
     * Check if value is not set and set it.
     *
     * @param string|array|null $value
     * @return void
     */
    public function setDefaultValue($value = null)
    {
        if (! $this->value) {
            if ($value = $value ?: config("fields.values.{$this->key}")) {
                foreach ((array) $value as $locale => $translation) {
                    $locale = is_string($locale) ? $locale : $this->getDefaultLocale();
                    $this->setTranslation('value', $translation, $locale);
                    $this->addTranslated($locale);
                }
            }
        }
    }

    /**
     * Check if description is not set and set it.
     *
     * @param string|array|null $description
     * @return void
     */
    public function setDefaultDescription($description = null)
    {
        if (! $this->description) {
            $description = $description ?: config("fields.descriptions.{$this->key}", ucfirst($this->key));
            foreach ((array) $description as $locale => $translation) {
                $locale = is_string($locale) ? $locale : $this->getDefaultLocale();
                $this->setTranslation('description', $translation, $locale);
            }
        }
    }

    /**
     * Get translated locales.
     *
     * @return array
     */
    public function getTranslated()
    {
        return is_array($this->translated) ? $this->translated : [];
    }

    /**
     * Set translated locale.
     *
     * @param string $locale
     * @return void
     */
    public function addTranslated(string $locale)
    {
        if ($this->isDefaultLocale($locale)) {
            $this->translated = [$locale];
        } else {
            $translated = $this->getTranslated();
            $translated[] = $locale;
            $this->translated = array_unique($translated);
        }
    }

    /**
     * Check if locale is translated.
     *
     * @param string $locale
     * @return bool
     */
    public function isTranslated(string $locale)
    {
        return in_array($locale, $this->getTranslated());
    }

    /**
     * Check if a locale is default.
     *
     * @return string
     */
    public function isDefaultLocale(string $locale)
    {
        return $locale === $this->getDefaultLocale();
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts() : array
    {
        $attributes = $this->getTranslatableAttributes();
        $attributes[]  = 'translated';

        return array_merge(
            parent::getCasts(),
            array_fill_keys($attributes, 'json')
        );
    }

    /**
     * Convert self to a string.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
