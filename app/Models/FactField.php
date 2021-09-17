<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FactField extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'fact_fields';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'fact_id'           => StringField::new(),
            'title_ar'          => StringField::new(),
            'title_en'          => StringField::new(),
            'number'            => StringField::new(),
            'icon'              => StringField::new(),
        ];
    }

    public function fact()
    {
        return $this->belongsTo(Fact::class, 'fact_id', 'id');
    }
}
