<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resume extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'resumes';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'user_id'           => StringField::new(),
            'title_ar'          => StringField::new(),
            'title_en'          => StringField::new(),
            'description_ar'    => StringField::new(),
            'description_en'    => StringField::new(),
            'status'            => StringField::new(),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function resumesField()
    {
        return $this->hasMany(ResumeField::class, 'resume_id', 'id')->orderBy('date_from', 'DESC');
    }
}
