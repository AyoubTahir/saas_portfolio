<?php

namespace App\Support\SaveModel\Fields;

use App\Support\SaveModel\Fields\Field;

class BooleanField extends Field
{
    public function execute(): mixed
    {
        return in_array($this->value, [true, 'true', 1, '1', 'on', 'yes', false, 'false', 0, '0', 'off', 'no'], true);
    }
}
