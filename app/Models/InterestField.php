<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InterestField extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'interest_fields';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'interest_id'       => StringField::new(),
            'name_ar'           => StringField::new(),
            'name_en'           => StringField::new(),
            'icon'              => StringField::new(),
        ];
    }

    public function interest()
    {
        return $this->belongsTo(Interest::class, 'interest_id', 'id');
    }
}
