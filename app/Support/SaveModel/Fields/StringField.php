<?php

namespace App\Support\SaveModel\Fields;

use App\Support\SaveModel\Fields\Field;

class StringField extends Field
{
    public function execute()
    {
        return $this->value;
    }
}
