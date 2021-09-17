<?php

namespace App\Support\SaveModel;

use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class SaveModel
{
    public function __construct(private Model $model, private array $data)
    {
        if (!($this->model instanceof SaveableInterface)) {
            throw new Exception("The model " . $this->model::class . " must implement " . SaveableInterface::class);
        }

        foreach ($this->data as $column => $value) {
            if (!array_key_exists($column, $this->model->saveableFields())) {
                throw new Exception("The field {$column} does not exist check your " . $this->model::class . " model saveableField method");
            }
        }
    }

    public function execute()
    {
        foreach ($this->data as $column => $value) {
            $this->model->$column = $this->model->saveableFields()[$column]
                ->setValue($value)
                ->onColumn($column)
                ->ofModel($this->model)
                ->execute();
        }

        $this->model->save();

        return $this->model;
    }
}
