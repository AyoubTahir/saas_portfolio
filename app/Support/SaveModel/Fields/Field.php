<?php

namespace App\Support\SaveModel\Fields;

use Illuminate\Database\Eloquent\Model;

abstract class Field
{
    protected $value;

    protected string $column;

    protected Model $model;

    abstract public function execute();

    public static function new()
    {
        return new static();
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function onColumn(string $column)
    {
        $this->column = $column;

        return $this;
    }

    public function ofModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }

    public function isUpdateMode()
    {
        return $this->model->exists;
    }
}
