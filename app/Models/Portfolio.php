<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use App\Support\SaveModel\Fields\BooleanField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'user_id'       => StringField::new(),
            'title_ar'      => StringField::new(),
            'title_en'      => StringField::new(),
            'desc_ar'       => StringField::new(),
            'desc_en'       => StringField::new(),
            'status'       => BooleanField::new(),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
