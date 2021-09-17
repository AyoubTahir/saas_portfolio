<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\Fields\FileField;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use App\Support\SaveModel\Fields\BooleanField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'abouts';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'user_id'               => StringField::new(),
            'full_name_ar'          => StringField::new(),
            'full_name_en'          => StringField::new(),
            'sub_title_ar'          => StringField::new(),
            'sub_title_en'          => StringField::new(),
            'job_ar'                => StringField::new(),
            'job_en'                => StringField::new(),
            'description_ar'        => StringField::new(),
            'description_en'        => StringField::new(),
            'button_ar'             => StringField::new(),
            'button_en'             => StringField::new(),
            'image'                 => FileField::new()->storeIn('images')->disk('uploads'),
            //'signature'             => FileField::new()->storeIn('images')->disk('uploads')
            'status'                => StringField::new()
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
