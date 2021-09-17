<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use App\Support\SaveModel\Fields\IntegerField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'skills';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'expertise_field_id'    => StringField::new(),
            'skill_ar'              => StringField::new(),
            'skill_en'              => StringField::new(),
            'lvl'                   => IntegerField::new(),
        ];
    }

    public function expertiseField()
    {
        return $this->belongsTo(ExpertiseField::class, 'expertise_field_id', 'id');
    }
}
