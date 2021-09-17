<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceField extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'service_fields';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'service_id'       => StringField::new(),
            'name_ar'           => StringField::new(),
            'name_en'           => StringField::new(),
            'desc_ar'           => StringField::new(),
            'desc_en'           => StringField::new(),
            'icon'              => StringField::new(),
        ];
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
