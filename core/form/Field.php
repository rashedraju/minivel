<?php

namespace App\core\form;

use App\core\Model;

class Field
{
    public string $type;
    public Model $model;
    public string $attribute;

    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
            <div class="mb-3">
                <label for="%s" class="form-label"> %s </label>
                <input type="%s" name="%s" value="%s" class="form-control %s">
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ',
            $this->attribute,
            $this->model->getLabel()[$this->attribute],
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? "is-invalid" : "",
            $this->model->getFirstError($this->attribute)
        );
    }

    public function passwordField() : Field{
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

}