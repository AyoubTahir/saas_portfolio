<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\SaveModel\SaveableInterface;
use App\Support\SaveModel\Fields\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements SaveableInterface
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = [];

    public function saveableFields()
    {
        return [
            'user_id'           => StringField::new(),
            'name_ar'           => StringField::new(),
            'name_en'           => StringField::new(),
        ];
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id', 'id');
    }
}
