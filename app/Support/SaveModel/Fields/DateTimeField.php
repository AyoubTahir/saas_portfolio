<?php

namespace App\Support\SaveModel\Fields;

use App\Support\SaveModel\Fields\Field;
use Carbon\Carbon;

class DateTimeField extends Field
{
    public function execute(): mixed
    {
        if (!$this->value) {
            return $this->value;
        }

        return Carbon::parse($this->value)->toDateTimeString();
    }
}
