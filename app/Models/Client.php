<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\Fields\FileField;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'clients';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'user_id'           => StringField::new(),
            'title_ar'          => StringField::new(),
            'title_en'          => StringField::new(),
            'desc_ar'           => StringField::new(),
            'desc_en'           => StringField::new(),
            'image'             => FileField::new()->storeIn('images')->disk('uploads'),
            'status'            => StringField::new(),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function clientsField()
    {
        return $this->hasMany(ClientField::class, 'client_id', 'id');
    }
}
