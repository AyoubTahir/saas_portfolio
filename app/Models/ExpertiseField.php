<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpertiseField extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'expertise_fields';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'expertise_id'      => StringField::new(),
            'name_ar'           => StringField::new(),
            'name_en'           => StringField::new(),
        ];
    }

    public function expertise()
    {
        return $this->belongsTo(Expertise::class, 'expertise_id', 'id');
    }
    public function skills()
    {
        return $this->hasMany(Skill::class, 'expertise_field_id', 'id');
    }
}
