<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\Fields\FileField;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use App\Support\SaveModel\Fields\IntegerField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientField extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'client_fields';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'client_id'     => StringField::new(),
            'project_ar'    => StringField::new(),
            'project_en'    => StringField::new(),
            'name_ar'       => StringField::new(),
            'name_en'       => StringField::new(),
            'job_ar'        => StringField::new(),
            'job_en'        => StringField::new(),
            'opinion_ar'    => StringField::new(),
            'opinion_en'    => StringField::new(),
            'rating'        => IntegerField::new(),
            'image'         => FileField::new()->storeIn('images')->disk('uploads')
        ];
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
