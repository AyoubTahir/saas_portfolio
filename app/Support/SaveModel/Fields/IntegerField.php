<?php

namespace App\Support\SaveModel\Fields;

use App\Support\SaveModel\Fields\Field;

class IntegerField extends Field
{
    public function execute(): mixed
    {
        return $this->value;
    }
}
