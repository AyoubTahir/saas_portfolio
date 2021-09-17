<?php

namespace App\Models;

use App\Support\SaveModel\Fields\BooleanField;
use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interest extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'interests';

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

    public function interestField()
    {
        return $this->hasMany(InterestField::class, 'interest_id', 'id');
    }
}
