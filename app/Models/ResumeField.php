<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\Fields\DateField;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResumeField extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'resume_fields';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'resume_id'         => StringField::new(),
            'name_ar'           => StringField::new(),
            'name_en'           => StringField::new(),
            'job_ar'            => StringField::new(),
            'job_en'            => StringField::new(),
            'desc_ar'           => StringField::new(),
            'desc_en'           => StringField::new(),
            'date_from'         => DateField::new(),
            'date_to'           => DateField::new(),
        ];
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }
}
