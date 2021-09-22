<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'messages';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'user_id'           => StringField::new(),
            'full_name'         => StringField::new(),
            'email'             => StringField::new(),
            'subject'           => StringField::new(),
            'message'           => StringField::new(),
            'important'         => StringField::new(),
            'sent'              => StringField::new(),
            'readed'            => StringField::new(),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
