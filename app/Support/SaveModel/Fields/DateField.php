<?php

namespace App\Support\SaveModel\Fields;

use Carbon\Carbon;
use App\Support\SaveModel\Fields\Field;

class DateField extends Field
{
    public function execute()
    {
        if (!$this->value) {
            return $this->value;
        }

        return Carbon::parse($this->value)->toDateString();
    }
}
