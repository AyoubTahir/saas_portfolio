<?php

namespace App\Support\SaveModel\Fields;

use App\Models\Expertise;
use App\Support\SaveModel\Fields\Field;
use Exception;

class BooleanField extends Field
{
    public function execute()
    {
        return in_array($this->value, [true, 'true', 1, '1', 'on', 'yes', false, 'false', 0, '0', 'off', 'no'], true) ? $this->value : throw new Exception("The " . $this->value . " must be boolean type ");
    }
}
