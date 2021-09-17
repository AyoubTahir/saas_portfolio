<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'services';

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

    public function servicesField()
    {
        return $this->hasMany(ServiceField::class, 'service_id', 'id');
    }
}
