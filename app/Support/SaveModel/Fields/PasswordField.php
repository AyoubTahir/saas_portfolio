<?php

namespace App\Support\SaveModel\Fields;

use Illuminate\Support\Facades\Hash;
use App\Support\SaveModel\Fields\Field;

class PasswordField extends Field
{
    public function execute()
    {
        if (!$this->value) {
            return $this->value;
        }

        return Hash::make($this->value);
    }
}
