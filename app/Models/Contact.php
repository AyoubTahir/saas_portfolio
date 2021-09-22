<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'contacts';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'user_id'           => StringField::new(),
            'title_ar'          => StringField::new(),
            'title_en'          => StringField::new(),
            'desc_ar'           => StringField::new(),
            'desc_en'           => StringField::new(),
            'email'             => StringField::new(),
            'email_desc_ar'     => StringField::new(),
            'email_desc_en'     => StringField::new(),
            'phone'             => StringField::new(),
            'phone_desc_ar'     => StringField::new(),
            'phone_desc_en'     => StringField::new(),
            'address_ar'        => StringField::new(),
            'address_en'        => StringField::new(),
            'address_link'      => StringField::new(),
            'status'            => StringField::new(),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
